<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Adicione esta linha para Font Awesome -->
    <link rel="stylesheet" href="../CSS/styles2.css">
</head>

<body>
    <div class="container">
        <h2>Editar Tarefa</h2>
        <?php
        include ('../MODELS/conexao_db.php');
        include ('../MODELS/task.php');

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['task_id'])) {
            $task_model = new Task($pdo);
            $task_id = $_POST['task_id'];
            $task = $task_model->get_task($task_id);
            ?>
            <form action="../CONTROLLERS/edit_task_controller.php" method="POST">
                <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                <input type="text" name="new_task" value="<?php echo $task['task']; ?>" placeholder="Editar Tarefa"
                    required>
                <input type="text" name="description" value="<?php echo $task['description']; ?>"
                    placeholder="Editar Descrição">
                <input class="date" type="date" name="scheduled_date" value="<?php echo $task['scheduled_date']; ?>"
                    required>
                <button type="submit">Salvar</button>
            </form>
        <?php } else { ?>
            <p>Nenhuma tarefa encontrada para editar.</p>
        <?php } ?>
        <p><a href="tasksPg.php">Voltar para Tarefas</a></p>
    </div>
</body>

</html>