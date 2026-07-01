@extends('layoutAdmin.app')
@section('title', 'Edit News')

@section('content')
    <div class="flex justify-between items-end mb-4">

        <a style="font-family: 'Sekuya', system-ui;" href="{{ route('admin.news.index') }}"
            class="bg-indigo-600 text-white px-5 py-2.5 rounded-xl font-medium shadow-lg text-lg shadow-indigo-200 hover:bg-indigo-700 transition">
            <i class="fa-solid fa-left-long mr-1"></i> Back
        </a>
    </div>
    <div class="w-full bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden">
        <div class="relative bg-gray-100 px-8 py-12 overflow-hidden">
            <div
                class="absolute -top-8 left-1/10 -translate-x-1/2 w-32 h-32 bg-indigo-500 rounded-full blur-[60px] opacity-40">
            </div>

            <div class="relative z-10">
                <span
                    class="inline-flex items-center gap-1.5 px-3 py-1 mb-3 text-xs font-medium  bg-indigo-500/10 border border-indigo-500/20 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-indigo-400 animate-pulse"></span>
                    GhnDashboard
                </span>

                <h2 class="text-3xl font-extrabold  bg-clip-text bg-gradient-to-r from-white via-slate-100 to-slate-500 tracking-tight"
                    style="font-family: 'Sekuya', system-ui;">
                    Edit News
                </h2>
            </div>
        </div>

        <form action="{{ route('admin.news.update', $news->id) }}" class="p-8 space-y-6" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-xs font-medium text-slate-500 uppercase tracking-wider mb-2">Title</label>
                <input type="text" placeholder="Enter news title"
                    class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition-all duration-200 outline-none"
                    name="title" value="{{ old('title', $news->title) }}">
            </div>

            <div id="paragraphs-container" class="space-y-4">
                <label class="block text-xs font-medium text-slate-500 uppercase tracking-wider mb-2">
                    Content (Paragraphs)
                </label>
                @php
                    // Ambil data dari 'old' input (jika error validasi) atau dari database.
                    // Jika kosong sama sekali, buat array berisi 1 string kosong agar minimal ada 1 kotak teks.
                    $paragraphs = old('paragraphs', $news->paragraphs ?? ['']);
                    if (!is_array($paragraphs) || count($paragraphs) === 0) {
                        $paragraphs = [''];
                    }
                @endphp
                @foreach($paragraphs as $index => $paragraph)
                    <div class="relative paragraph-item {{ $index > 0 ? 'mt-4' : '' }}">
                        <textarea rows="4" placeholder="Enter paragraph {{ $index + 1 }}"
                            class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition-all duration-200 outline-none resize-none"
                            name="paragraphs[]">{{ $paragraph }}</textarea>

                        @if($index > 0)
                            <button type="button"
                                class="absolute top-2 right-4 text-slate-400 hover:text-red-500 font-bold transition-colors remove-btn"
                                title="Hapus Paragraf">
                                ✕
                            </button>
                        @endif
                    </div>
                @endforeach
            </div>

            <button type="button" id="add-paragraph-btn"
                class="mt-3 px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium rounded-lg transition-colors flex items-center gap-2">
                <span>+</span> Tambah Paragraf Baru
            </button>

            <div class="space-y-2">
                <label class="block text-xs font-medium text-slate-500 uppercase tracking-wider">Image</label>

                <div class="flex items-center gap-4">
                    <div id="preview-container" class="hidden relative group cursor-pointer" onclick="openModal(event)">
                        <img id="image-preview" src="{{ $news->image ? asset('storage/' . $news->image) : '' }}"
                            alt="Preview" class="w-16 h-16 object-cover rounded-lg border border-slate-200">
                        <div
                            class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex-1">
                        <input type="file" id="image-input" name="image" accept="image/*"
                            class="w-full px-4 py-2 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-700 file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-slate-900 file:text-white transition-all outline-none">
                    </div>
                </div>
            </div>

            <div id="image-modal"
                class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black/90 backdrop-blur-sm pointer-events-auto">
                <div class="relative max-w-3xl w-full p-4">
                    <img id="modal-img" src="" class="max-w-full max-h-[85vh] mx-auto rounded-lg shadow-2xl">
                    <button type="button" id="close-modal-btn"
                        class="absolute -top-12 right-4 text-white hover:text-slate-300 flex items-center gap-2 font-bold">
                        ✕
                    </button>
                </div>
            </div>

            <button type="submit" style="font-family: 'Sekuya', system-ui;"
                class="w-full text-lg bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3.5 rounded-xl transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] shadow-lg shadow-indigo-200">
                Save <i class="fa-solid fa-floppy-disk"></i>
            </button>

        </form>

        <div class="px-8 pb-8 text-center">
            <p class="text-xs text-slate-400">© 2026 GhnDashboard</p>
        </div>
    </div>

    <script>
        const imageInput = document.getElementById('image-input');
        const previewContainer = document.getElementById('preview-container');
        const imagePreview = document.getElementById('image-preview');
        const imageModal = document.getElementById('image-modal');
        const modalImg = document.getElementById('modal-img');
        const closeModalBtn = document.getElementById('close-modal-btn');

        // 1. Handle Tampilan Preview saat Pilih File
        imageInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    modalImg.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        });

        // 2. Fungsi Buka Modal (Gunakan stopPropagation agar tidak ganggu input)
        function openModal(e) {
            e.preventDefault();
            e.stopPropagation();
            imageModal.classList.remove('hidden');
            imageModal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        // 3. Fungsi Tutup Modal
        function closeModal() {
            imageModal.classList.add('hidden');
            imageModal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        closeModalBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            closeModal();
        });

        // Tutup jika klik area hitam
        imageModal.addEventListener('click', (e) => {
            if (e.target === imageModal) {
                closeModal();
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.getElementById('paragraphs-container');
            const addBtn = document.getElementById('add-paragraph-btn');
            let paragraphCount = 1;

            // Fungsi ketika tombol Tambah ditekan
            addBtn.addEventListener('click', function () {
                paragraphCount++;

                // Membuat elemen div baru untuk membungkus textarea
                const newDiv = document.createElement('div');
                newDiv.className = 'relative paragraph-item mt-4'; // mt-4 memberi jarak atas

                // Memasukkan Textarea dan Tombol Hapus (X)
                newDiv.innerHTML = `
                            <textarea rows="4" placeholder="Enter paragraph ${paragraphCount}"
                                class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition-all duration-200 outline-none resize-none"
                                name="paragraphs[]"></textarea>

                            <button type="button" class="absolute top-2 right-4 text-slate-400 hover:text-red-500 font-bold transition-colors remove-btn" title="Hapus Paragraf">
                                ✕
                            </button>
                        `;

                // Menambahkan elemen baru ke dalam container
                container.appendChild(newDiv);
            });

            // Fitur Hapus Paragraf (Event Delegation)
            container.addEventListener('click', function (e) {
                // Mengecek apakah yang diklik adalah tombol dengan class 'remove-btn'
                if (e.target.classList.contains('remove-btn')) {
                    // Menghapus elemen pembungkus (div.paragraph-item)
                    e.target.closest('.paragraph-item').remove();
                }
            });
        });
    </script>
@endsection