<?php
// Inclui a conexão com o banco de dados
include("conexao.php");

// Obtém os dados enviados pelo formulário via método POST
$nome        = $_POST['nome'];
$tipo        = $_POST['tipo'];
$preco       = $_POST['preco'];
$quantidade  = $_POST['quantidade'];
$cep         = $_POST['cep'];
$rua         = $_POST['rua'];
$bairro      = $_POST['bairro'];
$cidade      = $_POST['cidade'];
$estado      = $_POST['estado'];
$complemento = $_POST['complemento'];

// Cria o comando SQL para inserir os dados na tabela "flores"
$sql = "INSERT INTO flores (
            nome, tipo, preco, quantidade, cep, rua, bairro, cidade, estado, complemento
        ) VALUES (
            '$nome', '$tipo', '$preco', '$quantidade', '$cep', '$rua', '$bairro', '$cidade', '$estado', '$complemento'
        )";

// Executa o comando SQL no banco
if ($conn->query($sql) === TRUE) {
    // Se deu certo, redireciona para a página principal
    header("Location: index.php");
    exit(); // Encerra o script após o redirecionamento
} else {
    // Se deu erro, exibe mensagem com o erro ocorrido
    echo "Erro ao cadastrar: " . $conn->error;
}

// Fecha a conexão com o banco
$conn->close();
?>