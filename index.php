<?php 
    include("conexao.php");

    $sql = "INSERT INTO usuarios (nome, senha) VALUES ('$nome', '$senha')";

    session_start();

    if(isset($_POST['username']) && isset($_POST['password'])){
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];

        //verificar se as sessões do login são válidas
        if(!empty($_SESSION['username']) && !empty($_SESSION['password'])){
            $_SESSION['username'] = $nome;
            $_SESSION['password'] = $senha;
            //redirecionar para a página de exames
            header("Location: exames.php");
            exit();
        }else{
            $error =  "Nome de usuário ou senha inválidos.";
            echo $error;
        }
    }



?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Exames Médicos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <h1>Bem-vindo ao Sistema de Exames Médicos</h1>
   <p>Este é o sistema para gerenciamento de exames médicos.</p>
   
   <h2>Login de Acesso</h2>

   <a href="form.php">Cadastrar Novo Usuário</a>
   <form method="POST">
       <label for="username">Usuário:</label>
       <input type="text" id="username" name="username" required>
       <br><br>
       <label for="password">Senha:</label>
       <input type="password" id="password" name="password" required>
       <br><br>
       <button  id="salvar" type="submit" value="Entrar">Salvar</button>
   </form>
</body>
</html>