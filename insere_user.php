<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="register-container">
        <h2>Cadastro de Usuário</h2>
        <?php if (isset($message)) : ?>
            <p class="message"><?= $message ?></p>
        <?php endif; ?>
        <?php if (isset($error)) : ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <form action="register_process.php" method="post">
            <label for="username">Usuário:</label>
            <input type="text" id="username" name="username" required>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm_password">Confirme a Senha:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <label for="level">Nível de Acesso:</label>
            <select id="level" name="level">
                <option value="user" selected>Usuário</option>
                <option value="admin">Administrador</option>
            </select>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
