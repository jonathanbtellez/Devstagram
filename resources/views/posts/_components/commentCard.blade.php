<div class="p-5 border-gray-300 border-b">
    <p>{{ $comment }}</p>
    <div class="flex flex-row  justify-between align-middle">
        <a href="{{route('posts.index', $user)}}" class="text-sm text-gray-500">{{ $user }}</a>
        <p class="text-sm text-gray-400">{{ $dateComment->diffForHumans() }}</p>
    </div>
</div>
