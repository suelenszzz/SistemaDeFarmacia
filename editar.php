<?php 
include 'conexao.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql= "SELECT FROM medicamentos WHERE id= :id";
    $sql = $pdo->prepare($sql);
    $sql->execute([':id' => $id]);
    $produto = $sql->fetch(PDO::FETCH_ASSOC);

    if(!$produto){
        echo "Produto não encontrado";
        exit;
    }
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $categoria = $_POST['categoria'];
    $data_validade = $_POST['data_validade'];

    $sql="UPDATE produto SET nome=:nome,preco=:preco,quantidade=:quantidade,categoria=:categoria,data_validade=:data_validade WHERE id=:id";
    $sql = $pdo->prepare($sql);
    $sql->execute(params: [
        ":nome"=> $nome,
        "preco"=> $preco,
        "quantidade"=> $quantidade,
        "categoria"=> $categoria,
        "data_validade"=> $data_validade,
        "id"=> $id
    ] );
    echo "Medicamento atualizado com sucesso";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Medicamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
    <h1 class="mt-5">Editar de Medicamentos</h1>
    <?php if (isset($mensagem)): ?>
        <div class="alert alert-success"><?= $mensagem ?></div>
    <?php endif; ?>
    <form method="POST" class="mt-3">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Medicamento</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="preco" class="form-label">Preço Unitário</label>
            <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
        </div>
        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade em Estoque</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" required>
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <input type="text" class="form-control" id="categoria" name="categoria" required>
        </div>
        <div class="mb-3">
            <label for="data_validade" class="form-label">Data de Validade</label>
            <input type="date" class="form-control" id="data_validade" name="data_validade" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
    <a href="index.php" class="btn btn-secondary mt-3">Voltar</a>
</body>
</html>