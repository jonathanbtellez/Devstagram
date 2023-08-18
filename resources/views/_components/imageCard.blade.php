<div>
    {{-- Dinamic url receive a path and a param --}}
    @if ($useUrl)
        <a href='{{ route($path, $params) }}'>
            {{-- Construct the URL --}}
            <img src={{ asset('uploads') . '/' . $image }} alt='Imagen del post {{ $title }}'>
        </a>
    @else
        <img src={{ asset('uploads') . '/' . $image }} alt='Imagen del post {{ $title }}'>
    @endif
</div>
