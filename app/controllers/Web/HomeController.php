<?php

namespace app\controllers\Web;


class HomeController{
    public function index(){
        require_once VIEW_PATH . "/home.php";
    }
}