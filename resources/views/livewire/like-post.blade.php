<div>
    {{-- The whole code need wrap in a div component --}}
    <div class="p-3 flex items-center gap-2">
        <button wire:click="like" class="flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="{{ $hasLike ? 'red' : 'gray' }}"
                class="bi bi-heart-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
            </svg>
        </button>
        <p class="font-bold">{{ $likes }}
            <span class="font-normal">
                {{ $likes === 1 ? 'like' : 'likes' }}
            </span>
        </p>
    </div>
</div>
