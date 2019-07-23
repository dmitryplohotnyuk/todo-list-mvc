<?php

namespace ToDoList;

interface TaskListInterface
{
    public static function getAll(): Array;
    public static function getById(string $id): Task;
}