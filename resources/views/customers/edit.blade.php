<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto py-12 px-6">

        <h1 class="text-4xl font-bold text-gray-800 mb-10">
            Edit Customer
        </h1>

        <form action="{{ route('customers.update', $customer) }}" method="POST"
              class="bg-white shadow rounded-2xl p-8 space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 text-gray-700">Name</label>
                <input type="text" name="name" value="{{ $customer->name }}"
                       class="w-full p-3 bg-gray-50 border rounded-xl" required>
            </div>

            <div>
                <label class="block mb-1 text-gray-700">Company</label>
                <input type="text" name="company" value="{{ $customer->company }}"
                       class="w-full p-3 bg-gray-50 border rounded-xl" required>
            </div>

            <div>
                <label class="block mb-1 text-gray-700">Phone</label>
                <input type="text" name="phone" value="{{ $customer->phone }}"
                       class="w-full p-3 bg-gray-50 border rounded-xl" required>
            </div>

            <div>
                <label class="block mb-1 text-gray-700">Email</label>
                <input type="email" name="email" value="{{ $customer->email }}"
                       class="w-full p-3 bg-gray-50 border rounded-xl" required>
            </div>

            <div>
                <label class="block mb-1 text-gray-700">Country</label>
                <input type="text" name="country" value="{{ $customer->country }}"
                       class="w-full p-3 bg-gray-50 border rounded-xl" required>
            </div>

            <div>
                <label class="block mb-1 text-gray-700">Status</label>
                <select name="status" class="w-full p-3 bg-gray-50 border rounded-xl">
                    <option value="Active"   {{ $customer->status=='Active'?'selected':'' }}>Active</option>
                    <option value="Inactive" {{ $customer->status=='Inactive'?'selected':'' }}>Inactive</option>
                </select>
            </div>

            <div class="flex justify-between pt-4">
                <a href="{{ route('customers.index') }}"
                    class="px-5 py-3 bg-gray-300 rounded-xl hover:bg-gray-400">
                    Cancel
                </a>

                <button class="px-6 py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700">
                    Update
                </button>
            </div>
        </form>

    </div>
</body>
</html>
