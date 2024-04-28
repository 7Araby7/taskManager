<?php
session_start();
if (empty($_SESSION['logado']) || $_SESSION['logado'] == false)
    header('location: ../index.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../CSS/styles.css">
</head>

<body>
    <div class="container">
        <a href="add_taskPg.php" class="add-task-button">Adicionar Tarefa</a>
        <a href="profilePg.php" class="profile-button">Perfil</a>
        <h1>Suas Tarefas</h1>
        <div class="task-container">
            <?php
            include ('../MODELS/conexao_db.php');
            include ('../MODELS/task.php');

            $task_model = new Task($pdo);
            $user_id = $_SESSION['iduser'];
            $tasks = $task_model->list_tasks($user_id);

            $colors = ['task-color-1', 'task-color-2', 'task-color-3', 'task-color-4', 'task-color-5', 'task-color-6', 'task-color-7', 'task-color-8', 'task-color-9', 'task-color-10'];

            foreach ($tasks as $index => $task): ?>
                <?php
                $color_class = $colors[$index % count($colors)];
                ?>
                <div class="task-block <?php echo $color_class; ?>">
                    <h2><?php echo $task['task']; ?></h2>
                    <p class="desc"><?php echo $task['description']; ?></p>
                    <p class="date"><?php echo date('d/m/Y', strtotime($task['scheduled_date'])); ?></p>
                    <form action="../CONTROLLERS/delete_task_controller.php" method="POST" style="display: inline;">
                        <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                        <button type="submit" class="delete-button"
                            onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')"><i
                                class="fas fa-trash-alt"></i></button>
                    </form>
                    <form action="edit_taskPg.php" method="POST" style="display: inline;">
                        <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                        <button type="submit" class="edit-button"><i class="fas fa-pencil-alt"></i></button>
                    </form>
                </div>
            <?php endforeach; ?>
</body>

</html>