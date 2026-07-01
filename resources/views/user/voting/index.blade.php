@extends('layout.layout')

@section('title', 'Voting')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center px-4">
    <div class="max-w-lg w-full bg-white border border-gray-100 shadow-2xl rounded-3xl overflow-hidden">
        
        {{-- Header dengan Aksen Warna --}}
        <div class="bg-slate-50 px-8 py-10 border-b border-gray-100 text-center">
            <h2 class="text-3xl font-extrabold text-slate-800 tracking-tight">Form Voting</h2>
            <p class="text-slate-500 mt-2 text-sm">Suara Anda sangat berarti untuk kemajuan kami.</p>
        </div>

        <div class="p-8">
            {{-- Notifikasi Sukses --}}
            @if(session('success'))
                <div class="mb-6 flex items-center p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 rounded-r-xl transition-all animate-pulse">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    <span class="font-medium text-sm">{{ session('success') }}</span>
                </div>
            @endif

            {{-- Error Handling --}}
            @if(session('errors'))
                <div class="mb-6 p-4 bg-rose-50 border-l-4 border-rose-500 text-rose-800 rounded-r-xl">
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        <span class="font-bold text-sm">Terdapat kesalahan:</span>
                    </div>
                    <ul class="text-xs list-disc list-inside space-y-1 opacity-90">
                       {{ session('errors') }}
                    </ul>
                </div>
            @endif

            <form action="{{ route('user.voting.submit') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Input Pilihan --}}
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wider">Penilaian</label>
                    <div class="relative">
                        <select name="option" 
                            class="appearance-none w-full bg-slate-50 border border-slate-200 text-slate-700 py-3 px-4 pr-8 rounded-xl leading-tight focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all cursor-pointer">
                            <option value="" disabled selected>Pilih tingkat kinerja...</option>
                            <option value="kinerja baik">⭐⭐⭐⭐⭐ Kinerja Baik</option>
                            <option value="kinerja buruk">⭐ Kinerja Buruk</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                            <svg class="fill-current h-4 w-4" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 7.293 8.122 5.858 9.558 10 13.707l.707-.707z"/></svg>
                        </div>
                    </div>
                </div>

                {{-- Input Saran --}}
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wider">Saran <span class="text-slate-400 font-normal italic">(Opsional)</span></label>
                    <textarea name="suggestion" rows="4"
                        class="w-full bg-slate-50 border border-slate-200 text-slate-700 py-3 px-4 rounded-xl leading-tight focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all placeholder:text-slate-400"
                        placeholder="Berikan masukan konstruktif Anda di sini..."></textarea>
                </div>

                {{-- Tombol Submit --}}
                <button type="submit"
                    class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-slate-900 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 transform hover:-translate-y-1 shadow-lg">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    </span>
                    Kirim Voting Sekarang
                </button>
            </form>
        </div>
        
        <div class="bg-slate-50 px-8 py-4 text-center">
            <p class="text-xs text-slate-400">© {{ date('Y') }} Sistem Voting Internal. Anonim & Aman.</p>
        </div>
    </div>
</div>
@endsection