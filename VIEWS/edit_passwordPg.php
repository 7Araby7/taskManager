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
    <title>Alterar Senha</title>
    <link rel="stylesheet" href="../CSS/styles2.css">
</head>

<body>
    <div class="container">
        <h2>Alterar Senha</h2>
        <form action="../CONTROLLERS/edit_password_controller.php" method="POST">
            <p>
                <?php
                if (!empty($_SESSION['erro'])): ?>
                    <?php if ($_SESSION['erro']): ?>
                    <div class="warning">
                        Senha atual incorreta.
                    </div>
                <?php endif ?>
                <?php $_SESSION['erro'] = false; endif ?>
            </p>
            <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
            <label for="senha_atual">Senha Atual:</label>
            <input type="password" name="senha_atual" required>

            <label for="nova_senha">Nova Senha:</label>
            <input type="password" name="nova_senha" minlength="6" required>

            <button type="submit">Salvar Nova Senha</button>
        </form>

        <p><a href="profilePg.php">Voltar para o Perfil</a></p>
    </div>
</body>

</html>