<div class="{{ isset($fullPath) ? isset($article) ? 'id_body article' : 'id_body page' : 'id_body_index' }}" {{  $nav ? 'id=panel' : ''  }}>
    <header>
        <p>Имя твое - неизвестно,<br>
    Подвиг твой - бессмертен!</p>
                @if($nav) 
                    <div class="toggle-button" onclick="myFunction(this)">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                @endif
        <div class="wrapper article">
            <a href="/"><img src="{{ asset(env('THEME')) }}/img/war_mech_2.gif"></a>
            <p>сайт посвящен Второй Мировой войне (на данный момент на сайте присутствуют материалы только по
    Великой Отечественной войне)</p>
    @if(isset($fullPath))
        <nav>
            {!! $fullPath !!}
        </nav>
    @endif
        </div>
    </header>