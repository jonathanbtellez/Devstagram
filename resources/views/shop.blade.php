{{-- Use directive @extends to get a main layout --}}
{{-- To use blade you don use end the sentences with semicolon --}}
{{-- To navigate in routes you dont use / you need use . --}}
@extends('layouts.app')

{{-- @section is use to populate the yield directive and this need have the same 'identifier' --}}
@section('title')
Tienda
{{-- Ending the send of data to the yield --}}
@endsection

@section('content')
<p>contenido de la pagina Tienda</p>
{{-- Ending the send of data to the yield --}}
@endsection
