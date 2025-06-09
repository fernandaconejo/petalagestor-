<?php
include("conexao.php");

// Pega o ID enviado via URL
$id = $_GET['id'];

// Consulta os dados da flor para preencher o formulário
$sql = "SELECT * FROM flores WHERE id = $id";
$resultado = $conn->query($sql);

// Verifica se encontrou o registro
if ($resultado->num_rows > 0) {
    $flor = $resultado->fetch_assoc();
} else {
    echo "Flor não encontrada!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Flor</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Editar Cadastro</h1>

    <form action="atualizar.php" method="POST">
        <!-- ID oculto para sabermos qual flor está sendo atualizada -->
        <input type="hidden" name="id" value="<?php echo $flor['id']; ?>">

        <!-- Campos preenchidos com os dados atuais da flor -->
        <input type="text" name="nome" value="<?php echo $flor['nome']; ?>" required><br>
        <input type="text" name="tipo" value="<?php echo $flor['tipo']; ?>" required><br>
        <input type="number" step="0.01" name="preco" value="<?php echo $flor['preco']; ?>" required><br>
        <input type="number" name="quantidade" value="<?php echo $flor['quantidade']; ?>" required><br>

        <!-- Endereço -->
        <input type="text" name="cep" value="<?php echo $flor['cep']; ?>" required><br>
        <input type="text" name="rua" value="<?php echo $flor['rua']; ?>"><br>
        <input type="text" name="bairro" value="<?php echo $flor['bairro']; ?>"><br>
        <input type="text" name="cidade" value="<?php echo $flor['cidade']; ?>"><br>
        <input type="text" name="estado" value="<?php echo $flor['estado']; ?>"><br>
        <input type="text" name="complemento" value="<?php echo $flor['complemento']; ?>"><br>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>