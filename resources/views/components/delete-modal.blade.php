<!-- filepath: /c:/xampp/htdocs/dashboard/laravel_project/resources/views/components/delete-modal.blade.php -->
<x-modal name="confirm-delete-modal" :show="false" maxWidth="md">
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Confirm Deletion</h2>
        <p>Are you sure you want to delete this product?</p>
        <div class="mt-4 flex justify-end">
            <button @click="$dispatch('close-modal', 'confirm-delete-modal')" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
            <form id="delete-product-form" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
            </form>
        </div>
    </div>
</x-modal>
@push('scripts')
<script>
    document.addEventListener('open-modal', event => {
        if (event.detail.name === 'confirm-delete-modal') {
            const form = document.getElementById('delete-product-form');
            form.action = `/products/${event.detail.productId}`;
        }
    });
</script>
@endpush