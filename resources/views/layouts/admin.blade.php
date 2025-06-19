<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" rel="stylesheet">
</head>
<body class="h-full bg-gray-100 text-gray-800 flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-green-800 text-white flex flex-col py-6 px-4 shadow-lg">
        <!-- Logo Area -->
        <div class="flex flex-col items-start space-y-2 mb-8 ml-5">
            <img src="{{ asset('images/logo.png') }}" alt="AgriCentral Logo" class="h-16 w-16 object-contain bg-white rounded-full p-1" draggable="false"   >
            <span class="text-xl font-bold tracking-wide">AgriCentral</span>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 space-y-3">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-700 {{ request()->routeIs('admin.dashboard') ? 'bg-green-700' : '' }}">
                <i class="uil uil-estate"></i> Dashboard
            </a>
            <a href="{{ route('admin.product.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-700">
                <i class="uil uil-box"></i> Products
            </a>
            <a href="{{ route('admin.category.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-700">
                <i class="uil uil-list-ul"></i> Categories
            </a>
            <a href="{{ route('admin.customer.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-700">
                <i class="uil uil-users-alt"></i> Customers
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-700">
                <i class="uil uil-shopping-cart-alt"></i> Orders
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-700">
                <i class="uil uil-file-alt"></i> Pages
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-700">
                <i class="uil uil-copy-alt"></i> Static Blocks
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-700">
                <i class="uil uil-user"></i> Admins
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-700">
                <i class="uil uil-lock-alt"></i> Roles
            </a>
        </nav>

        <!-- Logout -->
        <div class="mt-auto">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-2 text-sm px-3 py-2 rounded hover:bg-red-600 hover:text-white transition-all">
                    <i class="uil uil-signout"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto">
        <h1 class="text-3xl font-bold text-green-800 mb-4">Admin Dashboard</h1>
        <hr class="mb-6 border-t border-green-300">

        @yield('content')
    </main>

</body>
</html>
