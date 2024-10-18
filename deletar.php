<?php 
include 'conexao.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql= "DELETE FROM medicamentos WHERE id= :id";
    $sql = $pdo->prepare($sql);
    $sql->execute([':id' => $id]);
    echo "Medicamento deletado!";
}
?>