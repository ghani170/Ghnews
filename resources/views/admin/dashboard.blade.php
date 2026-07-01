@extends('layoutAdmin.app')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="flex justify-between items-end mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Selamat Datang, Admin 👋</h1>
            <p class="text-slate-500">Inilah ringkasan performa bisnismu hari ini.</p>
        </div>
        <button
            class="bg-indigo-600 text-white px-5 py-2.5 rounded-xl font-medium shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition">
            + Tambah Report
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div class="p-3 bg-indigo-50 rounded-2xl text-indigo-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.407 2.67 1a2.49 2.49 0 00-2.67-1m-4.67 1c.59-.593 1.56-1 2.67-1m0 8c-1.11 0-2.08-.407-2.67-1a2.49 2.49 0 002.67 1m-4.67-1c-.59.593-1.56 1-2.67 1M12 5v14">
                        </path>
                    </svg>
                </div>
                <span class="text-emerald-500 text-sm font-bold bg-emerald-50 px-2 py-1 rounded-lg">+12.5%</span>
            </div>
            <h3 class="mt-4 text-slate-500 text-sm font-medium uppercase tracking-wider">Total Pendapatan</h3>
            <p class="text-3xl font-bold mt-1 text-slate-900">Rp 45.200.000</p>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div class="p-3 bg-violet-50 rounded-2xl text-violet-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <span class="text-emerald-500 text-sm font-bold bg-emerald-50 px-2 py-1 rounded-lg">+8.2%</span>
            </div>
            <h3 class="mt-4 text-slate-500 text-sm font-medium uppercase tracking-wider">Pelanggan Baru</h3>
            <p class="text-3xl font-bold mt-1 text-slate-900">1,284</p>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div class="p-3 bg-pink-50 rounded-2xl text-pink-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <span class="text-rose-500 text-sm font-bold bg-rose-50 px-2 py-1 rounded-lg">-2.4%</span>
            </div>
            <h3 class="mt-4 text-slate-500 text-sm font-medium uppercase tracking-wider">Rasio Konversi</h3>
            <p class="text-3xl font-bold mt-1 text-slate-900">4.12%</p>
        </div>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center">
            <h3 class="text-lg font-bold">Transaksi Terakhir</h3>
            <a href="#" class="text-indigo-600 text-sm font-semibold hover:underline">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-slate-400 uppercase text-xs font-semibold">
                    <tr>
                        <th class="px-6 py-4">Produk</th>
                        <th class="px-6 py-4">Customer</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4 font-medium">MacBook Pro M3</td>
                        <td class="px-6 py-4 text-slate-600">Alex Johnston</td>
                        <td class="px-6 py-4">
                            <span
                                class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-medium">Selesai</span>
                        </td>
                        <td class="px-6 py-4 font-bold">Rp 24.999.000</td>
                    </tr>
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4 font-medium">iPhone 15 Pro</td>
                        <td class="px-6 py-4 text-slate-600">Sarah Wijaya</td>
                        <td class="px-6 py-4">
                            <span
                                class="bg-amber-100 text-amber-700 px-3 py-1 rounded-full text-xs font-medium">Pending</span>
                        </td>
                        <td class="px-6 py-4 font-bold">Rp 18.500.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection