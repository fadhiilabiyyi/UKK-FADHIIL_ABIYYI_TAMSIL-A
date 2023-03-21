@extends('layout.community')

@section('main')
<main class="">
        <!-- Form -->
        <div class="w-full mt-10 flex flex-col">

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl">Form Pengaduan Masyarakat Desa Ciburuy</p>
                <form class="flex flex-col pt-3 md:pt-8" action="{{ route('complaint.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="flex flex-col pt-4">
                        <label for="title" class="text-lg">Judul Laporan</label>
                        <input type="text" id="title" name="title" autofocus required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="category_id" class="text-lg">Kategori Laporan</label>
                        <select name="category_id" id="category_id" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="date" class="text-lg">Tanggal Kejadian</label>
                        <input type="date" id="date" name="date" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="complaint" class="text-lg">Isi Laporan</label>
                        <input id="complaint" type="hidden" name="complaint" required>
                        <trix-editor input="complaint" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"></trix-editor>
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="image" class="text-lg">Foto / Bukti Kejadian</label>
                        <img src="" alt="" class="img-preview w-60 mb-3">
                        <input type="file" id="image" name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline img-preview" onchange="previewImage()">
                    </div>

                    <button type="submit" class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 my-8">Kirim Laporan</button>
                </form>
            </div>

        </div>
</main>
@endsection
