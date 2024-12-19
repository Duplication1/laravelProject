 <!-- Or your layout file -->

 <x-app-layout>
<div class="product-details mx-auto">
    <h1>{{ $product->name }}</h1>
    <p>Type: {{ $product->type }}</p>
    <p>Price: ${{ $product->price }}</p>

    @if ($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 300px;">
    @endif

    <a href="{{ route('products.index') }}">Back to Products</a>
</div>

</x-app-layout>