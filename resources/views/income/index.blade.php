@extends('layouts.app')

@section('title', 'Income')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-6">

    <!-- Judul -->
    <h1 class="text-4xl font-extrabold mb-8 bg-gradient-to-r from-green-600 to-green-400 text-transparent bg-clip-text">
        Income Overview
    </h1>

    <!-- Card Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- Card 1 -->
        <div class="p-6 bg-white rounded-2xl shadow-lg transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl">
            <div class="flex items-center space-x-4">
                <div class="bg-green-100 p-4 rounded-xl">
                    <span class="text-green-600 text-3xl">💰</span>
                </div>
                <div>
                    <h3 class="text-xl font-bold">Total Income</h3>
                    <p class="text-gray-500 text-sm">Pendapatan keseluruhan</p>
                </div>
            </div>
            <h2 class="mt-5 text-3xl font-extrabold text-gray-700">Rp 0</h2>
        </div>

        <!-- Card 2 -->
        <div class="p-6 bg-white rounded-2xl shadow-lg transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl">
            <div class="flex items-center space-x-4">
                <div class="bg-blue-100 p-4 rounded-xl">
                    <span class="text-blue-600 text-3xl">📅</span>
                </div>
                <div>
                    <h3 class="text-xl font-bold">Income Bulan Ini</h3>
                    <p class="text-gray-500 text-sm">Laporan bulan berjalan</p>
                </div>
            </div>
            <h2 class="mt-5 text-3xl font-extrabold text-gray-700">Rp 0</h2>
        </div>

        <!-- Card 3 -->
        <div class="p-6 bg-white rounded-2xl shadow-lg transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl">
            <div class="flex items-center space-x-4">
                <div class="bg-purple-100 p-4 rounded-xl">
                    <span class="text-purple-600 text-3xl">📈</span>
                </div>
                <div>
                    <h3 class="text-xl font-bold">Growth</h3>
                    <p class="text-gray-500 text-sm">Perkembangan pendapatan</p>
                </div>
            </div>
            <h2 class="mt-5 text-3xl font-extrabold text-gray-700">0%</h2>
        </div>

    </div>

    <!-- Description -->
    <div class="mt-12 p-8 bg-gradient-to-r from-green-50 to-green-100 rounded-2xl shadow-md">
        <p class="text-gray-700 text-lg leading-relaxed">
            Selamat datang di halaman <strong>Income</strong>.  
            Di sini kamu bisa melihat ringkasan pendapatan dan perkembangan bisnis kamu.
        </p>
    </div>
</div>
@endsection
