<?php
require 'conexao.php'; // Inclui o arquivo de conexão

$stmt = $pdo->prepare("SELECT * FROM medicamentos");
$stmt->execute();
$medicamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Listar Medicamentos</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Lista de Medicamentos</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
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
                        <td><?php echo $medicamento['id']; ?></td>
                        <td><?php echo $medicamento['nome']; ?></td>
                        <td><?php echo number_format($medicamento['preco'], 2, ',', '.'); ?></td>
                        <td><?php echo $medicamento['quantidade']; ?></td>
                        <td><?php echo $medicamento['categoria']; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($medicamento['data_validade'])); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-primary">Voltar</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
