<?php

function outputHTML($vars, $template)
{
    $view_dir = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;
    $html = file_get_contents($view_dir . $template . '.html');
    echo str_replace(
        array_keys($vars),
        array_values($vars),
        $html
    );
}


function check_login($login, $pass) {
	$md5_passwd = "202cb962ac59075b964b07152d234b70";
	$md5_paswd_post = md5($pass);
    return ($login == 'admin') && ($md5_paswd_post == $md5_passwd);
}