<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use App\Article;

class IndexController extends SiteController
{
    //

    public function __construct(){

        parent::__construct(new \App\Repositories\MenusRepository(new \App\Page));

        $this->template = env('THEME').'.index';
        
    }

    public function index(){
        return $this->renderOutput();
    }

    public function articles($alias){
        dd($alias);
        return $this->renderOutput();
    }
    public function show($alias,$j = null){
        dd($alias,$j);
        return $this->renderOutput();
    }
}
