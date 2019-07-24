<?php

require_once 'functions.php';
$list = \ToDoList\TaskList::getAll();

$todoList = [];

foreach($list as $task) {
    $todoList[] = $task->getInfo();
}

$htmlStats = null;
    
foreach ($todoList as $task) {
    $status = ($task['status']) ? 'Выполнен' : 'Не выполнен';
    $isEditText = '';
    if ($task['isEdit']) {
        $isEditText = '<br><i>Отредактировано админом!</i>';
    }
    $htmlStats .= '<tr><td>' . $task['id'] . '</td><td>' . $task['username'] . '</td>';
    $htmlStats .= '<td>' . $task['email'] . '</td><td>' . $task['content'] . $isEditText . '</td>';
    $htmlStats .= '<td>' . $status . '</td></tr>';
}

$vars['{LIST}'] = $htmlStats;
$template = 'Home';

outputHTML($vars, $template);