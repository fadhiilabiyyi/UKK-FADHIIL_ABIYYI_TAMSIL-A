@extends('layout.admin')

@section('main')
<main class="h-full pb-16 overflow-y-auto">
    <div class="w-full mt-10 flex flex-col">
        <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
            <p class="text-center text-xl mt-6">Create new User</p>
            <form class="flex flex-col pt-3 md:pt-8" action="{{ route('communities.store') }}" method="POST">
                @csrf
                <div class="flex flex-col pt-4">
                    <label for="nik" class="text-lg">NIK</label>
                    <input type="number" name="nik" id="nik" placeholder="7471080116056671" autofocus required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @error('nik') border-red-600 @enderror" value="{{ old('nik') }}"/>
                    @error('nik')
                        <span class="text-sm text-red-600 mt-3">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col pt-4">
                    <label for="name" class="text-lg">Nama</label>
                    <input type="text" name="name" id="name" placeholder="Nama" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-600 @enderror" value="{{ old('name') }}"/>
                    @error('name')
                        <span class="text-sm text-red-600 mt-3">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col pt-4">
                    <label for="username" class="text-lg">Username</label>
                    <input type="text" name="username" id="username" placeholder="username" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @error('username') border-red-600 @enderror" value="{{ old('username') }}"/>
                    @error('username')
                        <span class="text-sm text-red-600 mt-3">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col pt-4">
                    <label for="password" class="text-lg">Password</label>
                    <input type="password" name="password" id="password" placeholder="password" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-600 @enderror" value="{{ old('password') }}"/>
                    @error('password')
                        <span class="text-sm text-red-600 mt-3">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col pt-4">
                    <label for="email" class="text-lg">Email</label>
                    <input type="email" name="email" id="email" placeholder="email@email.com" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-600 @enderror" value="{{ old('email') }}"/>
                    @error('email')
                        <span class="text-sm text-red-600 mt-3">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flexk flex-col pt-4">
                    <label for="telp" class="text-lg">Telp</label>
                    <input type="text" name="telp" id="telp" placeholder="Telp" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @error('telp') border-red-600 @enderror" value="{{ old('telp') }}"/>
                    @error('telp')
                        <span class="text-sm text-red-600 mt-3">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="bg-black text-white font-bold text-lg hover:bg-purple-700 p-2 my-8">Create</button>

            </form>
        </div>
    </div>
</main>
@endsection
