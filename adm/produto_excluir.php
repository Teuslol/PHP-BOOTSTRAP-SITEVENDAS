<?php
// incluindo o sistema de autenticação

include('acesso_com.php');

// incluindo conexão com DB
include('../connections/conn.php');


$id_prod = $_get['id_produto'];

// removendo na força
$query = "delete from tbprodutos where id_produto = $id_produto;";

// removendo  usando método de acumulador (se precisar)
//$query = "update tbprodutos set deletado = default where id_produto = $id_produto;";


$resultado = $conn->query($query);
if(mysqli_insert_id($conn)){
    header("location: produtos_lista.php");
}else{
    header("location: produtos_lista.php");
}


?>