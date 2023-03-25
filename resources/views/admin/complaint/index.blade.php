@extends('layout.admin')

@section('search-bar')
<div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
    <div class="absolute inset-y-0 flex items-center pl-2">
        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd">
            </path>
        </svg>
    </div>
    <form action="{{ url()->current() }}">
        <input class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" type="search" name="search" value="{{ request('search') }}" placeholder="Search for projects" aria-label="Search"/>
    </form>
</div>
@endsection

@section('main')

<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Data Pengaduan Masyarakat Desa Ciburuy</h2>

        <form action="" class="mb-2">
            <select class="shadow appearance-none border rounded w-1/2 md:w-1/4 py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" name="filter" id="">
                <option value="new" @if(request()->filter == 'new') selected @endif>Belum diverifikasi</option>
                <option value="verified" @if(request()->filter == 'verified') selected @endif>Sudah diverifikasi</option>
                <option value="finished" @if(request()->filter == 'finished') selected @endif>Sudah ditanggapi</option>
            </select>
            <button class="bg-black border rounded text-white font-bold text-sm hover:bg-gray-700 p-2">Filter</button>
        </form>

        <form action="" class="mb-2">
            <input class="shadow appearance-none border rounded w-1/2 md:w-1/4 lg:w-1/4 py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" type="date" name="date1" id="" value="{{ request()->date1 }}">
            <input class="shadow appearance-none border rounded w-1/2 md:w-1/4 lg:w-1/4 py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" type="date" name="date2" id="" value="{{ request()->date2 }}">
            <button class="bg-black border rounded text-white font-bold text-sm hover:bg-gray-700 p-2">Filter</button>
        </form>

        <form action="{{ route('print') }}" method="post" class="mb-2">
            @csrf
            <input type="hidden" name="filter"value="@if(request()->filter == 'new') new @endif @if(request()->filter == 'verified') verified @endif @if(request()->filter == 'finished') finished @endif">
            <input type="hidden" name="date1" value="@if(request()->date1) {{ request()->date1 }} @endif">
            <input type="hidden" name="date2" value="@if(request()->date2) {{ request()->date2 }} @endif">
            <button class="bg-black border rounded text-white font-bold text-sm hover:bg-gray-700 p-2">Print</button>
        </form>

        <div class="w-full overflow-hidden rounded-lg shadow-xs mb-4">
            <div class="w-full overflow-x-auto">

                @if (session()->has('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg dark:text-green-400" role="alert">
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                @endif

                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Judul</th>
                            <th class="px-4 py-3">Kategori</th>
                            <th class="px-4 py-3">Tanggal Kejadian</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Nama Pengadu</th>
                            <th class="px-4 py-3">Created at</th>
                            <th class="px-4 py-3">Updated at</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($complaints as $complaint)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{ $complaint->title }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $complaint->category->name }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $complaint->date }}
                            </td>
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
                            <td class="px-4 py-3 text-sm">
                                {{ $complaint->community->name }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $complaint->created_at }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $complaint->updated_at }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a class="hover:text-purple-600" href="{{ route('complaints.show', $complaint->slug) }}">Lihat Detail</a>
                                    {{-- <a href="">
                                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                            </svg>
                                        </button>
                                    </a> --}}
                                    @switch($complaint->status)
                                        @case('new')
                                            <form action="{{ route('complaints.verification', $complaint->slug) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                                    Verifikasi
                                                </button>
                                            </form>
                                            @break
                                        @case("verified")
                                            <a href="{{ route('responses.create', $complaint->slug) }}">
                                                <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                                    Berikan Tanggapan
                                                </button>
                                            </a>
                                            @break
                                        @case("finished")
                                            <span class="text-sm px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-700">
                                                Pengaduan Sudah Ditanggapi
                                            </span>
                                            @break
                                        @default
                                    @endswitch
                                    <form action="{{ route('complaints.destroy', $complaint->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete" onclick="return confirm('Are you sure want to delete this Data')">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- {{ $communities->links() }} --}}
    </div>
</main>

@endsection
