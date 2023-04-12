<?php
namespace App\controllers;

use League\Plates\Engine;


class HomeController
{

    public $templates;

    public function __construct()
    {
        $this->templates = new Engine('../app/views');
    }

    public function page_register()
    {
        echo $this->templates->render('page_register');
    }

    public function user_handler(){
        echo $this->templates->render('register_handler', ['post' => $_POST]);
    }
}
