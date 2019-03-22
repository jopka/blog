<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Repositories\ArticlesRepository;

use Menu;

use App\Page;
use App\Article;

class IndexController extends AdminController
{
    //

    public function __construct(ArticlesRepository $a_rep){

        $this->a_rep = $a_rep;

        parent::__construct(new \App\Repositories\MenusRepository(new \App\Page));

        $this->template = env('THEME').'.articles';
        
    }

    public function index($alias=''){
        //dd($alias);
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



}
