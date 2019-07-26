<?php
session_start();
isset($_SESSION['login']) or die("<script>javascript:window.location='?view=Login'</script>");

$id = $_GET['id'];
$id = htmlspecialchars($id);

$task = \ToDoList\TaskList::getById($id);

try {
    $task->delete();
} catch(\Exception $error) {
    $message = $error->getMessage();
    echo "<script>alert('$message');</script>";
}

echo "<script>javascript:window.location='/todo-list/?view=Admin'</script>";
