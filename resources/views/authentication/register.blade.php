<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white font-family-karla h-screen">
    <div class="w-full flex flex-wrap">

        <!-- Login Section -->
        <div class="w-full md:w-1/2 flex flex-col">

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl mb-4">Registrasi Pengaduan Desa Ciburuy</p>

                <form class="flex flex-col pt-3 md:pt-8" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="flex flex-col pt-4">
                        <label for="nik" class="text-lg">NIK</label>
                        <input type="text" id="nik" name="nik" placeholder="nik" autofocus required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @error('nik') border-red-600 @enderror" value="{{ old('nik') }}">
                        @error('nik')
                            <span class="text-sm text-red-600 mt-3">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="name" class="text-lg">Name</label>
                        <input type="text" id="name" name="name" placeholder="name" autofocus required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-600 @enderror" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-sm text-red-600 mt-3">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="username" class="text-lg">Username</label>
                        <input type="text" id="username" name="username" placeholder="username" autofocus required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @error('username') border-red-600 @enderror" value="{{ old('username') }}">
                        @error('username')
                            <span class="text-sm text-red-600 mt-3">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="password" class="text-lg">Password</label>
                        <input type="password" id="password" name="password" placeholder="password" autofocus required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-600 @enderror">
                        @error('password')
                            <span class="text-sm text-red-600 mt-3">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="email" class="text-lg">Email</label>
                        <input type="email" id="email" name="email" placeholder="email" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-600 @enderror" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-sm text-red-600 mt-3">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="telp" class="text-lg">Telp</label>
                        <input type="text" id="telp" name="telp" placeholder="telp" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @error('telp') border-red-600 @enderror" value="{{ old('telp') }}">
                        @error('telp')
                            <span class="text-sm text-red-600 mt-3">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" required class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">Registrasi</button>
                </form>
                <div class="text-center pt-12 pb-12">
                    <p>Sudah punya akun? <a href="{{ route('login') }}" class="underline font-semibold">Login di sini.</a></p>
                </div>
            </div>

        </div>

        <!-- Image Section -->
        <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-screen hidden md:block" src="{{ asset('images/register.jpg') }}">
        </div>
    </div>
</body>
</html>
