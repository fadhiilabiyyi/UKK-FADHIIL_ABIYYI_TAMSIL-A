@extends('layout.admin')

@section('main')
<main class="h-full pb-16 overflow-y-auto">
    <div class="w-full mt-10 flex flex-col">
        <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
            <p class="text-center text-xl mt-6">Create new Category</p>
            <form class="flex flex-col pt-3 md:pt-8" action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="flex flex-col pt-4">
                    <label for="name" class="text-base">Nama Kategori</label>
                    <input type="text" id="name" name="name" autofocus required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-600 @enderror" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-sm text-red-600 mt-3">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="bg-black text-white font-bold text-lg hover:bg-purple-700 p-2 my-8">Create</button>

            </form>
        </div>
    </div>
</main>
@endsection
