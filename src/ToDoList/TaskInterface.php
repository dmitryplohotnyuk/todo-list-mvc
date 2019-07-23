<?php

namespace ToDoList;

interface TaskInterface
{
    public function insert(): Bool;
    public function update(): Bool;
    public function delete(): Bool;
    public function setInfo(Array $props): void;
    public function getInfo(): Array;
}