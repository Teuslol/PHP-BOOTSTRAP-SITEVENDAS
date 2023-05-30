<?php
//incluindo variaveis de ambiente, acesso e banco
include ('../config.php');
include ('acess_com.php'); // importante!!!!!
include ('../connections/conn.php');

if($_POST){
    // guardando o nome da imagem no banco de dados e arquivo na pasta imagens
    if($_FILES['imagem_produto']['name']){
        $nome_img = $_FILES['imagem_produto']['name'];
        $tmp_img = $_FILES['imagem_produto']['tpm_name'];
        $pasta_img = "../imagens/".$nome_img;
        // mover o arquivo para guarda na pasta imagens
        move_uploaded_file($tmp_img,$pasta_img);
    }else{
        $nome_img = $_POST['imagem_produto_atual'];
    }
    // receber os dados do formulario
    //organizar os campos na mesma ordem
    $id_tipo_produto = $_POST ['id_tipo_produto'];
    $destaque_produto = $_POST ['destaque_produto'];
    $descri_produto = $_POST ['descri_produto'];
    $resumo_produto = $_POST ['resumo_produto'];
    $valor_produto = $_POST ['valor_produto'];
    $imagens_produto = $nome_produto;
    
    
    //campo do formulario para filtrar o registro
    $id_filtro = $_POST['id_produto'];

// procidior
    // Consulta (query) Sql para inserção dos dados
    $query = "update tbprodutos set 
            id_tipo_produto = '".$id_tipo_produto."',
            destaque_produto = '".$destaque_produto."', 
            descri_produto = '".$descri_produto."',
            resumo_produto = '".$resumo_produto."',
            valor_produto  = ".$valor_produto.",
            imagens_produto = '".$imagens_produto."'
            where id_produto = ". $id_filtro.";";
    $resultado = $conn->query($query);

    /*     if($resultado){
        header('location: produtos_lista.php');
    } */

    //apos a ação a pagina sera redirecionada
    if(mysqli_insert_id($conn)){
        header('location: produtos_lista.php');
        // adicionar   o tratamento....
    }else{
        header('location: produtos_lista.php');
    }

}

// consulta para recuperar/trazer dados do filtro da chamada da pagina...

//$id_alterar = $_GET['id_produto'];
if($_GET){
    $id_form = $_GET['id_produto'];
}else{
    $id_form = 0;
}
$lista = $conn->query("select * from tbprodutos where id_produto = $id_form");
$row = $lista->fetch_assoc();
$numRows = $lista->num_rows;

    //selecionar os dados de chave estrangeira (lista de tipos de produto)
    $consulta_fk = "select * from tbtipos order by rotulo_tipo asc";
    $lista_fk = $conn->query($consulta_fk);
    $row_fk = $lista_fk->fetch_assoc();
    $nlinhas = $lista_fk->num_rows;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Alterar</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
</head>
<body>
    <?php include('menu_adm.php');?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 com-md-4">
                <h4 class="breadcrumb text-danger">
                    <a href="produtos_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left">

                            </span>
                        </button>
                    </a>
                    Atualizando Produtos
                </h4>
                <div class="thumbnail"><!--abre thumbnail-->
                    <div class="alert alert-danger" role="alert">
                        <form action="porduto_atualiza.php" method="post" id="form_produto_atualiza" name="form_produto_atualiza" enctype="multipart/form-data">
                            <!--inserir o campo id_produto oculto para uso no filtro-->
                            <input type="hidden" name="id_produto" id="id_produto" value="<?php echo $linha['id_produto'];?>">
                            <!--Select id_tipo_produto-->
                            <label for="id_tipo_produto">tipo: </label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                    
                                </span>
                                <select name="id_tipo_produto" id="id_tipo_produto" class="form-control" require>
                                    <?php do{?>
                                        <option value="<?php echo $linha_fk['id_tipo']?>"
                                            <?php if(!(strcmp($linha_fk['id_tipo'],$linha['id_tipo_produto']))){
                                                echo "selected=\"selected\"";
                                            }
                                            
                                            ?>>
                                            <?php echo $linha_fk['rotulo_tipo'];?>
                                        </option>
                                    <?php } while ($linha_fk = $lista_fk->fetch_assoc());
                                        $linhas_fk = mysqli_num_rows($lista_fk);
                                        if($linhas_fk>0){
                                            mysqli_data_seek($lista_fk,0);
                                            $linhas_fk = $lista_fk->fetch_assoc();

                                        }
                                    ?><!--fecha o laço Do-->
                                </select><!--fehca select-->
                            </div>
                            <br>
                            <!--Radio destaque_produto-->
                            <label for="destaque_produto">Destaque?</label>
                            <div class="input-group">
                                <label for="destauqe_produto_s" class="radio-inline">
                                    <input type="radio" name="destaque_produto" id="destaque_produto" value="sim" <?php echo $linha['destaque_produto']=="sim"?"checked":null; ?>>
                                    Sim
                                </label>
                                <label for="destauqe_produto_n" class="radio-inline">
                                    <input type="radio" name="destaque_produto" id="destaque_produto" value="não" <?php echo $linha['destaque_produto']=="não"?"checked":null; ?>>
                                    Não
                                </label>
                                <!--fecha radio-->
                            </div>
                            <br>
                            <!--abre text drecri_produto-->
                            <label for="descri_produto">Descrição: </label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutleryt" aria-hidden="true"></span>
                                    
                                </span>
                                <input type="text" class="form-control"id="descri_produto" name="descri_produto" maxlength="100" require value="<?php echo $linha['descri_produto'];?>" placeholder="Digite a Descrição ...">
                            </div><!--fecha tex descri_produto-->
                            <br>
                            <!--Textarea de Resulmo_produto-->
                            <label for="resulmo_produto">Resumo</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                        
                                    </span>
                                    <textarea name="resumo_produto" id="resumo_produto" cols="30" rows="8" placeholder="Digite os Detalhes do produto" class="form-control">
                                        <?php echo $linha['resumo_produto'];?>
                                    </textarea>
                                </div><!--fecha textarea-->
                            <br>
                            <!--number valor_produto-->
                            <label for="valor_produto">Valor: </label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>                                        
                                    </span>
                                    <input type="number" name="valor_produto" id="valor_produto" min="0" step="0.01" class="form-control" value="<?php echo $linha ['valor_produto'];?>">
                                </div>
                            <!--fecha valor produto-->
                            <br>
                            <!--file imagem produto atual-->
                        <label for="imagem_produto_atual">Imagem Atual: </label>
                        <img src="../imagens/<?php echo $linha['imagem_produto']; ?>" alt="" class="img-responsive" style="max-width:40%"  >
                        <!--guardar o nome da imagem caso ela não seja alterada-->
                        <input type="hidden" name="imagem_produto_atual" id="imagem_produto_atual" value="<?php echo $linha['imagem_produto'];?>">
                        <!--fecha file imagem produto-->
                        <br>

                        <!--file imagem produto nova-->
                        <label for="imagem_produto">Nova Imagem:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>                                        
                                    </span>
                            <img src="" alt="" name="imagem" class="img-responsive" id="imagem">
                            <input type="file" name="imagem_produto" id="imagem_produto" class="form-control" accept="imagem/*" >

                        </div><!-- fecha file imagem produto nova-->
                        <br>
                        <!--btn enviar-->
                        <input type="submit" value="atualizar" name="enviar" id="enviar" class="btn btn-danger btn-block">
                        </form>
                    </div>
                </div><!--fecha thumbnail-->
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

<?php
    mysqli_free_result($lista);
    mysqli_free_result($lisa_fk);

?>