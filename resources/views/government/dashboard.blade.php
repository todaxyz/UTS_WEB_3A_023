@extends('layouts.government')

@section('title', 'Dashboard Utama')

@section('content')
<div class="dashboard-layout">
    <!-- Sidebar Kiri -->
    <aside class="dashboard-sidebar">
        <div class="dashboard-role">Navigasi</div>
        <nav>
            <a href="{{ route('government.dashboard') }}" class="dashboard-nav-link">Dashboard</a>
        </nav>
    </aside>

    <div class="dashboard-content">
    <div class="card">
        <h1>Profil Instansi</h1>
        <p class="subtitle">Kelola informasi perwakilan instansi pemerintahan Anda.</p>

        <form action="{{ route('government.profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 500; font-size: 14px; margin-bottom: 6px; color: #64748b;">Nama Perwakilan</label>
                <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required style="width: 100%; padding: 8px 12px; border: 1px solid var(--border); border-radius: 6px; font-family: inherit;">
                @error('name') 
                    <div style="color: #DC2626; font-size: 13px; margin-top: 4px;">{{ $message }}</div> 
                @enderror
            </div>

            <div style="margin-bottom: 24px;">
                <label style="display: block; font-weight: 500; font-size: 14px; margin-bottom: 6px; color: #64748b;">Instansi Pemerintahan</label>
                <input type="text" name="government_name" value="{{ old('government_name', Auth::user()->government_name) }}" required style="width: 100%; padding: 8px 12px; border: 1px solid var(--border); border-radius: 6px; font-family: inherit;">
                @error('government_name') 
                    <div style="color: #DC2626; font-size: 13px; margin-top: 4px;">{{ $message }}</div> 
                @enderror
            </div>

            <button type="submit" class="btn" style="background-color: var(--primary); color: white;">
                Simpan Perubahan
            </button>
        </form>

        <hr style="border: 0; border-top: 1px solid var(--border); margin: 32px 0;">

        <div>
            <h2 style="font-size: 18px; color: #DC2626; margin-bottom: 4px; margin-top: 0;">Zona Berbahaya</h2>
            <p style="font-size: 14px; color: #64748b; margin-bottom: 16px;">Menghapus akun akan menghilangkan semua data instansi Anda secara permanen. Tindakan ini tidak dapat dibatalkan.</p>
            
            <form method="POST" action="{{ route('government.account.delete') }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini secara permanen?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline" style="color: #DC2626; border-color: #DC2626;">
                    Hapus Akun
                </button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection