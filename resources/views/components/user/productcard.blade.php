@props(['product'])
{{-- @php
    
@dd('product')
@endphp --}}
{{-- {{ dd('Rendering ProductCard') }} --}}

{{-- {{ dd($product) }} --}}



<div class="text-center">
    {{-- Image container with relative positioning --}}
    <div class="relative w-36 h-36 mx-auto rounded-lg overflow-hidden group">
        <img src="{{ asset('storage/' . $product->image) }}"
             alt="{{ $product->name }}"
             class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-105" />

        {{-- Overlay only over the image --}}
        <div class="absolute inset-0 bg-lime-100 bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-60 transition duration-300">
            <a href="#" class="bg-white p-1.5 rounded-full shadow hover:scale-110 transition text-xs">
                <i class="fas fa-search text-orange-500"></i>
            </a>
            <form method="POST" action="#">
                @csrf
                <button class="bg-white p-1.5 rounded-full shadow hover:scale-110 transition text-xs">
                    <i class="fas fa-shopping-cart text-green-600"></i>
                </button>
            </form>
            <button class="bg-white p-1.5 rounded-full shadow hover:scale-110 transition text-xs">
                <i class="fas fa-heart text-red-500"></i>
            </button>
        </div>
    </div>

    {{-- Product name and price --}}
    <h3 class="mt-2 text-sm font-semibold text-gray-800 truncate">{{ $product->name }}</h3>
    <p class="text-green-600 font-semibold text-sm">₹{{ number_format($product->price, 2) }}</p>
</div>



