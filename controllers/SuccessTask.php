<?php

$id = $_GET['id'];
$id = htmlspecialchars($id);

$task = \ToDoList\TaskList::getById($id);
$props = $task->getInfo();

var_dump($props);

$props['status'] = True;
$props['isEdit'] = True;

$task->setInfo($props);

if(!$task->update()) {
    echo "<script>alert('Ошибка при изменение статуса задачи');</script>";
} 

echo "<script>javascript:window.location='/todo-list/?view=Admin'</script>";
