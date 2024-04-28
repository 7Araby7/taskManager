<?php
session_start();
if (!empty($_SESSION['logado'])) {
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="../CSS/styles2.css">
</head>

<body>
    <div class="container">
        <h2>Cadastrar Usuário</h2>
        <form action="../CONTROLLERS/register_controller.php" method="POST">
            <p>
                <?php
                if (!empty($_SESSION['erro'])): ?>
                    <?php if ($_SESSION['erro']): ?>
                    <div class="warning">
                        Email ja cadastrado.
                    </div>
                <?php endif ?>
                <?php $_SESSION['erro'] = false; endif ?>
            </p>
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" minlength="6" required>
            <button type="submit">Registrar</button>
        </form>
        <p>Já tem uma conta? <a href="loginPg.php">Faça login</a></p>
    </div>
</body>

</html>