<?php
   // Incluir o arquivo com a conexão
include 'config.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Consulta SQL para recuperar a imagem da notícia pelo ID
$query = "SELECT imagem FROM noticias WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();

// Verifica se a consulta retornou algum resultado
if ($stmt->rowCount() > 0) {
    // Obtém os dados da imagem
    $imagem = $stmt->fetch(PDO::FETCH_ASSOC);

    // Define os cabeçalhos apropriados para exibir a imagem
    header("Content-type: image/jpeg"); // Altere o tipo de imagem conforme necessário

    // Exibe a imagem
    echo $imagem['imagem'];
    exit; // Encerra a execução após enviar a imagem
}

$stmt->closeCursor();
$conn = null;

?>