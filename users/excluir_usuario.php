<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <title>Listar Usuários</title>
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h2 class="mb-4">Lista de Usuários</h2>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome de Usuário</th>
            <th>E-mail</th>
            <th>Nível</th>
            <th>Data de Registro</th>
            <th>Último Login</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
          try {
              $stmt = $conn->query("SELECT * FROM users");
              $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

              if (count($result) > 0) {
                  foreach ($result as $row) {
                      echo "<tr>";
                      echo "<td>" . $row["id"] . "</td>";
                      echo "<td>" . $row["username"] . "</td>";
                      echo "<td>" . $row["email"] . "</td>";
                      echo "<td>" . $row["level"] . "</td>";
                      echo "<td>" . $row["registration_date"] . "</td>";
                      echo "<td>" . $row["last_login"] . "</td>";
                      echo "<td>
                              <a href='editar_usuario.php?id=" . $row["id"] . "'>Editar</a> | 
                              <a href='excluir_usuario.php?id=" . $row["id"] . "' onclick='return confirm(\"Tem certeza que deseja excluir este usuário?\")'>Excluir</a>
                            </td>";
                      echo "</tr>";
                  }
              } else {
                  echo "<tr><td colspan='7'>Nenhum usuário encontrado</td></tr>";
              }
          } catch (PDOException $e) {
              echo "Erro ao listar usuários: " . $e->getMessage();
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Scripts Bootstrap e jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
