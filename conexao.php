<?php
// Definindo as configurações de conexão com o banco de dados
$host = "localhost";       // Nome do servidor (geralmente localhost, quando rodando localmente)
$usuario = "root";         // Usuário do MySQL (pode ser diferente dependendo da configuração)
$senha = "Senai@118";      // Senha do MySQL (pode estar vazia se não configurada)
$banco = "floricultura";   // Nome do banco de dados que será utilizado

// Criando a conexão com o banco de dados usando mysqli
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificando se houve erro na conexão
if ($conn->connect_error) {
    // Caso tenha erro, o script para aqui e exibe uma mensagem
    die("Falha na conexão: " . $conn->connect_error);
}

// Se chegar aqui, a conexão foi feita com sucesso e o sistema pode continuar rodando
?>