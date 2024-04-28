<?php
require_once ('../MODELS/conexao_db.php');
require_once ('../MODELS/user.php');

$user_model = new User($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $user_model->criar($nome, $email, $senha_hash);
} else {
    header("Location: ../VIEWS/error.php");
    exit();
}
?>