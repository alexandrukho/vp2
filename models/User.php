<?php

namespace App;

class User extends MainModel
{
    private $login;
    private $pwd;
    private $cPwd;
    private $avatar;
    private $name;
    private $age;
    private $avatarData = [];
    public $data = [];


    private function prepareData()
    {
        $this->name = trim(htmlspecialchars($_POST['name']));
        $this->login = mb_strtolower(trim(htmlspecialchars($_POST['login'])));
        $this->pwd = trim(htmlentities($_POST['password']));
        $this->cPwd = trim(htmlentities($_POST['password-confirmation']));
        $this->age = htmlspecialchars($_POST['age']);
        $this->avatar = $_FILES['avatar'];
        $this->avatarData['dest'] = './public/images/' . time() . rand(1, 200) . basename($_FILES['avatar']['name']);
    }

    public function getUsers()
    {
        return $this->capsule->table('users')
            ->leftJoin('userLP', 'users.u_id', '=', 'userLP.id')
            ->get();
    }

    public function getUser($login)
    {
        return $this->capsule->table('userLP')
            ->select('*')
            ->where('login', $login)
            ->leftJoin('users', 'userLP.id', '=', 'users.u_id')
            ->first();
    }

    public function countUsers()
    {
        return $this->capsule->table('userLP')->count();
    }

    public function age()
    {
        $this->prepareData();
        $user = $this->getUser($_COOKIE['user']);
        $userId = $user->id;
        print_r($userId);
        $this->capsule->table('users')
            ->where('id', $userId)
            ->update(['age' => $this->age]);
    }

    public function sortDesc()
    {
        return $this->capsule->table('users')
            ->leftJoin('userLP', 'users.u_id', '=', 'userLP.id')
            ->orderBy('age', 'DESC')
            ->get();
    }
    public function sortAsc()
    {
        return $this->capsule->table('users')
            ->leftJoin('userLP', 'users.u_id', '=', 'userLP.id')
            ->orderBy('age', 'ASC')
            ->get();
    }

    public function deleteUser($id)
    {
        $this->capsule->table('users')->where('u_id', $id)->delete();
        $this->capsule->table('userLP')->where('id', $id)->delete();
    }


    public function authorization()
    {
        $this->prepareData();

        $user = $this->capsule->table('userLP')
            ->select('*')
            ->where('login', $this->login)
            ->first();
        $userHash = $user->pwd;
        $resultHash = password_verify($this->pwd, $userHash);
        if ($this->login === $user->login || $resultHash === true) {
            setcookie('user', $this->login, time() + 60 * 60, '/');
        } else {
            $data['error'] = "Неправельный логин или пароль";
        }
    }

    public function registration()
    {
        $this->prepareData();

        move_uploaded_file($_FILES['avatar']['tmp_name'], $this->avatarData['dest']);
        if ($this->pwd === $this->cPwd) {
            $hashPwd = password_hash($this->pwd, PASSWORD_DEFAULT);
        } else {
            echo "пароли не совпадают";
        }
//        INSERT TO TABLE
        $this->capsule->table('userLP')
            ->insert([
                'login' => $this->login,
                'pwd' => $hashPwd,
            ]);

        $userId = $this->capsule->table('userLP')
            ->select('id')
            ->where('login', $this->login)
            ->first();

        $this->capsule->table('users')
            ->insert([
                'name' => $this->name,
                'avatar' => mb_substr($this->avatarData['dest'], 1),
                'u_id' => $userId->id
            ]);
    }

}