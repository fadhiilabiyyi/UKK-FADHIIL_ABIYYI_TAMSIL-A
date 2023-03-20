<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengaduan Masyarakat Desa Ciburuy</title>
    @vite('resources/css/app.css')

     {{-- Trix Editor --}}
     <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
     <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>


    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        trix-toolbar [data-trix-button-group="file-tools"] {
            display:none;
        }
    </style>
</head>
<body>
    <header class="w-full px-8 text-gray-700 bg-white">
        <div class="container flex flex-col flex-wrap items-center justify-between py-5 mx-auto md:flex-row max-w-7xl">
            <div class="relative flex flex-col md:flex-row">
                <a href="{{ route('home') }}"
                    class="flex items-center mb-5 font-medium text-gray-900 lg:w-auto lg:items-center lg:justify-center md:mb-0">
                    <span class="mx-auto text-xl font-black leading-none text-gray-900 select-none">
                        Pengaduan Desa
                        <span class="text-indigo-600">Ciburuy</span>
                    </span>
                </a>
                @if (Auth::guard('community')->check())
                <nav
                    class="flex flex-wrap items-center mb-5 text-base md:mb-0 md:pl-8 md:ml-8 md:border-l md:border-gray-200">
                    <a href="{{ route('home') }}" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900 @if (request()->routeIs('home')) text-gray-900 font-black @endif">Home</a>
                    <a href="" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900 @if (request()->routeIs('')) text-gray-900 @endif">Pengaduan Saya</a>
                    <div class="lg:hidden">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap
                            transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500
                            focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">Logout</button>
                        </form>

                    </div>
                </nav>
                @endif
            </div>

            @if (Auth::guard('community')->check())
            <div class="flex items-center ml-5 space-x-6 lg:justify-end hidden lg:block">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap
                    transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500
                    focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">Logout</button>
                </form>
            </div>
            @else
            <div class="inline-flex justify-end items-center ml-5 space-x-6 lg:justify-end">
                <a href="{{ route('register') }}"
                    class="text-base font-medium leading-6 text-gray-600 whitespace-no-wrap transition duration-150 ease-in-out hover:text-gray-900">
                    Register
                </a>
                <span class="inline-flex rounded-md shadow-sm">
                    <a href="{{ route('login') }}"
                        class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap
                                transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500
                                focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
                        Login
                    </a>
                </span>
            </div>
            @endif
        </div>
    </header>
    <!-- End header -->

    @yield('main')

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview')
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
</body>
</html>
