@extends('layouts.app')
@section('title', 'Edit Product')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow p-8 rounded-2xl mt-12">

    <h1 class="text-3xl font-bold mb-6">Edit Product</h1>

    <form method="POST" action="{{ route('products.update', $product->id) }}" class="space-y-6">
        @csrf @method('PUT')

        <div>
            <label>Name</label>
            <input name="name" class="w-full p-3 border rounded-xl" value="{{ $product->name }}" required>
        </div>

        <div>
            <label>Category</label>
            <input name="category" class="w-full p-3 border rounded-xl" value="{{ $product->category }}">
        </div>

        <div>
            <label>Stock</label>
            <input name="stock" type="number" class="w-full p-3 border rounded-xl" value="{{ $product->stock }}" required>
        </div>

        <div>
            <label>Price</label>
            <input name="price" type="number" step="0.01" class="w-full p-3 border rounded-xl" value="{{ $product->price }}" required>
        </div>

        <div>
            <label>Status</label>
            <select name="status" class="w-full p-3 border rounded-xl">
                <option value="Available" {{ $product->status=='Available'?'selected':'' }}>Available</option>
                <option value="Out of Stock" {{ $product->status=='Out of Stock'?'selected':'' }}>Out of Stock</option>
            </select>
        </div>

        <button class="px-6 py-3 bg-indigo-600 text-white rounded-xl">Update</button>
    </form>
</div>
@endsection
