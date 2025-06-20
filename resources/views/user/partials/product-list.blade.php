@forelse ($products as $product)
    <x-user.productcard :product="$product" />
@empty
    <p class="col-span-full text-center text-gray-500">No products found for selected categories.</p>
@endforelse
