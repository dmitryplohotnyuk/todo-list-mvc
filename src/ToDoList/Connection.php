<?php

namespace ToDoList;

class Connection
{
    public static function getConnection()
    {
        $db_host = '';
        $db_name = '';
        $db_user = '';
        $db_password = '';
        return  mysqli_connect($db_host, $db_user, $db_password, $db_name);
    }
}
