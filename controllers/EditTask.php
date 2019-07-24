<?php

$id = $_GET['id'];
$id = htmlspecialchars($id);

$task = \ToDoList\TaskList::getById($id);
$props = $task->getInfo();

foreach($_POST as $key => $value) {
    $props[$key] = htmlspecialchars($value); 
}

$props['isEdit'] = True;

$task->setInfo($props);

if(!$task->update()) {
    echo "<script>alert('Ошибка при изменение задачи');</script>";
} 

echo "<script>javascript:window.location='/todo-list/?view=Admin'</script>";
