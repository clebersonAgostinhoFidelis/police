

<?php
session_start();

// Verifica se o formulário de login foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conecta ao banco de dados (substitua com suas próprias configurações)
    $pdo = new PDO('mysql:host=seu_host;dbname=sua_base_de_dados', 'seu_usuario', 'sua_senha');

    // Recebe os dados do formulário
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta o banco de dados para o usuário fornecido
    $stmt = $pdo->prepare('SELECT id, username, password_hash FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Verifica se o usuário existe e a senha está correta
    if ($user && password_verify($password, $user['password_hash'])) {
        // Autenticação bem-sucedida, configura a variável de sessão
        $_SESSION['user_id'] = $user['id'];

        // Redireciona para a página de registro (ou qualquer outra página desejada)
        header('Location: register.php');
        exit;
    } else {
        // Credenciais inválidas, exibe uma mensagem de erro
        $error = 'Credenciais inválidas';
    }
}
?>

