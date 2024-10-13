<?php
$host = 'localhost'; 
$dbname = 'farmacia'; // Nome do banco de dados
$username = 'root'; // Usuário do banco
$password = ''; // Senha do banco
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}
?>
