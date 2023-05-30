<?php
include('connections/conn.php');

$busca_user = $_GET['buscar'];

//echo "<h1>"Você digitou na busca:" ".$busca_user."</h1>";

$consulta = "select * from vw_tbprodutos where descri_produto like '%".
$busca_user."%' order by descri_produto asc";       /* vw é a tabela do msql aula 2 3,35*/
$lista = $conn->query($consulta);
$linha = $lista->fetch_assoc();
$totallinhas = $lista->num_rows;

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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/meu_estilo.css">
    <title>busca de produtos</title>
</head>
<body class="fundofixo">
       <main class="container">
            <!--mostra se a consulta retornar vazio-->
            <?php if($totallinhas== null ){   ?>
            <h2 class="breadcrumb alert-danger">
                <a href="javascript: window.history.go(-1)" class="btn btn-danger">
                <span class="glyphicon glyphicon-left"></span>
                </a>
                  Você Pesquisou:
                  <strong><i><?php echo $busca_user; ?></i></strong> 
                  <br> 
                  Produto não encontrado, em breve no catalogo
            </h2>
                <?php }?>
            
            <!--fecha se a consulta vazio-->
            <!-- mostrar os se a consulta retorna dados-->

            <?php if($totallinhas > 0 && $linha != null){?>
                <h2 class="breadcrumb alert-danger">
                    <a href="javascript: window.history.go(-1)" class="btn btn-danger">
                        <span class="glyphicon glyphicon-left"></span>
                    </a>
                  Você Pesquisou:
                  <strong><i><?php echo $busca_user; ?></i></strong> 
                </h2>
                <div class="row"><!--Manter os elementos na linha-->
                    <!--Abre uma estrutura de repetição-->
                    <?php do {?>
                        <!--Abre thumbmail/card-->
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <a href="produto_detalhe.php?id_produto=<?php echo $linha['id_produto'];?>">
                                <img src="images/<?php echo $linha['imagem_produto'];?>" alt="" class="img-responsive img-rounded">
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
                    <?php } while ($linha=$lista->fetch_assoc());?>
                </div> <!-- Fecha Manter os elementos na linha-->
                <?php }?>

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