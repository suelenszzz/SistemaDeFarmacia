<?php
require 'conexao.php'; // Inclui o arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $categoria = $_POST['categoria'];
    $data_validade = $_POST['data_validade'];

    $stmt = $pdo->prepare("INSERT INTO medicamentos (nome, preco, quantidade, categoria, data_validade) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nome, $preco, $quantidade, $categoria, $data_validade]);
    header("Location: listarMed.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastrar Medicamento</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Cadastrar Medicamento</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome do Medicamento</label>
                <input type="text" class="form-control" name="nome" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço Unitário</label>
                <input type="text" class="form-control" name="preco" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade em Estoque</label>
                <input type="number" class="form-control" name="quantidade" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <input type="text" class="form-control" name="categoria" required>
            </div>
            <div class="form-group">
                <label for="data_validade">Data de Validade</label>
                <input type="date" class="form-control" name="data_validade" required>
            </div>
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <a href="index.php" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
