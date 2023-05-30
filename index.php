<?php
include ('config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SYS_NAME?>&nbsp;- Area Administrativa</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css">
</head>
<body class= "fundofixo" >
    
<!-- area do menu -->
<?php include('menu_publico.php');?>
<a name="home"></a>
<main class="container">


    <!-- area do carousel -->
    <?php include("carousel.php");?>

    <!-- area de destaques -->
    <?php include("produtos_destaque.php");?>
    <a name="destaques">&nbsp;</a>

    <!-- area produtos em geral -->
    <a name="produtos">&nbsp;</a>
    <?php include("produtos_geral.php");?>
    <hr>    

    <!-- area produtos em geral -->
    <a name="produtos_por_tipos">&nbsp;</a>
    <?php include("produtos_por_tipo.php");?>
    <hr>    

    <!-- area de rodape -->
    <footer>
        <?php include("rodape.php");?>
        <a name="contato">&nbsp;</a>
    </footer>
</main>
<!-- links dos arquivos bootstrap js-->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
</body>
</html>

<?php
?>

