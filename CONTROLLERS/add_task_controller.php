<?php
require_once ('../MODELS/conexao_db.php');
require_once ('../MODELS/task.php');

$task_model = new Task($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $task = $_POST['task'];
    $description = $_POST['description'];
    $scheduled_date = $_POST['scheduled_date'];

    session_start();
    $user_id = $_SESSION['iduser'];

    if ($task_model->add_task($user_id, $task, $description, $scheduled_date)) {
        header("Location: ../VIEWS/tasksPg.php");
        exit();
    } else {
        echo "Erro ao adicionar a tarefa.";
    }
} else {
    header("Location: ../VIEWS/error.php");
    exit();
}
?>