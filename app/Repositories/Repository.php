<?php

namespace App\Repositories;

use Config;

abstract class Repository {

    protected $model = FALSE;

    public function get($arr = NULL){

        //dd($arr);

        if ($arr == NULL){
            $builder = $this->model->select('*');
        }
        else{
            $builder = $this->model->where(array_keys($arr)[0], '=', $arr);
            //dd($builder);
        }

        return $builder->get();
    }

}

?>