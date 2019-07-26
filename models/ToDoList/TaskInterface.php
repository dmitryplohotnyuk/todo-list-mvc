<?php

namespace ToDoList;

interface TaskInterface
{
    public function insert(): void;
    public function update(): void;
    public function delete(): void;
    public function setInfo(Array $props): void;
    public function getInfo(): Array;
}