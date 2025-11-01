<?php 
    include("conexao.php");

    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if($password === $confirm_password){
        $sql = "INSERT INTO usuarios (nome, senha) VALUES ('$username', '$password')";
        
        if($conn->query($sql) === TRUE){
            echo "Usuário cadastrado com sucesso!";
            header("Location: index.php");
            exit();
        }else{
            echo "Erro ao cadastrar usuário: " . $conn->error;
        }
    }


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuários</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Cadastro de Usuários - Exames Médicos</h1>
    <form method="POST" action="index.php">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required>
        <br/><br/>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
        <br/><br/>
        <label for="confirm_password">Confirmar Senha:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <br/><br/>
        <button id="salvar" type="submit" value="Cadastrar">Cadastrar</button>
</body>
</html>