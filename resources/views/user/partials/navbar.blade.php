<nav class="bg-white shadow fixed top-0 inset-x-0 z-50">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <!-- Left: Logo or Brand -->
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/logo.png') }}" alt="AgriCentral Logo" class="h-10 w-auto" draggable="false">
            {{-- <span class="text-xl font-semibold text-blue-600">AgriCentral</span> <!-- Optional: keep brand name --> --}}
        </div>

        <!-- Center: Navigation Links -->
        <div class="space-x-6 text-gray-700 font-medium">
            <a href="{{ route('user.home') }}" class="hover:text-blue-600" draggable="false">Home</a>
            <a href="{{ route('user.shop') }}" class="hover:text-blue-600">Shop</a>
            <a href="{{ route('user.marketprice') }}" class="hover:text-blue-600">Market-view</a>  
            <a href="{{ route('about')}}" class="hover:text-blue-600">About</a>
             <a href="{{ route('blog')}}" class="hover:text-blue-600">Blog</a>
        </div>

        <!-- Right: Welcome + Logout -->
        <div class="flex items-center space-x-4">
            <span class="text-sm text-gray-600">Welcome, {{ Auth::user()->name }}</span>
            
            <form method="POST" action="{{ route('user.logout') }}">
                @csrf
                <button type="submit" class="text-sm text-red-600 hover:underline">Logout</button>
            </form>
        </div>
    </div>
</nav>

