<?php 

$id = $_GET['id'];
$id = htmlspecialchars($id);

$task = \ToDoList\TaskList::getById($id);

if(!$task->delete()) {
    echo "<script>alert('Ошибка при удалении задачи');</script>";
} 

echo "<script>javascript:window.location='/todo-list/?view=Admin'</script>";
