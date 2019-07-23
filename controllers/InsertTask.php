<?php 

foreach($_POST as $key => $value) {
    $props[$key] = htmlspecialchars($value); 
}

$props['id'] = null;
$props['status'] = null;
$props['isEdit'] = null;

$task = new \ToDoList\Task($props);

if(!$task->insert()) {
   echo "<script>alert('Ошибка при добавлении новой задачи');</script>";
} 

echo "<script>javascript:window.location='/todo-list'</script>";
