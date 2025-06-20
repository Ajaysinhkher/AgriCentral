@props(['categories'])

{{-- {{ dd('inside category filters') }} --}}

<aside class="w-64 bg-white border-r shadow-md p-4 sticky top-0 h-full">
    <h3 class="text-xl font-bold mb-4">Filter By Category</h3>
    @foreach ($categories as $category)
    <div class="flex items-center space-x-2">
        <input type="checkbox" class="category-checkbox" value="{{ $category->slug}}" id="cat{{ $category->id }}">
        <label for="cat{{ $category->id }}">{{$category->name}}</label>
    </div> 
    @endforeach
</aside>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.category-checkbox');

        checkboxes.forEach(cb => {
            cb.addEventListener('change', () => {
                // Collect selected slugs
                const selectedSlugs = Array.from(checkboxes)
                    .filter(c => c.checked)
                    .map(c => c.value);

                // Build query string
                const queryString = selectedSlugs.map(slug => `categories[]=${slug}`).join('&');

                // Make AJAX GET request
                fetch(`/shop/products/filter?${queryString}`)
                    .then(response => response.json())
                    .then(data => {
                        // Replace product grid HTML
                        document.getElementById('product-list').innerHTML = data.products;
                    });
            });
        });
    });
</script>

