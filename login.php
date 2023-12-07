<?php
session_start();

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta para verificar as credenciais do usuário
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();
   

    // Verificar se o usuário existe e a senha está correta
    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['username'];
      

        
        // Redirecionar para a página de registro após o login bem-sucedido
        header('Location: painel.php');
        exit;
    } else {
        $error = 'Credenciais inválidas';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/login.css">
</head>
<body>
    <div class="login-container">
        <h2>Acesso ao Sistema</h2>
        <?php if (isset($error)) : ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <form action="login.php" method="post">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Entrar</button>
        </form>
    </div>

    <!-- Rodapé -->
    <footer>
        <p>&copy; 2023 Vulcano Sistemas - Todos os direitos reservados.</p>
    </footer>
</body>
</html>

