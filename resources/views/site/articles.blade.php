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
    @if(isset($name))
        <h1>
            {!! $name !!}
        </h1>
    @endif

    @if($nav)
        <nav>
            {!! $nav !!}
        </nav>
    @endif
@endsection

@section('main')
    @if(isset($aticle))
        {!! $content !!}
        <aside>
        </aside>
    @else
        <main>
            {!! $content !!}
        </main>
    @endif
@endsection

@section('aside')
        @if(isset($aside))
            @include(env('THEME').'.aside')
        @endif
@endsection

@section('footer')
    @include(env('THEME').'.footer')
@endsection

