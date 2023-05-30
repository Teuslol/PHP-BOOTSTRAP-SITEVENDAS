<?php
//atribuindo valores
$hostname_conn = "localhost";
$database_conn = "sitemusica";
$username_conn = "root";
$password_conn = "";
$charset_conn = "utf8";

//definindo parametros de conexão
$conn = new mysqli($hostname_conn,$username_conn,$password_conn,$database_conn,3307);
//caracteres da coneção
mysqli_set_charset($conn,$charset_conn);

//verificação de possiveis erros
if($conn->connect_errno){
  echo "Erro: ".$conn->connect_errno;
}else{
   // var_dump($conn);
}

?>