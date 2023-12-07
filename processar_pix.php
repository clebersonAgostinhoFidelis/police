<?php
try {
    // Substitua pelos seus próprios dados de conexão
    $conexao = new PDO('mysql:host=localhost;dbname=police', 'root', '');
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obter dados do formulário
    $origem_nome = $_POST['origem_nome'];
    $origem_instituicao = $_POST['origem_instituicao'];
    $origem_agencia = $_POST['origem_agencia'];
    $origem_conta = $_POST['origem_conta'];
    $origem_cpf = $_POST['origem_cpf'];
    $destino_nome = $_POST['destino_nome'];
    $destino_instituicao = $_POST['destino_instituicao'];
    $destino_agencia = $_POST['destino_agencia'];
    $destino_conta = $_POST['destino_conta'];
    $destino_cpf = $_POST['destino_cpf'];
    $tipo_conta = $_POST['tipo_conta'];
    $id_transacao = $_POST['id_transacao'];

    // Preparar a query
    $query = $conexao->prepare("INSERT INTO pix_data 
                               (origem_nome, origem_instituicao, origem_agencia, origem_conta, origem_cpf, 
                                destino_nome, destino_instituicao, destino_agencia, destino_conta, destino_cpf, 
                                tipo_conta, id_transacao) 
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Executar a query
    $query->execute([$origem_nome, $origem_instituicao, $origem_agencia, $origem_conta, $origem_cpf,
                     $destino_nome, $destino_instituicao, $destino_agencia, $destino_conta, $destino_cpf,
                     $tipo_conta, $id_transacao]);

   // echo 'Dados inseridos com sucesso!';
    echo "<script>alert('Documento inserido com sucesso!!!')</script>";
    header('Location: documentos.php');
} catch (PDOException $e) {
    echo 'Erro ao inserir dados: ' . $e->getMessage();
} finally {
    // Fechar a conexão
    $conexao = null;
}
?>

