<?php
session_start();
isset($_SESSION['login']) or die("<script>javascript:window.location='?view=Login'</script>");

require_once 'functions.php';
$list = \ToDoList\TaskList::getAll();

$todoList = [];

foreach($list as $task) {
    $todoList[] = $task->getInfo();
}

$htmlStats = null;
    
foreach ($todoList as $task) {
    $status = ($task['status']) ? 'Выполнен' : 'Не выполнен';
    $successButton = '';
    if (!$task['status']) {
        $successButton = '<a href="index.php?view=SuccessTask&id=' . $task['id'] . '"><button class="btn btn-success btn-sm">Выполнить</button></a> ';
    }
    $htmlStats .= '<tr><td>' . $task['id'] . '</td><td>' . $task['username'] . '</td>';
    $htmlStats .= '<td>' . $task['email'] . '</td><td>' . $task['content'] . '</td>';
    $htmlStats .= '<td>' . $status . '</td><td>' .  $successButton;
    $htmlStats .= '<a href="index.php?view=DeleteTask&id=' . $task['id'] . '"><button class="btn btn-danger btn-sm">Удалить</button></a></td>';
}

$vars['{LIST}'] = $htmlStats;
$template = 'Admin';

outputHTML($vars, $template);