<?php
require_once ('../MODELS/conexao_db.php');
require_once ('../MODELS/task.php');

$task_model = new Task($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $task_id = $_POST['task_id'];

    if ($task_model->delete_task($task_id)) {
        header("Location: ../VIEWS/tasksPg.php");
        exit();
    } else {
        echo "Erro ao excluir a tarefa.";
    }
} else {
    header("Location: ../VIEWS/error.php");
    exit();
}
?>