<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Dados do Pix</title>
    <!-- Adicione os links para os estilos do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-3">Lista de Dados do Pix</h2>

        <table class="table table-bordered mt-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Origem Nome</th>
                    <th scope="col">Origem Instituição</th>
                    <th scope="col">Origem Agência</th>
                    <th scope="col">Origem Conta</th>
                    <th scope="col">Origem CPF</th>
                    <th scope="col">Destino Nome</th>
                    <th scope="col">Destino Instituição</th>
                    <th scope="col">Destino Agência</th>
                    <th scope="col">Destino Conta</th>
                    <th scope="col">Destino CPF</th>
                    <th scope="col">Tipo de Conta</th>
                    <th scope="col">ID da Transação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    // Configurações do banco de dados
                    $servername = "127.0.0.1";
                    $username = "root";
                    $password = "";
                    $dbname = "police";

                    // Cria uma conexão PDO
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                    // Define o modo de erro do PDO para exceção
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Consulta SQL para obter os dados do Pix
                    $sql = "SELECT * FROM pix_data";
                    $result = $conn->query($sql);

                    // Exibir os dados do Pix na tabela
                    if ($result->rowCount() > 0) {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['origem_nome']}</td>
                                    <td>{$row['origem_instituicao']}</td>
                                    <td>{$row['origem_agencia']}</td>
                                    <td>{$row['origem_conta']}</td>
                                    <td>{$row['origem_cpf']}</td>
                                    <td>{$row['destino_nome']}</td>
                                    <td>{$row['destino_instituicao']}</td>
                                    <td>{$row['destino_agencia']}</td>
                                    <td>{$row['destino_conta']}</td>
                                    <td>{$row['destino_cpf']}</td>
                                    <td>{$row['tipo_conta']}</td>
                                    <td>{$row['id_transacao']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='13'>Nenhum dado disponível.</td></tr>";
                    }
                } catch (PDOException $e) {
                    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
                }

                // Fecha a conexão com o banco de dados
                $conn = null;
                ?>
            </tbody>
        </table>
    </div>

    <!-- Adicione os scripts do Bootstrap no final do corpo do documento -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
