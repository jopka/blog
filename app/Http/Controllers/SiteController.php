<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\MenusRepository;

use Menu;

class SiteController extends Controller
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
        //dd($menu->items);

        $nav = view(env('THEME').'.nav')->with('menu',$menu)->render();

        $this->vars = array_add($this->vars,'nav',$nav);
        //dd(view($this->template)->with($this->vars));
        return view($this->template)->with($this->vars);
    }

    protected function getMenuId($alias = null){
        if($alias){
            $menu = $this->m_rep->get();
            $id = $this->getId($alias, $menu);
            
            //$id = $menu[0]['attributes']['id'];
            $url = $alias . '-';
        }
        else{
            $id = 0;
            $url = '';
        }
        return ['id'=>$id, 'url'=>$url];
    }

    protected function getId($alias, $menu){
        $m_alias = explode("-", $alias);
        $id = 0;
        foreach($m_alias as $m_alia){
            foreach($menu as $item){
                if($item->alias == $m_alia && $id == $item->page_id){
                    $id = $item->id;
                    break;
                }
            }
        }
        
        return $id;
    }

    protected function getFullPath($alias, $menu){
        $m_alias = explode("-", $alias);
        $id = 0;
        $array = [];
        $str = '/';
        foreach($m_alias as $m_alia){
            foreach($menu as $item){
                if($item->alias == $m_alia && $id == $item->page_id){

                    array_push($array, ['id' => $item->id,'name' => $item->name, 'url' => $str . $item->alias]);
                    $str .= $item->alias . '-';
                    $id = $item->id;
                    break;
                }
            }
        }
        
        return $array;
    }
    /*
    // Замена getId
    */
    protected function getId2($alias){
        $m_alias = explode("-", $alias);
        //$mass = [];
        $id = 0;
        foreach($m_alias as $m_alia){
            /*
            $mass['alias'] = ['=', $m_alia];
            $mass['page_id'] = ['=', $id];
            */
            $menu = \App\Page::where('alias', '=', $m_alia)->where('page_id', '=', $id)->get();
            $id = $menu[0]['attributes']['id'];
        }
        
        return $id;
    }

    protected function getMenu($menu, $name, $id = 0, $url = ''){

        $menu = $menu->get(['page_id'=>$id]);
        
        /*
        $mBuilder = [];
        foreach($menu as $item){
            $mBuilder[$item->id] = ['name' => $item->name, 'alias' => $item->alias];
        }
        */
        $mBuilder = Menu::make($name, function($m) use($menu, $url){

        foreach($menu as $item){
                $m->add($item->name, $url . $item->alias)->id($item->id);
           }

        });
        return $mBuilder;
    }

}
