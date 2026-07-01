@extends('layout.layout')
@section('title', 'Show News')
@section('content')
    {{-- Asumsi Anda menggunakan layout bawaan, misal @extends('layouts.user') --}}

    <div class="min-h-screen bg-[#fff4e0] font-sans text-black py-12 px-6">
        <div class="max-w-3xl mx-auto">

            <a href="{{ route('user.home.index') }}"
                class="inline-flex items-center justify-center px-6 py-3 mb-8 bg-[#ff90e8] text-black font-black uppercase tracking-widest border-4 border-black shadow-[6px_6px_0_0_#000] hover:translate-y-1 hover:translate-x-1 hover:shadow-[2px_2px_0_0_#000] transition-all">
                ← Kembali
            </a>

            <article class="bg-white border-4 border-black shadow-[12px_12px_0_0_#000] p-5 md:p-12">

                <div class="flex flex-wrap gap-3 mb-6">
                    <span
                        class="bg-[#ffc900] border-2 border-black font-bold uppercase text-sm px-3 py-1 shadow-[4px_4px_0_0_#000]">
                        Berita Terkini
                    </span>
                    <span
                        class="bg-white border-2 border-black font-bold uppercase text-sm px-3 py-1 shadow-[4px_4px_0_0_#000]">
                        {{ $news->created_at->format('d M Y') }}
                    </span>
                </div>

                <h1 class="text-2xl md:text-5xl font-black uppercase leading-tight mb-8 border-b-4 border-black pb-8">
                    {{ $news->title }}
                </h1>

                @if($news->image)
                    <div class="group relative w-full border-4 border-black shadow-[8px_8px_0_0_#000] mb-10 bg-black">
                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                            class="w-full h-auto max-h-[500px] object-cover group-hover:translate-[-1] group-hover:scale-97 transform transition-all duration-500">
                    </div>
                @else
                    <div
                        class="w-full h-48 border-4 border-black shadow-[8px_8px_0_0_#000] mb-10 bg-[#38bdf8] flex items-center justify-center">
                        <h2 class="text-3xl font-black text-black tracking-widest">NO IMAGE</h2>
                    </div>
                @endif

                <div class="space-y-6 text-lg md:text-xl font-medium leading-relaxed text-black">
                    @if($news->paragraphs && is_array($news->paragraphs))
                        @foreach($news->paragraphs as $index => $paragraph)
                            @if(!empty(trim($paragraph)))
                                <p
                                    class="{{ $index === 0 ? 'text-xl font-bold bg-[#cdfc51] p-4 border-2 border-black shadow-[4px_4px_0_0_#000]' : 'pl-4 border-l-4 border-black' }}">
                                    {{ $paragraph }}
                                </p>
                            @endif
                        @endforeach
                    @else
                        <p class="font-bold text-red-600 bg-red-100 p-4 border-4 border-black">
                            KONTEN BERITA BELUM TERSEDIA.
                        </p>
                    @endif
                </div>

            </article>

        </div>
    </div>
    <div class="fixed bottom-8 right-6 md:right-8 z-[100] flex flex-col items-end gap-3 pointer-events-none">

        
        <div id="music-label"
            class="hidden bg-white dark:bg-black border-4 border-black dark:border-white p-2 shadow-[4px_4px_0_0_#000] dark:shadow-[4px_4px_0_0_#fff] pointer-events-auto max-w-[200px] md:max-w-[250px]">
            <p class="text-xs font-black uppercase text-black dark:text-white truncate marquee-text" id="music-title">
                Pilih Lagu...
            </p>
        </div>

        <!-- Wadah Tombol -->
        <div class="flex items-center gap-3 pointer-events-auto">
            <!-- Tombol Ganti Lagu (Sembunyi by default) -->
            <button id="change-music-btn"
                class="hidden w-12 h-12 bg-[#ff90e8] border-4 border-black dark:border-white shadow-[4px_4px_0_0_#000] dark:shadow-[4px_4px_0_0_#fff] hover:translate-y-[2px] hover:translate-x-[2px] hover:shadow-[2px_2px_0_0_#000] dark:hover:shadow-[2px_2px_0_0_#fff] transition-all flex items-center justify-center text-xl"
                title="Ganti Lagu">
                📂
            </button>

            <!-- Tombol Utama (Play/Pause/Pilih) -->
            <button id="play-music-btn"
                class="w-16 h-16 bg-[#cdfc51] border-4 border-black dark:border-white shadow-[6px_6px_0_0_#000] dark:shadow-[6px_6px_0_0_#fff] hover:translate-y-[2px] hover:translate-x-[2px] hover:shadow-[2px_2px_0_0_#000] dark:hover:shadow-[2px_2px_0_0_#fff] transition-all flex items-center justify-center text-3xl"
                title="Putar Musik">
                🎧
            </button>
        </div>

        <!-- Input File & Audio Player (Keduanya disembunyikan dari visual) -->
        <input type="file" id="music-input" accept="audio/*" class="hidden">
        <audio id="music-player" class="hidden" loop></audio>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const playBtn = document.getElementById('play-music-btn');
            const changeBtn = document.getElementById('change-music-btn');
            const musicInput = document.getElementById('music-input');
            const musicPlayer = document.getElementById('music-player');
            const musicLabel = document.getElementById('music-label');
            const musicTitle = document.getElementById('music-title');

            let hasTrack = false;
            let isPlaying = false;

            // 1. Fungsi saat tombol utama ditekan
            playBtn.addEventListener('click', function () {
                if (!hasTrack) {
                    // Jika belum ada lagu, buka jendela pilih file
                    musicInput.click();
                } else {
                    // Jika sudah ada lagu, mainkan atau jeda
                    togglePlayPause();
                }
            });

            // 2. Fungsi saat tombol 'Folder' (ganti lagu) ditekan
            changeBtn.addEventListener('click', function () {
                musicInput.click();
            });

            // 3. Menangani file audio yang dimasukkan user
            musicInput.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    // Buat URL sementara untuk file lokal
                    const objectUrl = URL.createObjectURL(file);

                    // Masukkan ke tag audio
                    musicPlayer.src = objectUrl;
                    hasTrack = true;

                    // Tampilkan judul lagu dan tombol ekstra
                    musicTitle.textContent = file.name;
                    musicLabel.classList.remove('hidden');
                    changeBtn.classList.remove('hidden');
                    changeBtn.classList.add('flex');

                    // Langsung mainkan
                    musicPlayer.play();
                    isPlaying = true;
                    updateIcon();
                }
            });

            // 4. Fungsi Play / Pause
            function togglePlayPause() {
                if (isPlaying) {
                    musicPlayer.pause();
                    isPlaying = false;
                } else {
                    musicPlayer.play();
                    isPlaying = true;
                }
                updateIcon();
            }

            // 5. Update Ikon Tombol
            function updateIcon() {
                if (isPlaying) {
                    playBtn.innerHTML = '⏸️'; // Ikon Pause
                    playBtn.classList.replace('bg-[#cdfc51]', 'bg-[#ffc900]'); // Ubah warna jadi kuning
                } else {
                    playBtn.innerHTML = '▶️'; // Ikon Play
                    playBtn.classList.replace('bg-[#ffc900]', 'bg-[#cdfc51]'); // Kembalikan hijau neon
                }
            }

            // 6. Reset ikon ketika lagu selesai
            musicPlayer.addEventListener('ended', function () {
                isPlaying = false;
                updateIcon();
            });
        });
    </script>
@endsection