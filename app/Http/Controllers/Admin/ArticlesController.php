<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\ArticlesRepository;

use App\Http\Controllers\Controller;

use App\Article;

class ArticlesController extends AdminController
{
    public function __construct(ArticlesRepository $a_rep){


        $this->a_rep = $a_rep;
        $this->template = env('THEME').'.articles';

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->content = view(env('THEME').'.updateArticle')->render();
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
        //($request['roomName']);
        return Article::create([
            'roomName' => $request['roomName'],
            'name' => $request['name'],
            'manager' => $request['manager'],
            'user' => $request['user'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article = $this->getArticle($id);
        
        $this->vars = array_add($this->vars,'articles',$article);

        return $this->renderOutput();
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
        //dd($id);
        $article = $this->getArticle($id);
        //$room = $room->except();
        
        //$room = json_encode($room);
        $this->content = view(env('THEME').'.updateArticle')->with(['article' =>$article])->render();
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
        return Article::where('id', $id)->update($request);
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
        return Article::destroy($id);
    }

    public function getArticle($id){
        //$menu = $this->a_rep->get(['alias'=>$alias]);
        $article = \App\Article::where('id', '=', $id)->get();
        $article = $article[0];
        return $article;
    }
}