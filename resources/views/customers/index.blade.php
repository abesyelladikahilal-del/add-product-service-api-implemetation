@extends('layouts.app')

@section('title', 'Customers')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-12">
        <div>
            <h1 class="text-4xl font-extrabold bg-gradient-to-r from-indigo-600 to-indigo-400 text-transparent bg-clip-text">
                Customers
            </h1>
            <p class="text-gray-500 mt-1">Manage and monitor your customer list easily.</p>
        </div>

        <a href="{{ route('customers.create') }}"
           class="px-6 py-3 bg-indigo-600 text-white rounded-xl shadow-lg hover:bg-indigo-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            + Add Customer
        </a>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 mb-12">

        <div class="p-6 rounded-3xl bg-gradient-to-br from-indigo-400 to-indigo-600 text-white shadow-xl
            transition-all duration-300 hover:-translate-y-3 hover:shadow-indigo-500/50 hover:scale-105 hover:rotate-1">
            <p class="text-white/80 text-sm">Total Customers</p>
            <h3 class="text-4xl font-extrabold mt-2">{{ $stats['total'] }}</h3>
        </div>

        <div class="p-6 rounded-3xl bg-gradient-to-br from-green-400 to-green-600 text-white shadow-xl
            transition-all duration-300 hover:-translate-y-3 hover:shadow-green-500/50 hover:scale-105 hover:-rotate-1">
            <p class="text-white/80 text-sm">Active</p>
            <h3 class="text-4xl font-extrabold mt-2">{{ $stats['active'] }}</h3>
        </div>

        <div class="p-6 rounded-3xl bg-gradient-to-br from-red-400 to-red-600 text-white shadow-xl
            transition-all duration-300 hover:-translate-y-3 hover:shadow-red-500/50 hover:scale-105 hover:rotate-1">
            <p class="text-white/80 text-sm">Inactive</p>
            <h3 class="text-4xl font-extrabold mt-2">{{ $stats['inactive'] }}</h3>
        </div>

    </div>

    {{-- Filter --}}
    <div class="bg-white rounded-2xl p-6 shadow-lg mb-10 border border-gray-100">
        <form method="GET" action="{{ route('customers.index') }}" class="flex flex-wrap items-center gap-4">

            <input type="text" name="q" value="{{ request('q') }}"
                   placeholder="Search name, email, company..."
                   class="px-4 py-3 border rounded-xl w-64 bg-gray-50 focus:bg-white 
                          focus:ring-2 focus:ring-indigo-600 transition">

            <select name="status" 
                    class="px-4 py-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-indigo-600 transition">
                <option value="">All Status</option>
                <option value="Active" {{ request('status')=='Active'?'selected':'' }}>Active</option>
                <option value="Inactive" {{ request('status')=='Inactive'?'selected':'' }}>Inactive</option>
            </select>

            <button class="px-6 py-3 bg-indigo-600 text-white rounded-xl shadow hover:bg-indigo-700 hover:shadow-xl transition">
                Filter
            </button>
        </form>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b">
                <tr class="text-gray-600 text-sm">
                    <th class="py-4 px-6">Name</th>
                    <th class="px-6">Company</th>
                    <th class="px-6">Phone</th>
                    <th class="px-6">Email</th>
                    <th class="px-6">Country</th>
                    <th class="px-6">Status</th>
                    <th class="px-6 w-36"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($customers as $c)
                <tr class="border-b hover:bg-indigo-50 transition-all">
                    <td class="py-4 px-6 font-medium text-gray-800">{{ $c->name }}</td>
                    <td class="px-6">{{ $c->company }}</td>
                    <td class="px-6">{{ $c->phone }}</td>
                    <td class="px-6">{{ $c->email }}</td>
                    <td class="px-6">{{ $c->country }}</td>

                    <td class="px-6">
                        <span class="px-3 py-1 text-sm rounded-full
                            {{ $c->status=='Active'
                                ? 'bg-green-100 text-green-700'
                                : 'bg-red-100 text-red-700' }}">
                            {{ $c->status }}
                        </span>
                    </td>

                    <td class="px-6 flex gap-5">

                        <a href="{{ route('customers.edit', $c->id) }}"
                           class="text-indigo-600 font-semibold hover:underline hover:text-indigo-800 transition">
                            Edit
                        </a>

                        <form action="{{ route('customers.destroy', $c) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this customer?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600 font-semibold hover:underline hover:text-red-800 transition">
                                Delete
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-8">
        {{ $customers->links() }}
    </div>

</div>
@endsection
