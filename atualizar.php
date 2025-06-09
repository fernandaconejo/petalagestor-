<?php
include("conexao.php");
// Pega os dados enviados do formulário de edição
$id          = $_POST['id'];
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

// Cria o comando SQL de atualização
$sql = "UPDATE flores SET
            nome = '$nome',
            tipo = '$tipo',
            preco = '$preco',
            quantidade = '$quantidade',
            cep = '$cep',
            rua = '$rua',
            bairro = '$bairro',
            cidade = '$cidade',
            estado = '$estado',
            complemento = '$complemento'
        WHERE id = $id";

// Executa a atualização
if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Erro ao atualizar: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>