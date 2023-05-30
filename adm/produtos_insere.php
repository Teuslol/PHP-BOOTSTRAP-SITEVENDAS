<?php
// variaveis de autenticaçao
include ('acess_com.php');
// variaveis de ambiente
include ('../config.php');

// conexão com banco
include ('../connections/conn.php');

// criando consulta, recebendo dados
if($_POST){
if(isset($_POST['enviar'])){
    $nome_img = $_FILES['imagem_produto']['name'];
    $tmp_img = $_FILES['imagem_produto']['tpm_name'];
    $pasta_img = "../imagens/".$nome_img;
    // mover o arquivo para guarda na pasta imagens
    move_uploaded_file($tmp_img,$pasta_img);
}
// procedure 

$id_tipo_produto = $_POST['id_tipo_produto'];
$destaque_produto = $_POST['destaque_produto'];
$descri_produto = $_POST['descri_produto'];
$resumo_produto = $_POST['resumo_produto'];
$valor_produto = $_POST['valor_produto'];
$imagem_produto = $_FILES['imagem_produto']['name'];

$campos = "id_tipo_produto,destaque_produto,descri_produto,resumo_produto,valor_produto,imagem_produto";
$values = "$id_tipo_produto,'$destaque_produto','$descri_produto','$resumo_produto',$valor_produto,'$imagem_produto'";
//query de insert
$query = "insert into tbprodutos ($campos) values (values);" ;
// para gravar no BD
$resultado = $conn->query($query);

//após o insert redireciona a página
if(mysqli_insert_id($conn)){
    header("location: produtos_lista.php");
}else{
    header("location: produtos_lista.php");
}

}

// chave estrangeira tipo
$query_tipo = "select * from tbtipos order by rotulo_tipo asc" ;
$lista_fk = $conn->query($query_tipo);
$linha_fk = $lista_fk->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SYS_NAME;?> - Inserir</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
</head>
<body class="fundo">
    <?php include('menu_adm.php'); ?>
    <main class="container">
        <div class="row">
            <!--linha de dimencionamento-->
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h4 class="breadcrumb text-warning"><!--abre botão voltar-->
                    <a href="produtos_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left">

                            </span>
                        </button>
                    </a>

                    Inserindo Produtos
                </h4><!--fecha botão voltar-->
                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="produtos_insere.php" id="form_produto_insere" name="form_produto_insere" method="post" enctype="multipart/form-data">
                            <!--seleciona o type do produto-->
                            <label for="id_tipo_produto">Tipo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-task"></span>
                                </span>
                                <select name="id_tipo_produto" id="id_tipo_produto" class="form-control" required>
                                    <?php do{?>
                                        <option value="<?php $linha_fk['id_tipo'];?>">
                                            <?php echo $linha_fk['rotulo_tipo']; ?>
                                    </option>
                                    <?php } while ($linha_fk = $lista_fk->fetch_assoc()); 
                                        $linha_fk = mysqli_num_rows($lista_fk);
                                        if($linha_fk > 0){
                                            mysqli_data_seek($lista_fk,0);
                                            $linha_fk = $lista_fk->fetch_assoc();
                                        }
                                    ?>
                                </select>
                            </div><!--fecha seleciona o type do produto-->
                            <br>
                            <!--abre radio-->
                            <label for="destaque_produto">Destaque</label>
                            <div class="input-group">
                                <label for="destaque_produto_s" class="radio-inline">
                                    <input type="radio" name="destaque_produto" id="destaque_produto" value="sim">Sim
                                </label>
                                <label for="destaque_produto_n" class="radio-inline">
                                    <input type="radio" name="destaque_produto" id="destaque_produto" value="não" checked>Não
                                </label>
                            </div>
                            <!--fecha div radio do button-->
                            <br>
                            <label for="descri_produto">Descrição:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                    <input type="text" class="form-control" name="descri_produto" id="descri_produto" placeholder="Digite o título do produto" maxlength="100" required>
                                </span>
                            </div>
                            <br>
                            <label for="resumo_produto">Resumo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                </span>
                                <textarea name="resumo_produto" id="resumo_produto" cols="30" rows="8" placeholder="Digite os detalhes do produto" class="form-control"></textarea>
                            </div>
                            <br>
                            <label for="valor_produto">Valor: </label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                                </span>
                                <input type="number" class="form-control" name="valor_produto" id="valor_produto" min="0" step="0.01">
                            </div>
                            <br>
                            <label for="imagem_produto">Imagem:</label>
                            <div class="input-group">
                                <span class="input-group-addon" aria-hidden="true">
                                    <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                                </span>
                                <img src="" alt="" name="imagem" id="imagem" class="img-responsive">
                                <input type="file" class="form-control" name="imagem_produto" id="imagem_produto" accept="imagem/*">
                            </div>
                            <br>
                            <input type="submet" value="cadastrar" name="enviar" id="enviar" class="btn btn-danger btn-block">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>

        <!--script para imagem-->
    <script>
        document.getElementsById('imagem_produto').onchange = function (){
            var reader = new FileReader();
            if(this.files[0].size>528385){
                alert("A imagem deve ter no mázimo 500KB");
            $("#imagem").attr("src","blank");
            $("#imagem").hide();
            $("#imagem_produto").wrap('<form>').closest('form').get(0).reset();
            $("#imagem_produto").unwrap();
            return false;
            }
            // quando colocamos -1, quer dizer que não teve arquivo
            // verifica se o input do tipo file possui dado
            if(this.files[0].type.indexOf("image")==-1){
                alert("Formato inválido,escolha uma imagem");
                alert("A imagem deve ter no mázimo 500KB");
            $("#imagem").attr("src","blank");
            $("#imagem").hide();
            $("#imagem_produto").wrap('<form>').closest('form').get(0).reset();
            $("#imagem_produto").unwrap();
            return false;

            }
            reader.onload = function (e){
                // obter dados carregados e renderizar a miniatura
                document.getElementsById("imagem").src = e.target.result;
                $("#imagem").show();

            }
            reader.readAsDataURL(this.files[0]);
        }
    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>