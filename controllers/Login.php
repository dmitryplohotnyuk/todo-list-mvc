<?php

require_once 'functions.php';

session_start();

if (!isset($_SESSION['login'])) {

    if (!count($_POST) <= 0) {

        $login = $_POST['username'] ?? '';
        $pass = $_POST['password'] ?? '';
        if (check_login($login, $pass)) {
            $_SESSION['login'] = $login;
            echo "<script>javascript:window.location='/todo-list/?view=Admin'</script>";
        } else {
            $vars['{ERROR}'] = '<div class="alert alert-danger" role="alert">
                                Ошибка авторизации! Неправильный логин или пароль</div>';
            $template = 'Login';
        }
    } else {
        $template = 'Login';
        $vars['{ERROR}'] = '';
    }
} else {
    echo "<script>javascript:window.location='/todo-list/?view=Admin'</script>";
}

outputHTML($vars, $template);
