@extends(env('THEME').'.layouts.site')

@section('nav-pull-down')
    @if($nav)
        <nav id="menu">
            {!! $nav !!}
        </nav>
    @endif
@endsection

@section('header')
    @include(env('THEME').'.header')
@endsection

@section('nav')
    <nav>
        {!! $nav !!}
    </nav>
@endsection

@section('main')
    @include(env('THEME').'.main')
@endsection

@section('footer')
    @include(env('THEME').'.footer')
@endsection