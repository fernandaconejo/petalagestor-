<?php
// Inclui o arquivo de conexão com o banco de dados
include("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pétala Gestão</title>
    <link rel="stylesheet" href="estilo.css">
    <!-- Importa fontes do Google para deixar o site mais bonito -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <!-- Importa o arquivo JavaScript que usa a API ViaCEP -->
    <script src="viaCEP.js"></script>
</head>
<body>
    <h1>Sistema Pétala Gestão</h1>
    <h2>Cadastro de Fornecedores</h2>

    <!-- Formulário HTML que envia os dados para cadastrar.php usando o método POST -->
    <form action="cadastrar.php" method="POST">
        <!-- Campo para o nome do fornecedor -->
        <input type="text" name="nome" placeholder="Nome do fornecedor" required><br>

        <!-- Campo para o tipo de flor fornecida -->
        <input type="text" name="tipo" placeholder="Produto (ex: Rosa Vermelha)" required><br>

        <!-- Campo para o preço da flor. Aceita casas decimais -->
        <input type="number" step="0.01" name="preco" placeholder="Preço unitário" required><br>

        <!-- Campo para a quantidade em estoque -->
        <input type="number" name="quantidade" placeholder="Quantidade em estoque" required><br>

        <!-- Campo de CEP. Ao digitar, a API ViaCEP preenche os campos de endereço -->
        <input type="text" name="cep" id="cep" placeholder="CEP" maxlength="8" required><br>

        <!-- Campos que serão preenchidos automaticamente com os dados da API -->
        <input type="text" name="rua" id="rua" placeholder="Rua" readonly><br>
        <input type="text" name="bairro" id="bairro" placeholder="Bairro" readonly><br>
        <input type="text" name="cidade" id="cidade" placeholder="Cidade" readonly><br>
        <input type="text" name="estado" id="estado" placeholder="Estado" readonly><br>

        <!-- Campo opcional para complemento -->
        <input type="text" name="complemento" placeholder="Complemento (opcional)"><br>

        <!-- Botão que envia o formulário para o PHP -->
        <button type="submit">Cadastrar Fornecedor</button>
    </form>

    <!-- Subtítulo para a lista de fornecedores já cadastrados -->
    <h2>Fornecedores Cadastrados</h2>

    <?php
    // Consulta SQL para selecionar todos os registros da tabela "flores", ordenados do mais recente para o mais antigo
    $sql = "SELECT * FROM flores ORDER BY id DESC";
    
    // Executa a consulta e guarda o resultado na variável
    $resultado = $conn->query($sql);

    // Verifica se há registros no banco
    if ($resultado->num_rows > 0) {
        // Se houver, começa a montar a tabela HTML com os dados
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>";

        // Percorre cada linha retornada pela consulta
        while ($linha = $resultado->fetch_assoc()) {
            echo "<tr>
                    <td>{$linha['id']}</td>
                    <td>{$linha['nome']}</td>
                    <td>{$linha['tipo']}</td>
                    <td>R$ {$linha['preco']}</td>
                    <td>{$linha['quantidade']}</td>

                    <!-- Monta o endereço a partir de rua, bairro, cidade e estado -->
                    <td>{$linha['rua']}, {$linha['bairro']}, {$linha['cidade']}-{$linha['estado']}</td>

                    <!-- Links para editar ou excluir o fornecedor -->
                    <td>
                        <a href='editar.php?id={$linha['id']}'>Editar</a> |
                        <a href='excluir.php?id={$linha['id']}' onclick=\"return confirm('Tem certeza que deseja excluir esta flor?')\">Excluir</a>
                    </td>
                </tr>";
        }

        // Finaliza a tabela
        echo "</table>";
    } else {
        // Se não houver registros, exibe uma mensagem
        echo "<p>Nenhuma flor cadastrada ainda.</p>";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
    ?>
</body>
</html>