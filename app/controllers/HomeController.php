<?php

namespace app\controllers;


class HomeController{
    public function Home(){
        require_once VIEW_PATH . "\home.php";
    }
}