@extends('layout.layout')

@section('title', 'Home - Berita Terkini')

@section('content')
    @php
        $beritaTerbaru = $news->take(3);
        $beritaRekomendasi = $news->skip(3)->take(6);
    @endphp
    <div class="max-w-7xl mx-auto py-8">

        <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <h1
                    class="text-5xl md:text-7xl font-black uppercase tracking-tighter text-black dark:text-white bg-[#cdfc51] dark:bg-[#1e1e1e] border-4 border-black dark:border-white shadow-[8px_8px_0_0_#000] dark:shadow-[8px_8px_0_0_#fff] inline-block px-6 py-3">
                    BERITA TERKINI
                </h1>
                <!-- <p
                    class="mt-6 text-xl font-bold text-black dark:text-white bg-[#38bdf8] dark:bg-[#1e1e1e] border-2 border-black dark:border-white inline-block px-4 py-2 shadow-[4px_4px_0_0_#000] dark:shadow-[4px_4px_0_0_#fff]">
                    Update informasi terbaru! 🔥
                </p> -->
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
            @forelse($beritaTerbaru as $index => $item)
                @php
                    $paragraphs = is_array($item->paragraphs) ? $item->paragraphs : json_decode($item->paragraphs, true);
                    $excerpt = !empty($paragraphs) && isset($paragraphs[0]) ? $paragraphs[0] : 'Tidak ada deskripsi.';

                    $colors = ['bg-[#ffc900]', 'bg-[#ff90e8]', 'bg-white', 'bg-[#cdfc51]', 'bg-[#38bdf8]'];
                    $cardColor = $colors[$index % count($colors)];
                @endphp
                <a href="{{ route('user.show.index', $item->id) }}"
                    class="group flex flex-col {{ $cardColor }} dark:bg-[#121212] border-4 border-black dark:border-white shadow-[8px_8px_0_0_#000] dark:shadow-[8px_8px_0_0_#fff] hover:translate-y-[4px] hover:translate-x-[4px] hover:shadow-[4px_4px_0_0_#000] dark:hover:shadow-[4px_4px_0_0_#fff] transition-all duration-200">
                    <div
                        class="relative h-60 w-full border-b-4 border-black dark:border-white overflow-hidden bg-black flex-shrink-0">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                class="w-full h-full object-cover transition-all duration-500 transform group-hover:scale-105">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-200 dark:bg-gray-800">
                                <span class="text-3xl font-black text-gray-400 dark:text-gray-600 tracking-widest uppercase">No
                                    Image</span>
                            </div>
                        @endif
                        <div
                            class="absolute top-4 right-4 bg-white dark:bg-black border-2 border-black dark:border-white shadow-[4px_4px_0_0_#000] dark:shadow-[4px_4px_0_0_#fff] px-3 py-1">
                            <span class="text-xs font-black text-black dark:text-white uppercase tracking-wider">
                                {{ $item->created_at->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow justify-between">
                        <div>
                            <span
                                class="inline-block px-2 py-1 mb-4 border-2 border-black dark:border-white bg-white dark:bg-black text-black dark:text-white text-xs font-bold uppercase shadow-[2px_2px_0_0_#000] dark:shadow-[2px_2px_0_0_#fff]">
                                News
                            </span>
                            <h2
                                class="text-2xl font-black uppercase leading-tight mb-4 text-black dark:text-white line-clamp-3">
                                {{ $item->title }}
                            </h2>
                            <p class="font-medium text-black dark:text-gray-300 leading-relaxed line-clamp-3 mb-6">
                                {{ Str::limit($excerpt, 120) }}
                            </p>
                        </div>
                        <div class="mt-auto">
                            <span
                                class="inline-flex items-center justify-center w-full px-4 py-3 bg-black dark:bg-white text-white dark:text-black font-black uppercase tracking-widest border-2 border-transparent group-hover:bg-transparent group-hover:text-black dark:group-hover:text-white group-hover:border-black dark:group-hover:border-white transition-colors duration-200">
                                Baca Selengkapnya →
                            </span>
                        </div>
                    </div>
                </a>
            @empty
                <div
                    class="col-span-full py-20 px-6 bg-[#ff90e8] dark:bg-[#1e1e1e] border-4 border-black dark:border-white shadow-[12px_12px_0_0_#000] dark:shadow-[12px_12px_0_0_#fff] text-center">
                    <h3 class="text-4xl font-black uppercase text-black dark:text-white mb-4">Kosong!</h3>
                    <p class="text-xl font-bold text-black dark:text-gray-300">Belum ada berita yang dipublikasikan saat ini.
                        Coba kembali lagi nanti.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16 mb-12">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8">
                <h2
                    class="text-3xl md:text-4xl font-black uppercase text-black dark:text-white bg-[#ffc900] dark:bg-[#1e1e1e] border-4 border-black dark:border-white px-5 py-2 inline-block shadow-[6px_6px_0_0_#000] dark:shadow-[6px_6px_0_0_#fff]">
                    Rekomendasi berita
                </h2>
                <a href="{{ route('user.allnews.index') }}"
                    class="inline-flex items-center gap-2 font-black uppercase text-black dark:text-white bg-white dark:bg-black border-4 border-black dark:border-white px-4 py-2 shadow-[4px_4px_0_0_#000] dark:shadow-[4px_4px_0_0_#fff] hover:translate-y-[2px] hover:translate-x-[2px] hover:shadow-[2px_2px_0_0_#000] dark:hover:shadow-[2px_2px_0_0_#fff] transition-all">
                    Selengkapnya <span class="text-xl leading-none">→</span>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($beritaRekomendasi as $item)
                    <a href="{{ route('user.show.index', $item->id) }}"
                        class="group flex flex-col bg-white dark:bg-[#121212] border-4 border-black dark:border-white shadow-[8px_8px_0_0_#000] dark:shadow-[8px_8px_0_0_#fff] hover:translate-y-[4px] hover:translate-x-[4px] hover:shadow-[4px_4px_0_0_#000] dark:hover:shadow-[4px_4px_0_0_#fff] transition-all duration-200">
                        <div
                            class="relative h-48 sm:h-52 w-full border-b-4 border-black dark:border-white overflow-hidden bg-[#cdfc51] dark:bg-gray-800 flex-shrink-0">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                    class="w-full h-full object-cover transition-all duration-500 transform group-hover:scale-105">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="text-2xl font-black text-black dark:text-white tracking-widest uppercase">No
                                        Image</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-5 flex flex-col flex-grow gap-3">
                            <div>
                                <span
                                    class="inline-block bg-[#ff3b30] text-white border-2 border-black dark:border-white px-2 py-0.5 text-xs font-black uppercase tracking-wider shadow-[2px_2px_0_0_#000] dark:shadow-[2px_2px_0_0_#fff]">
                                    HOT NEWS
                                </span>
                            </div>
                            <h3
                                class="text-xl font-black uppercase text-black dark:text-white leading-snug line-clamp-3 group-hover:text-[#ff90e8] transition-colors decoration-4 group-hover:underline underline-offset-4">
                                {{ $item->title }}
                            </h3>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full py-12 text-center border-4 border-black bg-white">
                        <p class="font-bold text-xl uppercase">Belum ada rekomendasi berita.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection