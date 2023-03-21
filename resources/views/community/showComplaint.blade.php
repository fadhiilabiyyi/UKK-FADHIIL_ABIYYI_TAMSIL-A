@extends('layout.community')

@section('main')


<main class="h-full pb-16 overflow-y-auto">
    <p class="text-center text-3xl my-6">Data Pengaduan : {{ $community->name }}</p>
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold">Data Pengaduan</h2>
        <div class="w-full overflow-hidden rounded-lg shadow-xs mb-4">
            <div class="w-full overflow-x-auto">

                @if (session()->has('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg dark:text-green-400" role="alert">
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                @endif

                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left uppercase border-b bg-gray-50">
                            <th class="px-4 py-3">Judul</th>
                            <th class="px-4 py-3">Kategori</th>
                            <th class="px-4 py-3">Tanggal Kejadian</th>
                            <th class="px-4 py-3">Aduan</th>
                            <th class="px-4 py-3">Gambar</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Diadukan pada</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y border-b bg-gray-50 tracking-wide">
                        @foreach ($complaints as $complaint)
                            <tr class="">
                                <td class="px-4 py-3 text-sm">{{ $complaint->title }}</td>
                                <td class="px-4 py-3 text-sm">{{ $complaint->category->name }}</td>
                                <td class="px-4 py-3 text-sm">{{ $complaint->date }}</td>
                                <td class="px-4 py-3 text-sm">{!! Str::limit($complaint->complaint, 50) !!}</td>
                                <td class="px-4 py-3 text-sm"><img class="w-5" src="{{ asset('storage/' . $complaint->image) }}" alt=""></td>
                                <td class="px-4 py-3 text-sm">
                                    @switch($complaint->status)
                                        @case('new')
                                            <span class="text-sm px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                                Pengaduan Belum Diverifikasi
                                            </span>
                                            @break
                                        @case("verified")
                                            <span class="text-sm px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-700">
                                                Pengaduan Sudah Di-verifikasi
                                            </span>
                                            @break
                                        @case("finished")
                                            <span class="text-sm px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-700">
                                                Pengaduan Sudah Ditanggapi
                                            </span>
                                            @break
                                        @default
                                    @endswitch
                                </td>
                                <td class="px-4 py-3 text-sm">{{ $complaint->created_at->diffForHumans() }}</td>
                                <td class="px-4 py-3 text-sm"><a href="{{ route('complaint.detail', $complaint->slug) }}">Lihat Detail...</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@endsection
