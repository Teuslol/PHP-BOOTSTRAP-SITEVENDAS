<?php
include('connections/conn.php');

$id = $_GET['id_produto'];

//echo "<h1>"Você digitou na busca:" ".$busca_user."</h1>";

$consulta = "select * from vw_tbprodutos where id_produto = ".$id;
       /* vw é a tabela do msql aula 2 3,35*/
$produtoconsulta = $conn -> query ($consulta);
$linha = $produtoconsulta -> fetch_assoc();

/*?>

<table>
    <?php do {?>
        <tr>
            <td><?php echo $linha['descri_produto']?></td>
            <td><?php echo $linha['valor_produto']?></td>
        </tr>
        <?php } while ($linha=$lista->fetch_assoc()) ?>
</table> */

?>

<!-- aula 3 -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css">
    <title>Detalhe do produtos - <?php $linha['descri_produto']?></title>
</head>
<body class="fundofixo">
       <main class="container">
                <h2 class="breadcrumb alert-danger">
                    <a href="javascript: window.history.go(-1)" class="btn btn-danger">
                        <span class="glyphicon glyphicon-left"></span>
                    </a>
                  <strong><i><?php echo $linha['descri_produto']; ?></i></strong> 
                </h2>
                <div class="row"><!--Manter os elementos na linha-->
                    <!--Abre uma estrutura de repetição-->
                    <?php do {?>
                        <!--Abre thumbmail/card-->
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                        <div class="thumbnail">
                            <a href="produto_detalhe.php?id_produto=<?php echo $linha['id_produto'];?>">
                                <img src="imagens/<?php echo $linha['imagem_produto'];?>" alt="" class="img-responsive img-rounded">
                            </a> 
                            <div class="caption text-right">
                                <h3 class="text-danger">
                                    <!--aula 3 1;18 mysql-->
                                    <strong><?php echo $linha['descri_produto'];?></strong>
                                </h3>
                                <p class="text-warning">
                                    <strong>
                                        <?php echo $linha['rotulo_tipo'];?>
                                    </strong></p>
                                    <p class="text-left">
                                        <?php echo mb_strimwidth($linha['resumo_produto'],0,42,"..."); ?>
                                    </p>
                                    <p>
                                        <button class="btn btn-default disabled" style="cursor: default;" role="button">
                                            <?php echo number_format($linha['valor_produto'],2,',','.'); ?>
                                        </button>
                                        <a href="produto_detalhe.php?id_produto=<?php echo $linha['id_produto'];?>">
                                            <span class="hidden-xs">Saiba Mais ...</span>
                                            <span class="visible-xs glyphicon glyphicon-eye-open" aria-hidden="true"></span>                                       
                                        </a>
                                        
                                                                         
                                    </p>
                            </div>                  
                        </div>
                    </div><!--fecha thumbnail-->
                    <?php } while ($linha=$produtoconsulta->fetch_assoc());?>
                </div> <!-- Fecha Manter os elementos na linha-->
                        <!--aula 3 2:22-->

         <footer>
            <?php include('rodape.php');?>
         </footer>
       </main> 
<!-- links dos arquivos bootstrap js-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>