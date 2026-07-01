<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        /* Animasi transisi untuk mobile sidebar */
        #sidebar { transition: transform 0.3s ease-in-out; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">

    <div class="flex min-h-screen relative">
        <div id="sidebarOverlay" class="fixed inset-0 bg-slate-900/50 z-20 hidden md:hidden" onclick="toggleSidebar()"></div>

        <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-white border-r border-slate-200 z-30 transform -translate-x-full md:translate-x-0 md:static md:flex flex-col">
            <div class="p-6 flex justify-between items-center">
                <span class="text-2xl font-bold bg-gradient-to-r from-indigo-600 to-violet-600 bg-clip-text text-transparent" style="font-family: 'Sekuya', system-ui;">
                    GhnDashboard
                </span>
                <button class="md:hidden text-slate-500" onclick="toggleSidebar()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            
            <nav class="flex-1 px-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center p-3  hover:text-indigo-600 hover:bg-slate-50 rounded-xl font-medium transition-all {{ request()->routeIs('admin.dashboard') ? 'text-indigo-600 bg-indigo-50' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.votes.index') }}" class="flex items-center p-3  hover:text-indigo-600 hover:bg-slate-50 rounded-xl font-medium transition-all {{ request()->routeIs('admin.votes*') ? 'text-indigo-600 bg-indigo-50' : '' }}" >
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    View Votes
                </a>
                <a href="{{ route('admin.news.index') }}" class="flex items-center p-3  hover:text-indigo-600 hover:bg-slate-50 rounded-xl font-medium transition-all {{ request()->routeIs('admin.news*') ? 'text-indigo-600 bg-indigo-50' : '' }}" >
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    News Management
                </a>
                <a href="#" class="flex items-center p-3 text-slate-500 hover:text-indigo-600 hover:bg-slate-50 rounded-xl font-medium transition-all">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Customers
                </a>
                <a href="{{ route('logout') }}" class="flex items-center p-3 text-slate-500 hover:text-indigo-600 hover:bg-slate-50 rounded-xl font-medium transition-all">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path></svg>
                    Logout
                </a>
            </nav>

            
        </aside>

        <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4 md:px-8">
                <div class="flex items-center">
                    <button class="p-2 mr-2 text-slate-600 md:hidden hover:bg-slate-100 rounded-lg transition" onclick="toggleSidebar()">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>

                    <div class="relative w-48 sm:w-96 hidden sm:block">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </span>
                        <input type="text" class="block w-full pl-10 pr-3 py-2 border border-slate-200 rounded-xl leading-5 bg-slate-50 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition sm:text-sm" placeholder="Search data...">
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <button class="p-2 text-slate-400 hover:text-indigo-600 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </button>
                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=4f46e5&color=fff" class="w-9 h-9 rounded-full ring-2 ring-white shadow-sm" alt="User">
                </div>
            </header>

            <div class="p-8 overflow-y-auto">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
    </script>
</body>
</html>