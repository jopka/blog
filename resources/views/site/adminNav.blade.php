
@if($menu)
    
    @foreach ($menu as $item)
        <ul>
            <li><a href="{{ $prefix }}{{ $item->link->path['url'] }}">{{ $item->title }}</a></li>
            <!--<li><a class="btn btn-xs btn-danger" id="{{$item->Id}}" onclick="delete_menu(this.id)" href="#" rel="nofollow" >Удалить</a></li>-->
            <li>
                <form action="{{ $prefix }}{{ $item->id }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <button class="btn btn-default" type="submit">Удалить</button>
                </form>
            </li>
            <li><a href="{{ $prefix }}{{ $item->id }}/edit/">Изменить</a></li>
        </ul>
    @endforeach
    <ul>
        <li>
            <a href="{{ $prefix }}create/">Добавить</a>
        </li>
    </ul>

    @endif