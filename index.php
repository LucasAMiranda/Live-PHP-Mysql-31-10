<?php
session_start();
include("conexao.php");

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Filtra e valida os dados recebidos
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        // Prepara a consulta SQL de forma segura (evita SQL Injection)
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nome = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica se o usuário existe
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verifica a senha (criptografada)
            if (password_verify($password, $user['senha'])) {
                $_SESSION['username'] = $user['nome'];

                // Redireciona para a página de exames
                header("Location: exames.php");
                exit();
            } else {
                $error = "Senha incorreta.";
            }
        } else {
            $error = "Usuário não encontrado.";
        }
    } else {
        $error = "Preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Exames Médicos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Bem-vindo ao Sistema de Exames Médicos</h1>
    <p>Gerencie exames com segurança e praticidade.</p>

    <h2>Login de Acesso</h2>

    <?php if (!empty($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Entrar</button>
    </form>

    <p><a href="form.php">Cadastrar Novo Usuário</a></p>
</body>
</html>