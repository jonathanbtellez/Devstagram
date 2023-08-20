<div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-5 p-5">
            {{-- Iterate an array --}}
            @foreach ($posts as $post)
                {{-- Replace html for a component that can be use in others views --}}
                @component('_components.imageCard')
                    {{-- Puth a condition to use or not ancor tag --}}
                    @slot('useUrl', true)

                    {{-- Redirect to post/{id} view --}}
                    @slot('path', 'posts.show')
                    @slot('params', ['post' => $post, 'user' => $post->user])

                    {{-- Show info of the image in our view --}}
                    @slot('image', $post->image)
                    @slot('title', $post->title)
                @endcomponent
            @endforeach
        </div>
        <div class="p-5">
            {{-- Show the pagination in the template --}}
            {{ $posts->links() }}
        </div>
    @else
        <p class="text-gray-600 uppercase text-sm text-center font-bold my-7">No hay posts, sigue a tus amigos y no te
            pierdas los mejores posts</p>
    @endif
</div>
