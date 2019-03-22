@if (isset($page->name)) 
    {!! Form::open(['url' => route('page.update',['id'=> $page->id]),
 'class'=>'contact-form wrapper_form','method'=>'PUT','enctype'=>'multipart/form-data']) !!}
 @else
    {!! Form::open(['url' => route('page.store'),
 'class'=>'contact-form wrapper_form','method'=>'POST ','enctype'=>'multipart/form-data']) !!}
 @endif
<p>Название</p>
{{ Form::text('name', isset($page->name) ? $page->name : '') }}

<p>URL</p>
{{ Form::text('alias', isset($page->alias) ? $page->alias : '') }}

<a id="back" href="#"><div id="backdiv"></div><span>Назад</span></a>
<button id="save">Сохранить</button>
{!! Form::submit('Click Me!'); !!}
{!! Form::close() !!}