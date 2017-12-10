<?php
namespace App;

class Main extends MainController
{
    public function index()
    {
        $data = $this->user->getUsers();
        $this->view->render('main/index', $data);
    }
}