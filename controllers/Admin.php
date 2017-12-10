<?php
namespace App;

class Admin extends MainController
{
    public function index()
    {
        if ($_COOKIE['user'] !== 'admin') {
            $data['error'] = 'Для управления пользователями войдите с правами администратора';
        }
        $data['user'] = $this->user->getUser($_COOKIE['user']);
        $data['all'] = $this->user->getUsers();
        $data['count'] = $this->user->countUsers();
        $this->view->render("admin/index", $data);
    }
}