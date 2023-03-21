@extends('layout.community')

@section('main')
<main class="py-20 bg-white">
    <div class="px-4 mx-auto text-center max-w-7xl sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl md:text-5xl xl:text-6xl mb-4">
            Pengaduan Desa Ciburuy
        </h2>

        <!-- Complaint Succes -->
        {{-- @if (session()->has('success-login'))
            Berhasil Login
        @endif --}}

        <!-- Complaint Succes -->
        @if (session()->has('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:text-green-400" role="alert">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <p class="max-w-md mx-auto mt-3 text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
            Aplikasi Pengaduan Masyarakan untuk Desa Ciburuy.
            Laporkan keluhan atau aspirasi Anda. Laporan Anda akan terus ditindaklanjuti hingga terselesaikan
        </p>
        <div class="flex justify-center mt-8">
            <div class="inline-flex rounded-md shadow">
                <a href="{{ route('complaint') }}" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-white bg-indigo-600 border
                            border-transparent rounded-md hover:bg-indigo-700">
                    Laporkan Pengaduan
                </a>
            </div>
        </div>
    </div>
</main>
@endsection
