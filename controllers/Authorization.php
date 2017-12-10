<?php
namespace App;

class Authorization extends MainController
{
    public function index()
    {
        $this->view->render('signin/index');
    }

    public function signin()
    {
        $this->user->authorization();
        header('Location: /');
    }
}