@extends('layout.layout')
@section('title', 'All News')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($news as $item)
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
@endsection