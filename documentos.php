<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário PIX</title>
    <!-- Adicione os links para os estilos do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-3">Formulário PIX</h2>
        <form action="processar_pix.php" method="post">
            <div class="row mt-3">
                <div class="col-md-6">
                    <h5>Origem</h5>
                    <div class="form-group">
                        <label for="origem_nome">Nome:</label>
                        <input type="text" class="form-control" id="origem_nome" name="origem_nome" required>
                    </div>
                    <div class="form-group">
                        <label for="origem_instituicao">Instituição:</label>
                        <input type="text" class="form-control" id="origem_instituicao" name="origem_instituicao" required>
                    </div>
                    <div class="form-group">
                        <label for="origem_agencia">Agência:</label>
                        <input type="text" class="form-control" id="origem_agencia" name="origem_agencia" required>
                    </div>
                    <div class="form-group">
                        <label for="origem_conta">Conta:</label>
                        <input type="text" class="form-control" id="origem_conta" name="origem_conta" required>
                    </div>
                    <div class="form-group">
                        <label for="origem_cpf">CPF:</label>
                        <input type="text" class="form-control" id="origem_cpf" name="origem_cpf" value="<?= gerarCPF() ?>" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="tipo_conta">Tipo de Conta:</label>
                        <select class="form-control" id="tipo_conta" name="tipo_conta" required>
                            <option value="poupanca">Poupança</option>
                            <option value="conta_corrente">Conta Corrente</option>
                            <option value="conta_salario">Conta Salário</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5>Destino</h5>
                    <div class="form-group">
                        <label for="destino_nome">Nome:</label>
                        <input type="text" class="form-control" id="destino_nome" name="destino_nome" required>
                    </div>
                    <div class="form-group">
                        <label for="destino_instituicao">Instituição:</label>
                        <input type="text" class="form-control" id="destino_instituicao" name="destino_instituicao" required>
                    </div>
                    <div class="form-group">
                        <label for="destino_agencia">Agência:</label>
                        <input type="text" class="form-control" id="destino_agencia" name="destino_agencia" required>
                    </div>
                    <div class="form-group">
                        <label for="destino_conta">Conta:</label>
                        <input type="text" class="form-control" id="destino_conta" name="destino_conta" required>
                    </div>
                    <div class="form-group">
                        <label for="destino_cpf">CPF:</label>
                        <input type="text" class="form-control" id="destino_cpf" name="destino_cpf" value="<?= gerarCPF() ?>" required readonly>
                    </div>
                </div>
            </div>

            <h5 class="mt-3">Informações Gerais</h5>
            <div class="form-group">
                <label for="id_transacao">ID da Transação:</label>
                <!-- Gerar ID de transação aleatório -->
                <input type="text" class="form-control" id="id_transacao" name="id_transacao" value="<?= bin2hex(random_bytes(16)) ?>" required readonly>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar Pagamento PIX</button>
        </form>
    </div>

    <!-- Adicione os scripts do Bootstrap no final do corpo do documento -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php
function gerarCPF() {
    $n1 = rand(0, 9);
    $n2 = rand(0, 9);
    $n3 = rand(0, 9);
    $n4 = rand(0, 9);
    $n5 = rand(0, 9);
    $n6 = rand(0, 9);
    $n7 = rand(0, 9);
    $n8 = rand(0, 9);
    $n9 = rand(0, 9);

    $digitos = [$n9, $n8, $n7, $n6, $n5, $n4, $n3, $n2, $n1];

    // Calcula o primeiro dígito verificador
    $soma = 10 * $digitos[8] + 9 * $digitos[7] + 8 * $digitos[6] + 7 * $digitos[5] + 6 * $digitos[4] + 5 * $digitos[3] + 4 * $digitos[2] + 3 * $digitos[1] + 2 * $digitos[0];
    $resto = $soma % 11;
    $digito1 = $resto < 2 ? 0 : 11 - $resto;

    // Adiciona o primeiro dígito verificador ao array
    $digitos[] = $digito1;

    // Calcula o segundo dígito verificador
    $soma = 11 * $digitos[8] + 10 * $digitos[7] + 9 * $digitos[6] + 8 * $digitos[5] + 7 * $digitos[4] + 6 * $digitos[3] + 5 * $digitos[2] + 4 * $digitos[1] + 3 * $digitos[0] + 2 * $digitos[9];
    $resto = $soma % 11;
    $digito2 = $resto < 2 ? 0 : 11 - $resto;

    // Adiciona o segundo dígito verificador ao array
    $digitos[] = $digito2;

    // Formata o CPF
    $cpf = implode('', $digitos);
    $cpfFormatado = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);

    return $cpfFormatado;
}

// Exemplo de uso:
$cpfAleatorio = gerarCPF();
echo $cpfAleatorio;
?>
