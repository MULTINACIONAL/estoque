<?php
// Conexão com o banco de dados MySQL
$servername = "localhost"; // ou o IP do seu servidor MySQL
$username = "root"; // seu nome de usuário do MySQL
$password = ""; // sua senha do MySQL
$dbname = "estoque"; // nome do banco de dados

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obter os dados do formulário
$data = $_POST['data']; // Data
$hora = date("H:i:s"); // Hora atual
$nome_usuario = $_POST['nome_usuario']; // Nome do usuário
$setor = $_POST['setor']; // Setor
$produto = $_POST['produto']; // Produto
$quantidade = $_POST['quantidade']; // Quantidade

// Preparar a query SQL para inserir os dados
$sql = "INSERT INTO reposicao_estoque (data, hora, nome_usuario, setor, produto, quantidade)
        VALUES ('$data', '$hora', '$nome_usuario', '$setor', '$produto', '$quantidade')";

// Verificar se a inserção foi bem-sucedida
if ($conn->query($sql) === TRUE) {
    echo "Novo registro inserido com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fechar a conexão
$conn->close();
?>