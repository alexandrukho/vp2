<?php

namespace App;

class Users extends MainController
{
    public function all()
    {

    }

    public function logout()
    {
        setcookie('user', '', -1, '/');
        header('Location: /authorization/index');
    }

    public function setAge()
    {
        $this->user->age();
    }

    public function desc()
    {
        $data['desc'] = $this->user->sortDesc();
        $this->view->render('main/index', $data);
    }

    public function asc()
    {
        $data['asc'] = $this->user->sortAsc();
        $this->view->render('main/index', $data);
    }

    public function delete()
    {
        $userId = $_GET['id'];
        $this->user->deleteUser($userId);
        header('Location: /admin/index');

    }


}