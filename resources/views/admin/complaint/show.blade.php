@extends('layout.admin')

@section('main')

<main class="w-full mt-10 flex flex-col">
    <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-48">
        <div class="container text-center">
            <p class="text-3xl my-6">{{ $complaint->title }}</p>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                {{  $complaint->category->name }}
            </span>
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
            <p class="break-normal my-4 ">
                Dilaporkan oleh : {{ $complaint->community->name }}
            </p>
            <p class="break-normal my-4 ">
                Dilaporkan pada : {{ $complaint->created_at->diffForHumans() }}
            </p>
            <img class="object-center w-full" src="{{ asset('storage/' . $complaint->image) }}" alt="">
        </div>
        <article class="mt-4">
            {!! $complaint->complaint !!}
        </article>

        <div class="container text-center">
            <p class="text-3xl my-6">Tanggapan</p>
            <p class="break-normal my-4 ">
                Ditanggapi oleh : {{ $complaint->community->name }}
            </p>
        </div>
        <article class="mt-4">
            {!! $complaint->complaint !!}
        </article>
    </div>
</main>

@endsection
