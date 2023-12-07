<?php
require_once('tcpdf/tcpdf.php');

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
        // Criação do objeto TCPDF
        $pdf = new TCPDF();

        // Adiciona uma página ao PDF
        $pdf->AddPage();

        // Configuração do estilo da fonte
        $pdf->SetFont('helvetica', '', 12);

        // Adiciona os dados da tabela ao PDF
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            foreach ($row as $key => $value) {
                $pdf->Cell(0, 10, utf8_decode($key . ': ' . $value), 0, 1);
            }
            $pdf->Ln(); // Nova linha para o próximo conjunto de dados
        }

        // Salva o PDF no mesmo diretório do script
        $pdfPath = __DIR__ . '/comprovante_tcpdf.pdf';
        $pdf->Output($pdfPath, 'F');

        // Exibe a imagem
        echo "<img src='{$pdfPath}' alt='Comprovante'>";
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
