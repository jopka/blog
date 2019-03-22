<ul>
<li>
    <a href="/">Главная страница</a>
    </li>
    @if($fullPath)
        @foreach ($fullPath as $path)
            <li><a href="{{ $path['url'] }}">{{ $path['name'] }}</a></li>
        @endforeach
        <!--
        @if(isset($article))
            <li><a href="#" class="not-active">{{ $article }}</a></li>
        @endif
        -->
    @endif
</ul>