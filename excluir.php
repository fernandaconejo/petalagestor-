<?php
// Inclui a conexão com o banco
include("conexao.php");

// Pega o ID da flor que será excluída, enviado pela URL (GET)
$id = $_GET['id'];

// Cria a instrução SQL para excluir a flor pelo ID
$sql = "DELETE FROM flores WHERE id = $id";

// Executa a exclusão no banco
if ($conn->query($sql) === TRUE) {
    // Redireciona de volta para a página principal
    header("Location: index.php");
    exit();
} else {
    // Mostra mensagem de erro, se houver
    echo "Erro ao excluir: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>