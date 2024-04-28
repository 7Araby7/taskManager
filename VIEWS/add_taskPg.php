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
    <title>Adicionar Tarefa</title>
    <link rel="stylesheet" href="../CSS/styles2.css">
</head>

<body>
    <div class="container">
        <h2>Adicionar Tarefa</h2>
        <form action="../CONTROLLERS/add_task_controller.php" method="POST">
            <label for="task">Tarefa:</label>
            <input type="text" id="task" name="task" required>
            <label for="description">Descrição:</label>
            <input type="text" id="description" name="description">
            <label for="scheduled_date">Data programada:</label>
            <input class="date" type="date" id="scheduled_date" name="scheduled_date" required
                min="<?php echo date('Y-m-d'); ?>">
            <button type="submit">Adicionar</button>
        </form>

        <p><a href="tasksPg.php">Voltar para suas tarefas</a></p>
    </div>
</body>

</html>