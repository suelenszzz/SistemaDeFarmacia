<?php
require 'conexao.php';

$sql = "SELECT * FROM medicamentos";
$result = $pdo->query($sql);
$medicamentos = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Medicamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
    <h1 class="mt-5">Lista de Medicamentos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th>Data de Validade</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($medicamentos as $medicamento): ?>
                <tr>
                    <td><?= $medicamento['nome'] ?></td>
                    <td><?= number_format($medicamento['preco'], 2, ',', '.') ?></td>
                    <td><?= $medicamento['quantidade'] ?></td>
                    <td><?= $medicamento['categoria'] ?></td>
                    <td><?= date('d/m/Y', strtotime($medicamento['data_validade'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-secondary mt-3">Voltar</a>
</body>
</html>
