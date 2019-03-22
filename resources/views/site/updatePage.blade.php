@extends(env('THEME').'.admin.update')

@section('header')
    @include(env('THEME').'.admin-header')
@endsection
<!--
@section('nav')
    @if(isset($nav))
        {!! $nav !!}
    @endif
@endsection
-->
@section('main')
    @include(env('THEME').'.upPage')
@endsection
