<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class GovernmentController extends Controller
{
    public function dashboard(): View
    {
        return view('government.dashboard');
    } 

    public function updateProfile(Request $request): RedirectResponse
    {
        // Form Security & Validasi
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'government_name' => ['required', 'string', 'max:255'],
        ]);

        // Update ke database
        $request->user()->update([
            'name' => $validated['name'],
            'government_name' => $validated['government_name'],
        ]);

        return back()->with('success', 'Profil instansi berhasil diperbarui!');
    }

    public function deleteAccount(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Logout terlebih dahulu
        Auth::logout();

        // Hapus data user dari database
        $user->delete();

        // Hapus semua data sesi (Form Security)
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Akun pemerintahan berhasil dihapus permanen.');
    }
}
