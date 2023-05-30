<?php
//incluindo o sistema de autenticação
include ('acess_com.php');

// incluindo o arquivo de conecção
include ('../connections/conn.php');

//selecionando os dados 
$consulta = "select * from tbtipos order by rotulo_tipo asc";

//buscar a lista completa de produtos
$lista = $conn->query($consulta);

// separar produtos por linha
$linha = $lista->fetch_assoc();

//numero de linhas que veio do banco de dados
$total_linhas = $lista->num_rows;
?>