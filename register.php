<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="../login.css">
</head>
<body>
    
<!-- Dentro do corpo do arquivo register.php -->

<?php
session_start();
?>

<div class="header">
    <h1>Bem-vindo ao Sistema</h1>
    <?php if (isset($_SESSION['user_id'])) : ?>
        <!-- Exibir o menu apenas se o usuário estiver autenticado -->
        <nav class="menu">
            <ul>
                <li><a href="#">Página Inicial</a></li>
                <li><a href="#">Perfil</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>
    <?php endif; ?>
</div>

<!-- Restante do código da página de registro -->

</body>
</html>
