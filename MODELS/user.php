<?php

class User
{

    private $conexao;

    public function __construct($cone)
    {
        $this->conexao = $cone;
    }

    public function criar($nome, $email, $senha)
    {

        if ($this->consultaEmail($email) == true) {
            //E-mail já em uso
            session_start();
            $_SESSION['erro'] = true;
            header("location: ../VIEWS/registerPg.php");
            exit();
        } else {
            //Insere o novo usuário
            $sql = "INSERT INTO users (name, email, password) VALUES (:nome, :email, :senha)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);

            if ($stmt->execute()) {
                //Usuário cadastrado com sucesso !
                session_start();
                $_SESSION['erro'] = false;
            } else {
                echo "(ferrou) Erro ao cadastrar o usuário: " . $stmt->errorInfo()[2];
            }
        }
        header("Location: ../index.php");
        exit();
    }

    public function fazerLogin($email, $senha)
    {

        if ($this->consultaEmail($email) == false) {
            //Email nao existe
            session_start();
            $_SESSION['erro'] = true;
            header("Location: ../VIEWS/loginPg.php");
            exit();
        } else {
            $user = $this->verificaSenha($email, $senha);
            if (empty($user)) {
                //Senha incorreta
                session_start();
                $_SESSION['erro'] = true;
                header("Location: ../VIEWS/loginPg.php");
                exit();
            } else {
                //logando
                session_start();
                $emailLogado = $user['email'];
                $iduser = $user['id'];
                $userName = $user['name'];
                $_SESSION['erro'] = false;
                $_SESSION['logado'] = true;
                $_SESSION['email'] = $emailLogado;
                $_SESSION['iduser'] = $iduser;
                $_SESSION['name'] = $userName;
                header("Location: ../VIEWS/tasksPg.php");
                exit();
            }
        }
    }

    public function alterarSenha($senha, $novaSenha, $email)
    {
        if (empty($this->verificaSenha($email, $senha))) {
            //Senha antiga errada
            session_start();
            $_SESSION['erro'] = true;
            header("location: ../VIEWS/edit_passwordPg.php");
        } else {
            $sql = "UPDATE users SET password=:novaSenha WHERE email=:email";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':novaSenha', $novaSenha);
            $stmt->bindParam(':email', $email);

            if ($stmt->execute()) {
                //Senha alterada com sucesso !
                session_start();
                $_SESSION['erro'] = false;
            } else {
                echo "(ferrou) Erro ao alterar senha: " . $stmt->errorInfo()[2];
            }
            header("Location: ../VIEWS/profilePg.php");
        }
    }

    public function consultaEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0)
            return true;
        else
            return false;
    }

    public function verificaSenha($email, $senha)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();
        if ($user && password_verify($senha, $user['password']))
            return $user;
        else
            return null;
    }

}
