@extends('layoutAdmin.app')
@section('title', 'Votes Management')

@section('content')
    <!-- <div class="flex justify-between items-end mb-8">
        
        <button
            class="bg-indigo-600 text-white px-5 py-2.5 rounded-xl font-medium shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition">
            + Tambah Report
        </button>
    </div> -->


    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center">
            <h3 class="text-lg font-bold">View Votes</h3>
            <a href="#" class="text-indigo-600 text-sm font-semibold hover:underline">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-slate-400 uppercase text-xs font-semibold">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Username</th>
                        <th class="px-6 py-4">Option Pick</th>
                        <th class="px-6 py-4">Device id</th>
                        <th class="px-6 py-4">Suggestion</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach ($votes as $item )
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ $item->user->name }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ $item->option }}</td>
                        <td class="px-6 py-4">
                            <span
                                class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-medium">{{ $item->device_id }}</span>
                        </td>
                        <td class="px-6 py-4 font-bold">{{ $item->suggestion ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection