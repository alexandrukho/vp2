<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/main.css">
    <!--    font awesome icons-->
    <script src="https://use.fontawesome.com/f05350e30a.js"></script>
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">Navbar</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav w-100 d-flex align-content-center">
            <li class="nav-item active mr-auto align-self-center">
                <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
            </li>
            <? if ($_COOKIE['user']) : ?>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="/admin/index">Управление</a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link fa fa-sign-out fa-2x" href="/users/logout"></a>
                </li>
            <? else: ?>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="/authorization/index">Вход</a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="/registration/index">Регистрация</a>
                </li>
            <? endif; ?>
        </ul>
    </div>
</nav>

