<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <title>Editar Usuário</title>
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="mb-4">Editar Usuário</h2>
      <form action="editar_usuario.php?id=<?php echo $user_id; ?>" method="post">
        <div class="form-group">
          <label for="username">Nome de Usuário:</label>
          <input type="text" class="form-control" id="username" name="username" value="<?php echo $user_data['username']; ?>" required>
        </div>
        <div class="form-group">
          <label for="email">E-mail:</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $user_data['email']; ?>" required>
        </div>
        <div class="form-group">
          <label for="password">Nova Senha:</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
          <label for="level">Nível:</label>
          <select class="form-control" id="level" name="level" required>
            <option value="user" <?php echo ($user_data['level'] == 'user') ? 'selected' : ''; ?>>Usuário</option>
            <option value="admin" <?php echo ($user_data['level'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
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
    $new_username = $_POST["username"];
    $new_email = $_POST["email"];
    $new_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $new_level = $_POST["level"];

    try {
        $stmt = $conn->prepare("UPDATE users SET username=?, email=?, password_hash=?, level=? WHERE id=?");
        $stmt->execute([$new_username, $new_email, $new_password, $new_level, $user_id]);
        echo "Registro atualizado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao atualizar registro: " . $e->getMessage();
    }
}
?>
