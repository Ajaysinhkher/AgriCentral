@extends('layouts.app')
@section('content')
<div class="flex h-[calc(100vh-100px)]"> {{-- Full height minus header/footer --}}
    {{-- category filters --}}
    <x-user.categoryfilter :categories="$categories" />

    {{-- Products Section --}}
    <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
        <div class="text-center mb-10">
            <h2 class="text-4xl font-bold text-gray-900">Organic Seeds</h2>
            <p class="text-orange-500 text-xl mt-2">New seeds</p>
        </div>

        {{-- <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4"> --}}
           <div id="product-list" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                @include('user.partials.product-list', ['products' => $products])
            </div>

        {{-- </div> --}}
    </main>
</div>
{{ $products->links() }}

@endsection