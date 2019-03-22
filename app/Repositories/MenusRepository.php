<?php

namespace App\Repositories;

use App\Page;

class MenusRepository extends Repository{


    public function __construct(Page $menu){
        $this->model = $menu;
    }
}

?>