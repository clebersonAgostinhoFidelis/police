<?php
function obterDados()
{
    $dados = [];

    // Verificar se o arquivo de dados existe
    if (file_exists('dados.txt')) {
        // Ler os dados do arquivo
        $dados = unserialize(file_get_contents('dados.txt'));
    }

    return $dados;
}

function salvarDados($nome, $email)
{
    // Obter os dados existentes
    $dados = obterDados();

    // Adicionar os novos dados
    $dados[] = ['nome' => $nome, 'email' => $email];

    // Salvar os dados no arquivo
    file_put_contents('dados.txt', serialize($dados));
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Salvar os dados
    salvarDados($nome, $email);
}
?>
