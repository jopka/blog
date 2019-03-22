<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\ArticlesRepository;

use Menu;

use App\Page;
use App\Article;

class ArticleController extends SiteController
{
    //

    public function __construct(ArticlesRepository $a_rep){

        $this->a_rep = $a_rep;

        parent::__construct(new \App\Repositories\MenusRepository(new \App\Page));

        $this->template = env('THEME').'.articles';
        
    }

    public function index($alias){
        //dd($alias);
        $this->template = env('THEME').'.articles';
        $menu = $this->m_rep->get();
        
        
        //unset($menu[count($menu) - 1]);
        $fullPath = $this->getFullPath($alias, $menu);
        //dd($fullPath[count($fullPath) - 1]['name']);
        $this->vars = array_add($this->vars,'name',$fullPath[count($fullPath) - 1]['name']);
        unset($fullPath[count($fullPath) - 1]);
        $fullPathStr = view(env('THEME').'.fullPath')->with('fullPath',$fullPath)->render();
        $this->vars = array_add($this->vars,'fullPath',$fullPathStr);

        $idURL = $this->getMenuId($alias);
        $articles = $this->getMenu($this->a_rep, 'MyArticles', $idURL['id'], $alias . '/');
        //dd($articles);
        $content = view(env('THEME').'.nav')->with('menu',$articles)->render();
        //dd($fullPath);
        //dd($menu[0]->name);
        //$content = view(env('THEME').'.articles_content')->with('articles',$articles)->render();

        
        $this->vars = array_add($this->vars,'content',$content);
        return $this->renderOutput($idURL);
    }

    public function show($alias, $aliasArticle){
        $this->template = env('THEME').'.articles';
        $menu = $this->m_rep->get();
        $fullPath = $this->getFullPath($alias, $menu);
        $article = $this->getArticle($aliasArticle, $fullPath[count($fullPath) - 1]['id']);

        $fullPathStr = view(env('THEME').'.fullPath')->with('fullPath',$fullPath)->with('article', $article->name)->render();
        $this->vars = array_add($this->vars,'fullPath',$fullPathStr);

        $article = $this->getArticle($aliasArticle, $fullPath[count($fullPath) - 1]['id']);
        //dd($fullPathStr);
        $this->vars = array_add($this->vars,'alias','$alias');
        $this->vars = array_add($this->vars,'article','1');
        //$articleStr = view(env('THEME').'.article')->with('article',$article)->render();
        $article = view(env('THEME').'.article')->with('article',$article)->render();
        $this->vars = array_add($this->vars,'content',$article);
        $this->vars = array_add($this->vars,'nav',$article);
/*
        $article = \App\Article::where('page_id', '=', $article->id)
        ->orderBy(DB::raw('RAND()'))
        ->take(5)
        ->get();
        dd($article);
        */
        return view($this->template)->with($this->vars);
        return $this->renderOutput($fullPath[count($fullPath) - 1]);
    }

    public function getArticle($alias, $id){
        //$menu = $this->a_rep->get(['alias'=>$alias]);
        $article = \App\Article::where('alias', '=', $alias)->where('page_id', '=', $id)->get();
        $article = $article[0];
        return $article;
    }

}
