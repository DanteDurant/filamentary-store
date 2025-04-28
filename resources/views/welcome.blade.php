<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Filamentory Store</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="font-sans antialiased bg-primary
    text-theme">
        <div class="bg-primary">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] ">
                <div class=" ">
                    <header class="items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">

                        </div>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end" >
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2  ring-1 ring-transparent transition focus:outline-none focus-visible:ring-[#FF2D20] "
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2  ring-1 ring-transparent transitionfocus:outline-none focus-visible:ring-[#FF2D20] "
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2  ring-1 ring-transparent transition focus:outline-none focus-visible:ring-[#FF2D20] "
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <main class="flex w-100 h-100 flex-col items-center justify-center ">
                        <div class="logo-wrapper">
                            <img
                                src="{{ asset('images/branding-full-black.svg') }}"
                                alt="Logo (light)"
                                class="logo-light w-60 h-60"
                            />
                            <img
                                src="{{ asset('images/branding-full-white.svg') }}"
                                alt="Logo (dark)"
                                class="logo-dark w-60 h-60"
                            />
                        </div>
                        </main>

                    <footer class="py-16 text-center text-sm >
                       footer
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
