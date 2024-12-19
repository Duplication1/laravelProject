<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg">Add a New Product</h3>

                    @if (session('success'))
                    <div>{{ session('success') }}</div>
                @endif
                
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                
                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                        @error('name') <div>{{ $message }}</div> @enderror
                    </div>
                
                    <div>
                        <label for="type">Type</label>
                        <select name="type" id="type" required>
                            <option value="fruit">Fruit</option>
                            <option value="meat">Meat</option>
                        </select>
                        @error('type') <div>{{ $message }}</div> @enderror
                    </div>
                
                    <div>
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" value="{{ old('price') }}" required>
                        @error('price') <div>{{ $message }}</div> @enderror
                    </div>
                
                    <div>
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image">
                        @error('image') <div>{{ $message }}</div> @enderror
                    </div>
                
                    <button type="submit">Add Product</button>
                </form>
                    </x-app-layout>