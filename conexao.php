<?php

    $servername = "localhost";
    $username = "root";
    $password = "nova_senha";
    $dbname = "exames";
    $port = 3306;

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    //criar a tabela usuarios se não existir
    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(30) NOT NULL,
        senha VARCHAR(30) NOT NULL,
        confirmar_senha VARCHAR(30) NOT NULL,
    )";

    $sql = "CREATE TABLE IF NOT EXISTS exames (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nome_exame VARCHAR(50) NOT NULL,
        data DATE NOT NULL,
        resultado TEXT NOT NULL
    )";

    if ($conn->query($sql) === FALSE) {
        echo "Erro ao criar tabela: " . $conn->error;
    }else{
        echo "Tabelas criadas com sucesso!";
    }

?>