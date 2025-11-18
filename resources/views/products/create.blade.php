@extends('layouts.app')
@section('title', 'Add Product')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow p-8 rounded-2xl mt-12">

    <h1 class="text-3xl font-bold mb-6">Add Product</h1>

    <form method="POST" action="{{ route('products.store') }}" class="space-y-6">
        @csrf

        <div>
            <label>Name</label>
            <input name="name" class="w-full p-3 border rounded-xl" required>
        </div>

        <div>
            <label>Category</label>
            <input name="category" class="w-full p-3 border rounded-xl">
        </div>

        <div>
            <label>Stock</label>
            <input name="stock" type="number" class="w-full p-3 border rounded-xl" required>
        </div>

        <div>
            <label>Price</label>
            <input name="price" type="number" step="0.01" class="w-full p-3 border rounded-xl" required>
        </div>

        <div>
            <label>Status</label>
            <select name="status" class="w-full p-3 border rounded-xl">
                <option value="Available">Available</option>
                <option value="Out of Stock">Out of Stock</option>
            </select>
        </div>

        <button class="px-6 py-3 bg-indigo-600 text-white rounded-xl">Save</button>
    </form>
</div>
@endsection
