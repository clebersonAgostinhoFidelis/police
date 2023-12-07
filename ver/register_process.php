<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $level = $_POST['level'];

    // Verificar se as senhas coincidem
    if ($password !== $confirmPassword) {
        $error = 'As senhas não coincidem.';
    } else {
        // Verificar se o usuário ou e-mail já existem
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ? OR email = ?');
        $stmt->execute([$username, $email]);
        $existingUser = $stmt->fetch();

        if ($existingUser) {
            $error = 'Usuário ou e-mail já existem.';
        } else {
            // Hash da senha
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Inserir usuário no banco de dados
            $stmt = $pdo->prepare('INSERT INTO users (username, email, password_hash, level) VALUES (?, ?, ?, ?)');
            $stmt->execute([$username, $email, $hashedPassword, $level]);

            $message = 'Usuário cadastrado com sucesso!';
        }
    }
}

include 'register.php';
?>
