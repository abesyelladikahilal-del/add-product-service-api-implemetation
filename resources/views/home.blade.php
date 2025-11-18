@extends('layouts.app')

@section('title', 'Home')

{{-- Animasi khusus hanya untuk halaman Home --}}
<style>
    /* Fade in seluruh container */
    .home-fade {
        animation: fadeIn 0.7s ease forwards;
        opacity: 0;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* Floating ilustrasi (naik turun halus) */
    .floating {
        animation: floatAnim 4s ease-in-out infinite;
    }

    @keyframes floatAnim {
        0%   { transform: translateY(0); }
        50%  { transform: translateY(-10px); }
        100% { transform: translateY(0); }
    }
</style>

@section('content')
<div class="max-w-7xl mx-auto py-12 px-6 home-fade">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">Welcome👋</h1>
            <p class="text-gray-600 mt-1">
                Here's an overview of your business performance today.
            </p>
        </div>
        
        <div class="hidden sm:block">
            <img src="https://cdn-icons-png.flaticon.com/512/9308/9308637.png"
                 class="w-28 opacity-90 floating"
                 alt="Dashboard Illustration">
        </div>
    </div>

    {{-- Stats Card --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">

        <div class="bg-white p-6 rounded-2xl shadow transition transform hover:-translate-y-1 hover:scale-[1.02] hover:shadow-xl">
            <p class="text-gray-500 text-sm mb-1">Total Customers</p>
            <h2 class="text-3xl font-bold text-gray-800">128</h2>
            <p class="text-green-600 text-sm mt-1">↑ 12% this month</p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow transition transform hover:-translate-y-1 hover:scale-[1.02] hover:shadow-xl">
            <p class="text-gray-500 text-sm mb-1">Monthly Income</p>
            <h2 class="text-3xl font-bold text-gray-800">$4,230</h2>
            <p class="text-blue-600 text-sm mt-1">↑ 8% growth</p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow transition transform hover:-translate-y-1 hover:scale-[1.02] hover:shadow-xl">
            <p class="text-gray-500 text-sm mb-1">Pending Tasks</p>
            <h2 class="text-3xl font-bold text-gray-800">6</h2>
            <p class="text-red-600 text-sm mt-1">Action Required</p>
        </div>

    </div>

    {{-- Quick Action Buttons --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-12">

        <a href="{{ route('customers.index') }}"
           class="bg-indigo-600 text-white p-6 rounded-2xl shadow transition transform hover:-translate-y-1 hover:scale-[1.02] hover:shadow-xl text-center">
            <h3 class="text-xl font-semibold mb-2">Manage Customers</h3>
            <p class="text-sm opacity-90">View, edit, and add new customers</p>
        </a>

        <a href="{{ route('income.index') }}"
           class="bg-green-600 text-white p-6 rounded-2xl shadow transition transform hover:-translate-y-1 hover:scale-[1.02] hover:shadow-xl text-center">
            <h3 class="text-xl font-semibold mb-2">Track Income</h3>
            <p class="text-sm opacity-90">Monitor your financial growth</p>
        </a>

        <a href="#"
           class="bg-yellow-500 text-white p-6 rounded-2xl shadow transition transform hover:-translate-y-1 hover:scale-[1.02] hover:shadow-xl text-center">
            <h3 class="text-xl font-semibold mb-2">Settings</h3>
            <p class="text-sm opacity-90">Customize your dashboard</p>
        </a>

    </div>

    {{-- Bottom Card --}}
    <div class="bg-gradient-to-r from-indigo-500 to-indigo-700 text-white p-10 rounded-2xl shadow-lg transition transform hover:-translate-y-1 hover:scale-[1.01]">
        <h2 class="text-3xl font-bold mb-3">Need Quick Help?</h2>
        <p class="opacity-90 mb-5">
            Let me know if you want to add more pages, tables, charts, or custom dashboard features.
        </p>

        <a href="{{ route('customers.create') }}"
           class="inline-block bg-white text-indigo-700 px-6 py-3 rounded-xl shadow hover:bg-gray-100 transition">
            + Add New Customer
        </a>
    </div>

</div>
@endsection
