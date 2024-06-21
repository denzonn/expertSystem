<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')

    <title>
        @yield('title')
    </title>
</head>

<body class="bg-[#F4F7FE]">
    <div class="max-w-screen px-16 py-6 mt-2 text-gray-400">
        <div class="flex flex-row justify-between items-start gap-4">
            @yield('name')
            <div>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-from-bracket text-xl hover:text-red-500 transition-all"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        <div class="mt-4">
            @yield('content')
        </div>
    </div>
    <div class="fixed bottom-0 right-0">
        <img src="{{ asset('images/logo.png') }}" alt="" class="w-40">
    </div>

    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')

    @include('sweetalert::alert')
</body>

</html>
