<?php
namespace App;

class MainController
{
    protected $view;
    protected $user;

    public function __construct()
    {
        $this->view = new MainView();
        $this->user = new User();
        new MainModel();
    }
}
