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
    $isEditText = '';
    if (!$task['status']) {
        $successButton = '<a href="index.php?view=SuccessTask&id=' . $task['id'] . '"><button class="btn btn-success btn-sm">Выполнить</button></a> ';
    }
    if ($task['isEdit']) {
        $isEditText = '<br><i>Отредактировано админом!</i>';
    }
    $htmlStats .= '<form action="index.php?view=EditTask&id=' . $task['id'] . '" method="POST">';
    $htmlStats .= '<tr><td>' . $task['id'] . '</td><td>' . $task['username'] . '</td>';
    $htmlStats .= '<td>' . $task['email'] . '</td><td><textarea name="content">' . $task['content'] . '</textarea>' . $isEditText . '</td>';
    $htmlStats .= '<td>' . $status . '</td><td> <button type="submit" class="btn btn-warning btn-sm">Сохранить</button></form> ' .  $successButton;
    $htmlStats .= '<a href="index.php?view=DeleteTask&id=' . $task['id'] . '"><button class="btn btn-danger btn-sm">Удалить</button></a> ';
    $htmlStats .= '</td></tr>';
}

$vars['{LIST}'] = $htmlStats;
$template = 'Admin';

outputHTML($vars, $template);