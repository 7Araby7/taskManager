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
    <link rel="stylesheet" href="../CSS/styles2.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form action="../CONTROLLERS/login_controller.php" method="POST">
            <p>
                <?php
                if (!empty($_SESSION['erro'])): ?>
                    <?php if ($_SESSION['erro']): ?>
                    <div class="warning">
                        Usuario ou senha invalidos.
                    </div>
                <?php endif ?>
                <?php $_SESSION['erro'] = false; endif ?>
            </p>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Senha" required><br>
            <button type="submit">Entrar</button>
        </form>
        <p>Não tem uma conta? <a href="registerPg.php">Cadastre-se</a></p>
    </div>
</body>

</html>