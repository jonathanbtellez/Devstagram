
<form action="{{ route($route, $user)}}" method="POST">
    @csrf
    @if ($method)
        @method('DELETE')
    @endif
    <input
      type="submit"
      class="uppercase px-3 py-1 text-xs font-bold cursor-pointer rounded-lg bg-gradient-to-r {{$method ? 'from-pink-400 to-yellow-300 hover:from-pink-500 hover:to-yellow-400' : 'from-purple-400 to-blue-300 hover:from-purple-500 hover:to-blue-400'}} text-white" 
      value="{{$value}}"
      />
</form>