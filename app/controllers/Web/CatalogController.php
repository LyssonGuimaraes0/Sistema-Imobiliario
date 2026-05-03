<?php

namespace app\controllers\Web;

class CatalogController{
    public function index(){
        require_once VIEW_PATH ."\catalog.php";
    }
}