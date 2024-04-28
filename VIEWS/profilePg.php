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
    <title>Perfil</title>
    <link rel="stylesheet" href="../CSS/styles2.css">
</head>

<body>
    <div class="container">
        <a href="tasksPg.php" class="tasks-button">Tarefas</a>
        <div class="profile">
            <img src="../CSS/profile.png" alt="Foto de Perfil">
            <h2><?php echo $_SESSION['name']; ?></h2>
            <p>Email: <?php echo $_SESSION['email']; ?></p>
            <button onclick="window.location.href='edit_passwordPg.php'">Alterar Senha</button>
            <form action="../CONTROLLERS/logout_controller.php" method="POST" style="display: inline;">
                <input type="hidden" name="logout" value="true">
                <button type="submit" onclick="return confirm('Tem certeza que deseja sair?')">SAIR</button>
            </form>
        </div>
    </div>
</body>

</html>