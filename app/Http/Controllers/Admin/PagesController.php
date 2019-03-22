<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\ArticlesRepository;
use App\Repositories\MenusRepository;
use App\Page;


class PagesController extends AdminController
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ArticlesRepository $a_rep, MenusRepository $p_rep){
        $this->p_rep = $p_rep;
        //$this->template = env('THEME').'.pages';

        $this->a_rep = $a_rep;

        parent::__construct(new \App\Repositories\MenusRepository(new \App\Page));

        $this->template = env('THEME').'.articles';
        
    }

    public function index($alias=''){
        $this->template = env('THEME').'.articles';
        $menu = $this->m_rep->get();
        $fullPath = $this->getFullPath($alias, $menu);
        
        $fullPathStr = view(env('THEME').'.fullPath')->with('fullPath',$fullPath)->render();
        $this->vars = array_add($this->vars,'fullPath',$fullPathStr);

        $idURL = $this->getMenuId($alias);

        $articles = $this->getMenu($this->a_rep, 'MyArticles', $idURL['id'], $alias . '/');
        $content = view(env('THEME').'.adminNav')->with('menu',$articles->items)->with('prefix', '/admin/articles/')->render();
        //$content = view(env('THEME').'.articles_content')->with('articles',$articles)->render();

        
        $this->vars = array_add($this->vars,'content',$content);
        //$content = '';
        
        $this->vars = array_add($this->vars,'content',$content);
        return $this->renderOutput($idURL);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->content = view(env('THEME').'./updatePage')->render();
        return $this->content;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->except('_token');
        //dd($request['name']);
        return Page::create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($alias){
        $this->template = env('THEME').'.articles';
        $menu = $this->m_rep->get();
        $fullPath = $this->getFullPath($alias, $menu);
        
        $fullPathStr = view(env('THEME').'.fullPath')->with('fullPath',$fullPath)->render();
        $this->vars = array_add($this->vars,'fullPath',$fullPathStr);

        $idURL = $this->getMenuId($alias);

        $articles = $this->getMenu($this->a_rep, 'MyArticles', $idURL['id'], $alias . '/');
        $content = view(env('THEME').'.adminNav')->with('menu',$articles->items)->with('prefix', '/admin/articles/')->render();
        //$content = view(env('THEME').'.articles_content')->with('articles',$articles)->render();

        
        $this->vars = array_add($this->vars,'content',$content);
        //$content = '';
        
        $this->vars = array_add($this->vars,'content',$content);
        return $this->renderOutput($idURL);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $page = $this->getPage($id);
        //$room = $room->except();
        //$room = json_encode($room);


        $this->content = view(env('THEME').'./updatePage')->with(['page' =>$page[0]])->render();
        //dd($this->content);
        //return redirect('/')->with($result);
        return $this->content;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $request = $request->except('_token', '_method');
        //dd($request);
        return Page::where('id', $id)->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Page::destroy($id);
        return redirect()->route('index');
    }
}
