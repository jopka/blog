@extends(env('THEME').'.layouts.site')

@section('header')
    @include(env('THEME').'.header')
@endsection

@section('nav')
    {!! $nav !!}
@endsection

@section('main')
    @if(isset($fullPath))
        {!! $content !!}
    @endif
@endsection

