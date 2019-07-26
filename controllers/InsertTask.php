<?php 

foreach($_POST as $key => $value) {
    $props[$key] = htmlspecialchars($value); 
}

$task = new \ToDoList\Task($props);

try {
    $task->insert();
} catch(\Exception $error) {
    $message = $error->getMessage();
    echo "<script>alert('$message');</script>";
}

echo "<script>javascript:window.location='/todo-list'</script>";

