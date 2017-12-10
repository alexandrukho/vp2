<?php
namespace App;

class Registration extends MainController
{
    public function index()
    {
        $this->view->render("signup/index");
    }
    public function signup()
    {
        $this->user->registration();
        $this->view->render("signin/index");
    }
}