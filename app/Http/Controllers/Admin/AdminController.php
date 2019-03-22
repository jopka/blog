<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Repositories\MenusRepository;

use Menu;

class AdminController extends \App\Http\Controllers\SiteController
{
    //

    protected $m_rep;
    protected $a_rep;
    protected $s_rep;
    protected $f_rep;

    protected $temlate;

    protected $vars = array();

    public function __construct(MenusRepository $m_rep){
        $this->m_rep = $m_rep;
    }

    protected function renderOutput($idURL = ['id' => 0, 'url' => '']){
        $menu = $this->getMenu($this->m_rep, 'MyNav', $idURL['id'], $idURL['url']);


        // add a meta data to children of Users

        $nav = view(env('THEME').'.adminNav')->with('menu',$menu->items)->with('prefix', '/admin/page/')->render();
        $this->vars = array_add($this->vars,'nav',$nav);
        //dd(view($this->template)->with($this->vars));
        return view($this->template)->with($this->vars);
    }
/*
    protected function getMenu($menu, $name, $id = 0, $url = ''){

        $menu = $menu->get(['page_id'=>$id]);
        
        /*
        $mBuilder = [];
        foreach($menu as $item){
            $mBuilder[$item->id] = ['name' => $item->name, 'alias' => $item->alias];
        }
        
        $mBuilder = Menu::make($name, function($m) use($menu, $url){

            foreach($menu as $item){
                $str = $url . $item->alias;

                $m->group(['prefix' => 'admin', 'data-info' => 'test'], function($men) use($str,$item){

                    //$men->add('A', $str);
                    $men->add($item->name, ['url'  => $str, 'class' => 'navbar navbar-about dropdown']);
                        //->append('<ol><li><a href="admin/pages/' . $item->id . '" data-method="delete">Удалить</a></li><li><a href="admin/pages/' . $item->id . '/edit/">Изменить</a></li></ol>');
                    });

            }
        });
        /*
        $mBuilder = Menu::make($name, function($menu){

            $menu->group(['prefix' => 'pages', 'data-info' => 'test'], function($m){
                
                $m->add('About', 'about')
                    ->append(file_get_contents('adminNav.html', true));
        
                //$m->group(['prefix' => 'about', 'data-role' => 'navigation'], function($a){
        
                    //$m->about->add('Who we are', 'who-we-are?');
                    //$m->about->add('Who we are', 'who-we-are?');
                    //$m->add('Who we Goals', 'who-we-Goals?')->parent('about');
                    //$a->add('Our Goals', 'our-goals');
                //});
            });
          
          });
        //dd($mBuilder);
        return $mBuilder;
    }
*/
    protected function getPage($id){
        $menu = \App\Page::where('id', '=', $id)->get();
        return $menu;
    }

}
