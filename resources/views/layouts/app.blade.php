<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 flex">

    {{-- Sidebar --}}
    <aside class="w-64 min-h-screen bg-white shadow-lg flex flex-col">

        <div class="p-6">
            <h1 class="text-xl font-bold flex items-center gap-2">
                <span class="text-indigo-600 text-2xl">⬡</span>
                Dashboard <span class="text-gray-400 text-sm">v0.1</span>
            </h1>
        </div>

        <nav class="flex-1 px-4 space-y-2">

            {{-- Home --}}
            <a href="{{ route('home') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-indigo-50
                      {{ request()->routeIs('home') ? 'bg-indigo-600 text-white' : 'text-gray-600' }}">
                🏠 <span>Home</span>
            </a>

            {{-- Customers --}}
            <a href="{{ route('customers.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-indigo-50
                      {{ request()->routeIs('customers.*') ? 'bg-indigo-600 text-white' : 'text-gray-600' }}">
                👤 <span>Customers</span>
            </a>

            {{-- Product --}}
            <a href="{{ route('products.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-indigo-50" <span>📦 Product</span>
            </a>

            {{-- Income --}}
            <a href="{{ route('income.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-indigo-50
          {{ request()->routeIs('income.*') ? 'bg-indigo-600 text-white' : 'text-gray-600' }}">
                💰 <span>Income</span>
            </a>

            {{-- Promote (placeholder) --}}
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 cursor-not-allowed">
                📣 <span>Promote</span>
            </a>

            {{-- Help (placeholder) --}}
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 cursor-not-allowed">
                ❓ <span>Help</span>
            </a>
        </nav>

        <div class="p-6 border-t">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gray-200"></div>
                <div>
                    <p class="font-semibold">Abe</p>
                    <p class="text-sm text-gray-500">Project Manager</p>
                </div>
            </div>
        </div>
    </aside>

    {{-- Main content --}}
    <main class="flex-1">
        @yield('content')
    </main>

</body>

</html>
