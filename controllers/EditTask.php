<?php
session_start();
isset($_SESSION['login']) or die("<script>javascript:window.location='?view=Login'</script>");

$id = $_GET['id'];
$id = htmlspecialchars($id);

$task = \ToDoList\TaskList::getById($id);
$props = $task->getInfo();

foreach($_POST as $key => $value) {
    $props[$key] = htmlspecialchars($value); 
}

$props['isEdit'] = True;

$task->setInfo($props);

try {
    $task->update();
} catch(\Exception $error) {
    $message = $error->getMessage();
    echo "<script>alert('$message');</script>";
}

echo "<script>javascript:window.location='/todo-list/?view=Admin'</script>";

