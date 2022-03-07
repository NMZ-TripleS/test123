<div class="p-2">
    <form wire:submit.prevent="store">
        <label>CATEGORY NAME</label>
        <input type="text" class="py-2 px-1 w-full border-2 rounded-md" wire:model="category.name">
        @error('category.name') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
        
        <button class="w-full mt-2 bg-blue-500 text-white py-2 rounded-sm" type="submit">Save Category</button>
    </form>
</div>
