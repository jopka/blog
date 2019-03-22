<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\ArticlesRepository;

use Menu;

use App\Page;
use App\Article;

class SearchController extends SiteController
{
    //

    public function __construct(ArticlesRepository $a_rep){

        $this->a_rep = $a_rep;

        parent::__construct(new \App\Repositories\MenusRepository(new \App\Page));

        $this->template = env('THEME').'.articles';
        
    }

    public function index($page = 1){
        //dd($alias);

        $articles = $this->getSearch();
        //$content = view(env('THEME').'.nav')->with('menu',$articles)->render();

        
        $this->vars = array_add($this->vars,'content',$articles);
        return $this->renderOutput();
    }


    public function getSearch(){
        //$menu = $this->a_rep->get(['alias'=>$alias]);
        $article = \App\Article::where('text', 'like', $_GET['q'])
        ->orWhere('name', 'like', $_GET['q'])
        ->get();
        $article = $article[0];
        return $article;
    }

}
