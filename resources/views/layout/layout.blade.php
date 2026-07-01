<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>GhnNews</title>
</head>

<body
    class="bg-[#fff4e0] text-black dark:bg-[#121212] dark:text-white transition-colors duration-300 font-sans selection:bg-[#ff90e8] selection:text-black">

    <nav class="bg-[#ffc900] dark:bg-[#1e1e1e] border-b-4 border-black dark:border-white px-4 py-3 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-between">

            <div class="flex items-center">
                <a href="{{ route('user.home.index') }}"
                    class="flex items-center gap-2 px-3 py-1.5 bg-white dark:bg-black border-4 border-black dark:border-white shadow-[6px_6px_0_0_#000] dark:shadow-[6px_6px_0_0_#fff] hover:translate-y-1 hover:translate-x-1 hover:shadow-[2px_2px_0_0_#000] dark:hover:shadow-[2px_2px_0_0_#fff] transition-all">
                    <svg class="h-8 w-8 text-black dark:text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="square" stroke-linejoin="miter" stroke-width="3"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-xl font-black uppercase tracking-widest text-black dark:text-white">GhNews</span>
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('user.home.index') }}"
                    class="px-5 py-2 bg-[#38bdf8] dark:bg-black border-2 border-black dark:border-white font-bold uppercase tracking-wider text-black dark:text-white shadow-[4px_4px_0_0_#000] dark:shadow-[4px_4px_0_0_#fff] hover:translate-y-[2px] hover:translate-x-[2px] hover:shadow-[2px_2px_0_0_#000] dark:hover:shadow-[2px_2px_0_0_#fff] transition-all">
                    Home
                </a>

                <a href="{{ route('user.voting.index') }}"
                    class="px-5 py-2 bg-green-400 dark:bg-black border-2 border-black dark:border-white font-bold uppercase tracking-wider text-black dark:text-white shadow-[4px_4px_0_0_#000] dark:shadow-[4px_4px_0_0_#fff] hover:translate-y-[2px] hover:translate-x-[2px] hover:shadow-[2px_2px_0_0_#000] dark:hover:shadow-[2px_2px_0_0_#fff] transition-all">
                    Voting
                </a>

                <a href="{{ route('user.allnews.index') }}"
                    class="px-5 py-2 bg-purple-400 dark:bg-black border-2 border-black dark:border-white font-bold uppercase tracking-wider text-black dark:text-white shadow-[4px_4px_0_0_#000] dark:shadow-[4px_4px_0_0_#fff] hover:translate-y-[2px] hover:translate-x-[2px] hover:shadow-[2px_2px_0_0_#000] dark:hover:shadow-[2px_2px_0_0_#fff] transition-all">
                    All News
                </a>

                @if (Auth::check())
                 <a href="{{ route('logout') }}"
                    class="px-5 py-2 bg-red-400 dark:bg-black border-2 border-black dark:border-white font-bold uppercase tracking-wider text-black dark:text-white shadow-[4px_4px_0_0_#000] dark:shadow-[4px_4px_0_0_#fff] hover:translate-y-[2px] hover:translate-x-[2px] hover:shadow-[2px_2px_0_0_#000] dark:hover:shadow-[2px_2px_0_0_#fff] transition-all">
                    logout
                </a>
                @endif
            
                <div class="hs-dropdown">
                    <button type="button"
                        class="hs-dark-mode-active:hidden block hs-dark-mode px-3 py-2 bg-[#cdfc51] border-2 border-black font-bold shadow-[4px_4px_0_0_#000] hover:translate-y-[2px] hover:translate-x-[2px] hover:shadow-[2px_2px_0_0_#000] transition-all"
                        data-hs-theme-click-value="dark">
                        <span class="group inline-flex shrink-0 justify-center items-center">
                            <svg class="shrink-0 size-5 text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                stroke-linecap="square" stroke-linejoin="miter">
                                <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
                            </svg>
                        </span>
                    </button>
                    <button type="button"
                        class="hs-dark-mode-active:block hidden hs-dark-mode px-3 py-2 bg-black border-2 border-white font-bold shadow-[4px_4px_0_0_#fff] hover:translate-y-[2px] hover:translate-x-[2px] hover:shadow-[2px_2px_0_0_#fff] transition-all"
                        data-hs-theme-click-value="light">
                        <span class="group inline-flex shrink-0 justify-center items-center">
                            <svg class="shrink-0 size-5 text-white" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                stroke-linecap="square" stroke-linejoin="miter">
                                <circle cx="12" cy="12" r="4"></circle>
                                <path d="M12 2v2"></path>
                                <path d="M12 20v2"></path>
                                <path d="m4.93 4.93 1.41 1.41"></path>
                                <path d="m17.66 17.66 1.41 1.41"></path>
                                <path d="M2 12h2"></path>
                                <path d="M20 12h2"></path>
                                <path d="m6.34 17.66-1.41 1.41"></path>
                                <path d="m19.07 4.93-1.41 1.41"></path>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>

            <div class="md:hidden flex items-center">
                <button type="button"
                    class="inline-flex items-center justify-center p-2 bg-white dark:bg-black border-2 border-black dark:border-white shadow-[4px_4px_0_0_#000] dark:shadow-[4px_4px_0_0_#fff] hover:translate-y-[2px] hover:translate-x-[2px] hover:shadow-[2px_2px_0_0_#000] dark:hover:shadow-[2px_2px_0_0_#fff] transition-all text-black dark:text-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="square" stroke-linejoin="miter" stroke-width="3"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="hidden md:hidden mt-4 bg-white dark:bg-[#1e1e1e] border-t-4 border-black dark:border-white"
            id="mobile-menu">

            <div class="px-4 py-4 space-y-4">
                <a href="{{ route('user.home.index') }}"
                    class="block px-4 py-3 bg-[#38bdf8] dark:bg-black border-2 border-black dark:border-white font-black text-center uppercase tracking-widest text-black dark:text-white shadow-[4px_4px_0_0_#000] dark:shadow-[4px_4px_0_0_#fff] active:translate-y-[2px] active:translate-x-[2px] active:shadow-[2px_2px_0_0_#000] dark:active:shadow-[2px_2px_0_0_#fff]">
                    Home
                </a>

                <a href="{{ route('user.voting.index') }}"
                    class="block px-4 py-3 bg-green-400 dark:bg-black border-2 border-black dark:border-white font-black text-center uppercase tracking-widest text-black dark:text-white shadow-[4px_4px_0_0_#000] dark:shadow-[4px_4px_0_0_#fff] active:translate-y-[2px] active:translate-x-[2px] active:shadow-[2px_2px_0_0_#000] dark:active:shadow-[2px_2px_0_0_#fff]">
                    Voting
                </a>
                <a href="{{ route('user.allnews.index') }}"
                    class="block px-4 py-3 bg-purple-400 dark:bg-black border-2 border-black dark:border-white font-black text-center uppercase tracking-widest text-black dark:text-white shadow-[4px_4px_0_0_#000] dark:shadow-[4px_4px_0_0_#fff] active:translate-y-[2px] active:translate-x-[2px] active:shadow-[2px_2px_0_0_#000] dark:active:shadow-[2px_2px_0_0_#fff]">
                    All News
                </a>
                @if (Auth::check())
                 <a href="{{ route('logout') }}"
                    class="block px-4 py-3 bg-red-400 dark:bg-black border-2 border-black dark:border-white font-black text-center uppercase tracking-widest text-black dark:text-white shadow-[4px_4px_0_0_#000] dark:shadow-[4px_4px_0_0_#fff] active:translate-y-[2px] active:translate-x-[2px] active:shadow-[2px_2px_0_0_#000] dark:active:shadow-[2px_2px_0_0_#fff]">
                    logout
                </a>
                @endif

                <div class="flex justify-center pt-2">
                    <button type="button"
                        class="hs-dark-mode-active:hidden block hs-dark-mode px-6 py-2 bg-[#cdfc51] border-2 border-black font-bold shadow-[4px_4px_0_0_#000] uppercase text-black"
                        data-hs-theme-click-value="dark">
                        Dark Mode
                    </button>
                    <button type="button"
                        class="hs-dark-mode-active:block hidden hs-dark-mode px-6 py-2 bg-black border-2 border-white font-bold shadow-[4px_4px_0_0_#fff] uppercase text-white"
                        data-hs-theme-click-value="light">
                        Light Mode
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-4 md:p-8">
        @yield('content')
    </div>


    <!-- Footer Ala Neubrutalism -->
    <footer
        class="border-t-8 border-black dark:border-white bg-[#38bdf8] dark:bg-[#121212] text-black dark:text-white mt-20">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12 md:py-16">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-10 md:gap-8">

                <!-- Kolom 1: Brand & Deskripsi (Lebar 5 kolom) -->
                <div class="md:col-span-5 flex flex-col items-start">
                    <a href="{{ route('user.voting.index') }}"
                        class="inline-block bg-white dark:bg-black border-4 border-black dark:border-white shadow-[6px_6px_0_0_#000] dark:shadow-[6px_6px_0_0_#fff] px-4 py-2 hover:translate-y-1 hover:translate-x-1 hover:shadow-[2px_2px_0_0_#000] dark:hover:shadow-[2px_2px_0_0_#fff] transition-all">
                        <span class="text-3xl font-black uppercase tracking-widest">GhnNews</span>
                    </a>
                    <p
                        class="mt-6 text-lg font-bold leading-relaxed bg-white/50 dark:bg-black/50 p-3 border-2 border-black dark:border-white backdrop-blur-sm">
                        Platform berita yang berani beda. Menyajikan informasi paling panas, paling tajam, dan tanpa
                        basa-basi. Jangan lewatkan update terbaru dari kami setiap hari!
                    </p>

                    <!-- Social Media -->
                    <div class="flex gap-4 mt-6">
                        <a href="#"
                            class="w-12 h-12 flex items-center justify-center bg-[#ff90e8] border-4 border-black dark:border-white shadow-[4px_4px_0_0_#000] dark:shadow-[4px_4px_0_0_#fff] hover:translate-y-[2px] hover:translate-x-[2px] hover:shadow-[2px_2px_0_0_#000] transition-all font-black text-xl"
                            title="Twitter">
                            X
                        </a>
                        <a href="#"
                            class="w-12 h-12 flex items-center justify-center bg-[#cdfc51] border-4 border-black dark:border-white shadow-[4px_4px_0_0_#000] dark:shadow-[4px_4px_0_0_#fff] hover:translate-y-[2px] hover:translate-x-[2px] hover:shadow-[2px_2px_0_0_#000] transition-all font-black text-xl"
                            title="Instagram">
                            IG
                        </a>
                        <a href="#"
                            class="w-12 h-12 flex items-center justify-center bg-[#ffc900] border-4 border-black dark:border-white shadow-[4px_4px_0_0_#000] dark:shadow-[4px_4px_0_0_#fff] hover:translate-y-[2px] hover:translate-x-[2px] hover:shadow-[2px_2px_0_0_#000] transition-all font-black text-xl"
                            title="Facebook">
                            FB
                        </a>
                    </div>
                </div>

                <!-- Kolom 2: Navigasi Cepat (Lebar 3 kolom) -->
                <div class="md:col-span-3">
                    <h3
                        class="text-2xl font-black uppercase border-b-4 border-black dark:border-white mb-6 pb-2 inline-block">
                        Kategori
                    </h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="#"
                                class="font-bold text-lg hover:pl-4 hover:bg-black hover:text-white dark:hover:bg-white dark:hover:text-black py-1 px-2 -ml-2 transition-all uppercase tracking-wide">🔥
                                Hot News</a>
                        </li>
                        <li>
                            <a href="#"
                                class="font-bold text-lg hover:pl-4 hover:bg-black hover:text-white dark:hover:bg-white dark:hover:text-black py-1 px-2 -ml-2 transition-all uppercase tracking-wide">🚀
                                Teknologi</a>
                        </li>
                        <li>
                            <a href="#"
                                class="font-bold text-lg hover:pl-4 hover:bg-black hover:text-white dark:hover:bg-white dark:hover:text-black py-1 px-2 -ml-2 transition-all uppercase tracking-wide">🏎️
                                Otomotif</a>
                        </li>
                        <li>
                            <a href="#"
                                class="font-bold text-lg hover:pl-4 hover:bg-black hover:text-white dark:hover:bg-white dark:hover:text-black py-1 px-2 -ml-2 transition-all uppercase tracking-wide">⚽
                                Olahraga</a>
                        </li>
                    </ul>
                </div>

                <!-- Kolom 3: Newsletter (Lebar 4 kolom) -->
                <div class="md:col-span-4">
                    <h3
                        class="text-2xl font-black uppercase border-b-4 border-black dark:border-white mb-6 pb-2 inline-block">
                        Langganan
                    </h3>
                    <p class="font-bold mb-4">Dapatkan update berita brutal langsung ke emailmu!</p>

                    <form action="#" class="flex flex-col gap-4">
                        <!-- Input Email Brutalist -->
                        <input type="email" placeholder="MASUKKAN EMAIL..."
                            class="w-full px-4 py-3 bg-white border-4 border-black focus:outline-none focus:bg-[#cdfc51] text-black font-bold uppercase placeholder:text-gray-500 shadow-[4px_4px_0_0_#000] transition-colors">

                        <!-- Tombol Subscribe -->
                        <button type="submit"
                            class="w-full px-4 py-3 bg-black dark:bg-white text-white dark:text-black font-black uppercase tracking-widest border-4 border-black dark:border-white hover:bg-[#ff3b30] hover:text-white dark:hover:bg-[#ff3b30] shadow-[6px_6px_0_0_#000] dark:shadow-[6px_6px_0_0_#fff] hover:translate-y-[2px] hover:translate-x-[2px] hover:shadow-[2px_2px_0_0_#000] dark:hover:shadow-[2px_2px_0_0_#fff] transition-all">
                            HAJAR! 💥
                        </button>
                    </form>
                </div>

            </div>
        </div>

        <!-- Bagian Paling Bawah (Copyright) -->
        <div
            class="border-t-4 border-black dark:border-white bg-[#ffc900] dark:bg-black px-6 py-5 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="font-black uppercase text-center md:text-left text-black dark:text-white tracking-widest text-sm">
                &copy; 2026 GhNews. Hak Cipta Dilindungi Undang-Undang.
            </p>
            <div class="flex gap-6 font-bold text-sm uppercase text-black dark:text-white">
                <a href="#" class="hover:underline decoration-4 underline-offset-4">Privasi</a>
                <a href="#" class="hover:underline decoration-4 underline-offset-4">Syarat</a>
            </div>
        </div>
    </footer>
</body>

</html>

