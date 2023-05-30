

<?php
/*fazer uma pagina de reserva de produtos para clientes*/
include ('connections/conn.php');
/*aula 4 03:41 tabela my sql */
if(isset($_GET['id_tipo'])){
        
    $idtipo = $_GET['id_tipo'];
    $consulta = "select * from vw_tbprodutos where id_tipo_produtos = ".$idtipo." order by descri_produto" ;
    $lista = $conn -> query($consulta);
    $linha = $lista->fetch_assoc();
    $totallinhas = $lista->num_rows;
}else
{
    $totallinhas = 0;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css">
</head>
<body class="fundofixo">
        <main class="container">
        <!--teste de a consulta retorna vazia-->
        <!--mysql aula 4 30:20-->
        <?php if($linha == null){?>
            <h2 class="breadcrumb alert-danger">
                <a href="javascript: window.hystory.go(-1)" class="btn btn-danger">
                    <span class="glyphicon glyphicon-checron-left"></span>
                </a>
                Em breve Teremos
            </h2>
        <?php }else{?>
        <!--final do teste de a consulta retorna vazia-->
        <!--linha produto-->
        <div class="row">
            <!--inicio estrutura de repetição-->
            <?php do{ ?>
                <!--abre o thumbnail/card-->
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a href="produto_detalhe.php?id_produto=<?php echo $linha['id_produto']?>">
                            <img src="imagens/<?php echo $linha['imagem_produto'] ?>" 
                                alt="" class="img-responsive img-rounded" style="height: 15em">
                        </a>
                        <div class="caption text-right"><!--inicio caption-->
                            <h3 class="text-danger">
                                <strong><?php echo $linha ['descri_produto'] ?></strong>
                            </h3>
                            <p class="text-warning">
                                <strong><?php echo mb_strimwidth ($linha ['rotulo_tipo'],0,42,'...') ?></strong> 
                            </p>
                            <p class="text-left">
                                <strong><?php echo $linha ['resulmo_produto'] ?></strong> 
                            </p>
                            <p>
                                <button class="btn btn-default disabled" role="button" style="cursor: pointer;">
                                    <?php echo number_format($linha['valor_produto'],2,',','.'); ?>
                                </button>
                                <a href="produto_detalhe.php?id_produto=<?php echo $linha['id_produto'];?>" class="btn btn-danger" role="button" >
                                    <span class="hidden-xs">saiba mais...</span>
                                    <span class="visible-xs glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </a>
                            </p>


                        </div><!--final caption-->



                    </div>
                </div><!--fecha o thumbnail/card-->
            <?php } while($linha=$lista->fetch_assoc());}?>
            <!--final estrutura de repetição-->

        </div>
        <!--final linha produto-->

    
    </main>
    <!-- links dos arquivos bootstrap js-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>