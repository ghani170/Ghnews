@extends('layoutAuth.app')
@section('title', 'Login')

@section('content')
    <div class="text-center mb-10">
        <!-- Ikon dengan border tebal dan hard shadow -->
        <div class="inline-flex items-center justify-center w-16 h-16 bg-yellow-400 border-4 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <!-- Mempertebal stroke ikon agar serasi dengan desain -->
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
        </div>
        <!-- Tipografi bold dan huruf kapital -->
        <h1 class="text-4xl font-black text-black uppercase tracking-widest">Ghnews</h1>
        <p class="text-black font-bold mt-2 text-lg">Silakan masuk ke akun Anda</p>
    </div>

    @if ($errors->any())
        <!-- Alert Error Neubrutalism -->
        <div class="mb-6 bg-red-400 border-4 border-black p-4 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
            <div class="flex items-center">
                <i class="fas fa-triangle-exclamation mr-2 text-black text-xl"></i>
                <p class="font-black text-black uppercase tracking-wide">Login gagal!</p>
            </div>
            <ul class="mt-2 ml-6 list-disc text-sm font-bold text-black border-t-2 border-black pt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @elseif (session('successRegist'))
        <!-- Alert Success Neubrutalism -->
        <div class="mb-6 bg-green-400 border-4 border-black p-4 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2 text-black text-xl"></i>
                <p class="font-black text-black uppercase tracking-wide">Registrasi berhasil!</p>
            </div>
            <p class="mt-2 font-bold text-black border-t-2 border-black pt-2">● {{ session('successRegist') }}</p>
        </div>
    @endif
    
    <!-- Wadah Form dengan hard shadow besar -->
    <div class="bg-yellow-200 p-8 border-4 border-black shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
        <form action="{{ route('login.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-black text-black mb-2 uppercase">Alamat Email</label>
                <input type="email" name="email" placeholder="nama@email.com"
                    class="w-full px-4 py-3 border-4 border-black focus:outline-none bg-yellow-50 focus:bg-yellow-100 focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all font-bold text-black placeholder:text-gray-500">
            </div>

            <div>
                <div class="flex justify-between mb-2 items-center">
                    <label class="text-sm font-black text-black uppercase">Kata Sandi</label>
                    <a href="#" class="text-sm font-black text-black underline decoration-2 hover:bg-yellow-300 hover:no-underline transition-all px-1">Lupa password?</a>
                </div>
                <input type="password" name="password" placeholder="••••••••"
                    class="w-full px-4 py-3 border-4 border-black focus:outline-none bg-yellow-50 focus:bg-yellow-100 focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all font-bold text-black placeholder:text-gray-500">
            </div>

            <!-- Tombol interaktif (menekan shadow saat di-klik) -->
            <button type="submit"
                class="w-full bg-indigo-400 hover:bg-indigo-500 text-black font-black uppercase tracking-widest py-3 border-4 border-black shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] active:translate-x-[6px] active:translate-y-[6px] active:shadow-none transition-all">
                Masuk Sekarang
            </button>
        </form>
    </div>

    <p class="text-center text-black font-bold mt-8">
        Belum punya akun?
        <a href="{{ route('register') }}" class="font-black text-black underline decoration-4 hover:bg-yellow-300 hover:no-underline transition-all px-1">Daftar gratis</a>
    </p>
@endsection