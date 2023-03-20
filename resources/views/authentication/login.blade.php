<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white font-family-karla h-screen">
    <div class="w-full flex flex-wrap">

        <!-- Login Section -->
        <div class="w-full md:w-1/2 flex flex-col">

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl mb-4">Pengaduan Desa Ciburuy</p>

                <!-- Login Failed -->
                @if (session()->has('error'))
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:text-red-400" role="alert">
                        <span class="font-medium">{{ session('error') }}</span> Change a few things up and try submitting again.
                    </div>
                @endif

                <!-- Registration Success -->
                @if (session()->has('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:text-green-400" role="alert">
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                @endif

                <form class="flex flex-col pt-3 md:pt-8" action="{{ route('authenticate') }}" method="POST">
                    @csrf
                    <div class="flex flex-col pt-4">
                        <label for="username" class="text-lg">Username</label>
                        <input type="text" id="username" name="username" placeholder="username" autofocus required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="password" class="text-lg">Password</label>
                        <input type="password" id="password" name="password" placeholder="password" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <button type="submit" required class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">Login</button>
                </form>
                <div class="text-center pt-12 pb-12">
                    <p>Belum punya akun? <a href="{{ route('register-page') }}" class="underline font-semibold">Registrasi di sini.</a></p>
                </div>
            </div>

        </div>

        <!-- Image Section -->
        <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-screen hidden md:block" src="{{ asset('images/login.jpg') }}">
        </div>
    </div>
</body>
</html>
