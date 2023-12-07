<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <title>Cadastro de Usuarios</title>
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="mb-4">Cadastro de Usuarios</h2>
      <form action="register.php" method="post">
        <div class="form-group">
          <label for="username">Nome de Usuário:</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="email">E-mail:</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="password">Senha:</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
          <label for="level">Nível:</label>
          <select class="form-control" id="level" name="level" required>
            <option value="user">Usuário</option>
            <option value="admin">Admin</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
      </form>
    </div>
  </div>
</div>

<!-- Scripts Bootstrap e jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $level = $_POST["level"];

    try {
        $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash, level) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $email, $password, $level]);
        echo "Registro criado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao criar registro: " . $e->getMessage();
    }
}
?>

