@extends('layoutAdmin.app')
@section('title', 'Votes Management')

@section('content')
    <div class="flex justify-between items-end mb-8">

        <a href="{{ route('admin.news.create') }}"
            class="bg-indigo-600 text-white px-5 py-2.5 rounded-xl font-medium shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition">
            + Add News
        </a>
    </div>


    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
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
                    News Management
                </h2>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-center ">
                <thead class="bg-slate-50 text-slate-400 uppercase text-xs font-semibold">
                    <tr>
                        <th class="px-6 py-4 text-base" style="font-family: 'Sekuya', system-ui;">No</th>
                        <th class="px-6 py-4 text-base" style="font-family: 'Sekuya', system-ui;">Title</th>
                        <th class="px-6 py-4 text-base" style="font-family: 'Sekuya', system-ui;">Image</th>
                        <th class="px-6 py-4 text-base" style="font-family: 'Sekuya', system-ui;">total paragraphs</th>
                        <th class="px-6 py-4 text-base" style="font-family: 'Sekuya', system-ui;">actions</th>
                    </tr>
                </thead>

                @foreach ($news as $item)
                    <tbody class="divide-y divide-slate-100">

                        <tr class="hover:bg-slate-50 transition ">
                            <td class="px-6 py-4 font-semibold text-base" style="font-family: 'Sekuya', system-ui;">
                                {{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-semibold  text-base" style="font-family: 'Sekuya', system-ui;">
                                {{ $item->title }}</td>
                            <td class="px-6 py-4  text-slate-600 text-base" style="font-family: 'Sekuya', system-ui;">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                    class="mx-auto w-16 h-16 object-cover rounded-lg">
                            </td>
                            <td class="px-6 py-4" style="font-family: 'Sekuya', system-ui;">
                                <span
                                    class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full font-medium text-base">{{ count($item->paragraphs ?? []) }}</span>
                            </td>
                           
                            <td class="px-4 py-3 text-center" style="font-family: 'Sekuya', system-ui;">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('admin.news.edit', $item->id) }}"
                                        class="px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-white rounded-md text-md font-medium transition">
                                        Edit
                                    </a>
                                    <a href=""
                                        class="px-3 py-1 bg-blue-400 hover:bg-blue-500 text-white rounded-md text-md font-medium transition">
                                        Show
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus?')" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md text-md font-medium transition cursor-pointer"
                                            data-toggle="tooltip" data-original-title="Delete product">
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection