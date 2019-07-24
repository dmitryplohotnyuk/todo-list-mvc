<?php

namespace ToDoList;

class TaskList implements TaskListInterface
{
    public static function getAll(): Array
    {
        $list = [];
        $connection = Connection::getConnection();
        $query = "SELECT * FROM list";
        if ($result = mysqli_query($connection, $query)) {
            while ($props = $result->fetch_assoc()) { 
                $list[$props['id']] = new Task($props);
            }
            $result->free();
        }
        mysqli_close($connection);
        return $list;

    }

    public static function getById(string $id): Task
    {
        $connection = Connection::getConnection();
        $query = "SELECT * FROM list WHERE id = $id";
        if ($result = mysqli_query($connection, $query)) {
            while ($props = $result->fetch_assoc()) {
                $list = new Task($props);
            }
            $result->free();
        }
        mysqli_close($connection);
        return $list;
    }
}