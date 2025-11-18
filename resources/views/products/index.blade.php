@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-6">

    <div class="flex justify-between items-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800">Products</h1>

        <a href="{{ route('products.create') }}"
           class="px-6 py-3 bg-indigo-600 text-white rounded-xl shadow-md hover:bg-indigo-700 transition">
            + Add Product
        </a>
    </div>

    {{-- Filter --}}
    <div class="bg-white rounded-2xl p-6 shadow-sm mb-10">
        <form method="GET" action="{{ route('products.index') }}" class="flex flex-wrap gap-4">

            <input type="text" name="q" value="{{ request('q') }}"
                   placeholder="Search product..."
                   class="px-4 py-3 border rounded-xl w-64 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-indigo-600">

            <select name="status" class="px-4 py-3 border rounded-xl bg-gray-50 focus:ring-indigo-600">
                <option value="">All Status</option>
                <option value="Available" {{ request('status')=='Available'?'selected':'' }}>Available</option>
                <option value="Out of Stock" {{ request('status')=='Out of Stock'?'selected':'' }}>Out of Stock</option>
            </select>

            <button class="px-5 py-3 bg-indigo-600 text-white rounded-xl shadow hover:bg-indigo-700 transition">
                Filter
            </button>
        </form>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b">
                <tr class="text-gray-600 text-sm">
                    <th class="py-4 px-6">Name</th>
                    <th class="px-6">Category</th>
                    <th class="px-6">Stock</th>
                    <th class="px-6">Price</th>
                    <th class="px-6">Status</th>
                    <th class="px-6 w-32"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $p)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="py-4 px-6">{{ $p->name }}</td>
                    <td class="px-6">{{ $p->category }}</td>
                    <td class="px-6">{{ $p->stock }}</td>
                    <td class="px-6">${{ number_format($p->price, 2) }}</td>

                    <td class="px-6">
                        <span class="px-3 py-1 text-sm rounded-full
                            {{ $p->status=='Available'
                                ? 'bg-green-100 text-green-700'
                                : 'bg-red-100 text-red-700' }}">
                            {{ $p->status }}
                        </span>
                    </td>

                    <td class="px-6 flex gap-4">
                        <a href="{{ route('products.edit', $p->id) }}"
                           class="text-indigo-600 hover:underline">
                            Edit
                        </a>

                        <form action="{{ route('products.destroy', $p->id) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-8">
        {{ $products->links() }}
    </div>

</div>
@endsection
