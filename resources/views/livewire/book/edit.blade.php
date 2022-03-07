<div>
    <form wire:submit.prevent="store" class="p-2">
        <div class="my-4">
            <label>TITLE</label>
            <input type="text" class="py-2 px-1 w-full border-2 rounded-md" wire:model="book.title">
            @error('book.title') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
        </div>
        <div class="my-4">
            <label>SUBTITLE</label>
            <input type="text" class="py-2 px-1 w-full border-2 rounded-md" wire:model="book.sub_title">
            @error('book.sub_title') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
        </div>
        <div class="w-full grid grid-cols-3 gap-2">
            @foreach ($images as $image)
            @if ($image) 
            <div class="p-2 rounded-md border-separate border-green-400 border-2">
                <img class="w-full" src="{{$image}}" alt="">
            </div>
            @endif
            @endforeach
            </div>
        <div class="my-4">
            <label>IMAGES</label>
            <input type="text" class="py-2 px-1 w-full border-2 rounded-md" wire:model="book.image_urls">
            @error('book.image_urls') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
        </div>
        <div class="w-full grid grid-cols-3 gap-2">
        @foreach ($pdfs as $pdf)
        @if (str_contains($pdf,":")) 
        <div class="p-2 rounded-md border-separate border-green-400 border-2">
                
            <a class=" underline text-blue-500" href="{{'https://drive.google.com/uc?id='.explode(":",$pdf)[0].'&export=pdf&'.explode(":",$pdf)[1].'.pdf'}}" target="_blank" rel="noopener noreferrer">{{explode(":",$pdf)[1].'.pdf'}}</a>
        </div>
        @endif
        @endforeach
        </div>
        <div class="my-4">
            <label>PDFS ( pdf links wiht commas no space )</label>
            <input type="text" class="py-2 px-1 w-full border-2 rounded-md" wire:model="book.pdf_urls">
            @error('book.pdf_urls') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
        </div>
        <div class="w-full grid grid-cols-3 gap-2">
        @foreach ($videos as $video)
        @if ($video)  
            
                <div class="p-2 rounded-md border-separate border-green-400 border-2">
                    <iframe class="w-full" src="{{'https://www.youtube.com/embed/'.$video}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
        @endif

        @endforeach
        </div>  
        <div class="my-4">
            <label>VIDEOS ( only youtube ids with commas no space )</label>
            <input type="text" class="py-2 px-1 w-full border-2 rounded-md" wire:model="book.video_urls">
            @error('book.video_urls') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="w-full grid grid-cols-3 gap-2">
            
        @foreach ($mp3s as $mp3)
        
        @if ($mp3)  
                
                <div class="p-2 rounded-md border-separate border-green-400 border-2">
                    <audio controls>
                        <source src="{{$mp3}}">
                    </audio>
                </div>
        @endif
        @endforeach
        </div>
        <div class="my-4">
            <label>MP3S ( only youtube ids with commas no space )</label>
            <input type="text" class="py-2 px-1 w-full border-2 rounded-md" wire:model="book.mp3_urls">
            @error('book.mp3_urls') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
        </div>
        <div class="my-4">
            <label>DESCRIPTION</label>
            <textarea class="py-2 px-1 w-full border-2 rounded-md" wire:model="book.description">
            </textarea>
            @error('book.description') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
        </div>
        <div class="my-4">
            <label>CATEGORY IDS</label>
            <select class="py-2 px-1 w-full border-2 rounded-md" multiple wire:model="catIds">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" >{{$category->name}}</option>
                @endforeach
            </select>
            @error('book.video_urls') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
        </div>
        <button class="w-full mt-2 bg-blue-500 text-white py-2 rounded-sm" type="submit">Save Category</button>
    </form>
</div>
