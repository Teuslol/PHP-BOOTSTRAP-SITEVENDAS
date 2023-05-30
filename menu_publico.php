<?php
// incluindo arq de conexão
include('connections/conn.php');


$lista_tipos = $conn->query('select * from tbtipos order by rotulo_tipo;');
$rows_tipos = $lista_tipos->fetch_all();

// consulta para trazer os dados (parte do sql)

$consulta = "select * from tbtipos order by rotulo_tipo ";
//query = consulta
$listaTipos = $conn->query($consulta);
//transformando obj em matris associativa para ver o conteudo 
$linhastipo = $listaTipos->fetch_assoc();
$totallinhas = $listaTipos->num_rows;
 ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>Menu Público</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="css/meu_estilo.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><img src="imagens/perf.png" height="100%"></img></a>
    </div>
    <div class="collapse navbar-collapse" id="menuPublico">
      <ul class="nav navbar-nav">
        <li class=""><a class="" href="index.php#destaque">DESTAQUES</a></li>
        <li class="">
        <a class="dropdown-toggle" href="index.php#produtos">PRODUTOS<span class="caret"></a>
        </li>


        <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            TIPOS
                            <span class="caret"></span>                        
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach($rows_tipos as $row){?>
                                <li><a href="produtos_por_tipo.php?id_tipo=<?php echo $row[0].'&rotulo='.$row[2] ?>"><?php echo $row[2] ?></a></li>
                            <?php }?>
                        </ul>
                    </li>


        <li><a href="index.php#contato">CONTATO</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="adm/index.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li>
            <a href="#">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar" id="busca">
                    <button class="btn btn-primary my-2 my-sm-0" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </form>
            </a>
        </li>

      </ul>
    </div>
  </div>
</nav>
<?php mysqli_free_result($listaTipos);?>
</body>
</html>