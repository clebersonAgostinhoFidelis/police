<?php
require('fpdf/fpdf.php');

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

    // Verifica se há dados para incluir no PDF
    if ($result->rowCount() > 0) {
        // Criação do objeto FPDF
        $pdf = new FPDF();
        
        // Adiciona uma página ao PDF
        $pdf->AddPage();

        // Configuração do estilo da fonte
        $pdf->SetFont('Arial', 'B', 12);

        // Adiciona os dados da tabela ao PDF
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            foreach ($row as $value) {
                $pdf->Cell(40, 10, $value, 1);
            }
            $pdf->Ln(); // Nova linha para o próximo conjunto de dados
        }

        // Saída do PDF (pode ser 'D' para download ou 'I' para visualização)
        $pdf->Output('dados_pix.pdf', 'I');
    } else {
        echo "Nenhum dado disponível para gerar o PDF.";
    }
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
} finally {
    // Fecha a conexão com o banco de dados
    if ($conn) {
        $conn = null;
    }
}
?>
