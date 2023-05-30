<?php
// incluindo variavel de sistema
include ('../config.php');

//incluindo o sistema de autenticação
include ('acess_com.php');

// incluindo o arquivo de conecção
include ('../connections/conn.php');

//selecionando os dados 
$consulta = "select * from vw_tbprodutos order by descri_produto asc";

//buscar a lista completa de produtos
$lista = $conn->query($consulta);

// separar produtos por linha
$linha = $lista->fetch_assoc();

//numero de linhas que veio do banco de dados
$total_linhas = $lista->num_rows;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produtos (<?php echo SYS_NAME." - Lista (".$total_linhas;?>) Produtos</title>
    <link rel="stylesheet" href="../CSS/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../CSS/meu_estilo.css" type="text/css">
</head>
<body class="fundofix">
    <?php
    include ('menu_adm.php');
    ?>
    <main class="container">
        <h1 class="breadcrumb alert-danger">Lista de produtos</h1>
        <table class="table table-condensed table-hover tbopacidade">
            <thead>
                <th class="hidden">id</th>
                <th>Tipo</th>
                <th>Descrição</th>
                <th>Resumo</th>
                <th>Imagem</th>
                <th>
                    <a href="produtos_insere.php" class="btn btn-block btn-primary btn-xs">
                        <span class="hidden-xs">Adicionar</span>
                        <span class="glyphicon glyphicon-plus" aria-hidden = "true"></span>
                    </a>
                </th>
                
            </thead><!--fehca linha de cabeçario de tabela-->
            <!--tbody>tr>td*8-->
            <tbody><!--corpo da tabela-->
            <!--abre estrutura de repetição-->
            <?php do {?>
                <tr><!--linha da tabela-->
                    <td class="hidden"><?php echo $linha['id_produto'];?></td>
                    <td>
                        <span class="visible-xs"><?php echo $linha['sigla_tipo'];?></span>
                        <span class="hidden-xs"><?php echo $linha['rotulo_tipo'];?></span>
                    </td>
                    <td>
                        <?php 
                        if($linha['destaque_produto'] =='sim'){
                            echo ("<span class='glyphicon glyphicon-heart text-danger' aria-hidden='true'></span>");
                        } else /*if($linha['destaque_produto'] =='não')*/{
                            echo ("<span class='glyphicon glyphicon-ok text-info' aria-hidden='true'></span>");
                                
                            }
                           
                        ?>
                        <?php echo $linha['descri_produto'];?>
                    </td>
                    <td><?php echo $linha['resumo_produto'];?></td>
                    <td><?php echo number_format($linha['valor_produto'],2,',','.');?></td>
                    <td>
                        <img src="../imagens/<?php echo $linha['imagem_produto'];?>" alt="" width="100px">
                    </td>
                    <td>
                        <a href="porduto_atualiza.php?id_produto=<php echo $linha['id_produto'];?>" class="btn btn-warning btn-block btn-xs">
                            <span class="hidden-xs">Alterar <br></span>
                            <span class="glyphicon glyphicon-pencil"aria-hadden="true"></span>
                        </a>
                        <button class="btn btn-danger btn-block btn-xs delete" role="button" data.nome="<?php echo $linha['descri_produto'];?>" data-id="<?php echo $linha['id_produto'];?>">
                            <span class="hidden-xs">Excluir <br></span>
                            <span class="glyphicon glyphicon-trash"aria-hadden="true"></span>
                        </button>
                    </td>
                    </tr><!-- fecha linha da tabela -->
                <?php } while ($linha=$lista->fetch_assoc()); ?>
            </tbody><!--fecha corpo da tabela-->
        </table>






    </main>
    <!--modal funçao JAVA script-->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-danger">Atenção!</h4>
                </div>
                <div class="modal-body">
                    Deseja Realmente <strong>Excluir</strong> ?
                    <h3><span class="text-danger nome"></span></h3>
                </div>
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-danger delete-yes" >
                        Confirmar
                    </a>
                    <button class="btn btn-success" data-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div><!--fecha modal-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- script para o modal em javascript -->
    <script type="text/javascript">
        $('.delete').on('click', function(){
            // busca o valir do atributo data nome
            var nome = $(this).data('nome');
            // busca o valor data id do produto 
            var id = $(this).data('id');
            // insere o nome do item na confirmação do modal
            $('span.nome').text(nome);
            // enviar o id  atraves do link do button confirma
            $('a.delete-yes').attr('href','produto_excluir.php?id_produto='*id);
            // abre modal
            $('myModal').modal('show');
        })
    </script>
    <!-- fecha script para o modal em javascript -->
    <!--aula 7-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>