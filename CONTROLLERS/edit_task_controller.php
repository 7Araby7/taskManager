<?php
require_once ('../MODELS/conexao_db.php');
require_once ('../MODELS/task.php');

$task_model = new Task($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_id = $_POST['task_id'];
    $new_task = $_POST['new_task'];
    $description = $_POST['description'];
    $scheduled_date = $_POST['scheduled_date'];

    if ($task_model->edit_task($task_id, $new_task, $description, $scheduled_date)) {
        header("Location: ../VIEWS/tasksPg.php");
        exit();
    } else {
        echo "Erro ao editar a tarefa.";
    }
} else {
    header("Location: ../VIEWS/error.php");
    exit();
}
?>