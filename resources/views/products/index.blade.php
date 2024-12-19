<!-- filepath: /c:/xampp/htdocs/dashboard/laravel_project/resources/views/products/index.blade.php -->
<x-app-layout>
    <div class="product-list mx-auto w-3/4">
        <h1 class="text-2xl font-bold mb-4">Products</h1>
        <table id="products-table" class="table-auto border-collapse border border-gray-300 w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">Image</th>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Type</th>
                    <th class="border border-gray-300 px-4 py-2">Price</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $product->type }}</td>
                        <td class="border border-gray-300 px-4 py-2">${{ $product->price }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('products.show', $product->id) }}" class="text-blue-500">View Details</a>
                            <button @click="$dispatch('open-modal', { name: 'confirm-delete-modal', productId: {{ $product->id }} })" class="text-red-500 ml-2">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Include the delete modal component -->
    <x-delete-modal />
</x-app-layout>