 <?php
    // pegar arquivo com ele ou escrever do zero 02:37, aula 5
    ?>

 <?php
    include('../connections/conn.php');
    
    // inicia verificação do login

    if ($_POST) {
        // definindo o use do banco de dados
        mysqli_select_db($conn, $database_conn);

        // verificar login e senha
        $login_usuario = $_POST['login_usuario'];
        $senha_usuario = $_POST['senha_usuario']; //md5
        $verificaSQL = $conn->query("select * from tbusuario where login_usuario = '$login_usuario' and senha_usuario = '$senha_usuario';");
        // carregar os dados e verificar a linha de retorno caso exista.
        $rowLogin = $verificaSQL->fetch_assoc();
        $numerolinhas = mysqli_num_rows($verificaSQL);



        // se a sessão não existir, iniciamos uma sessão.
        if (!isset($_SESSION)) {
            $sessao_antiga = session_name("BlueGalaxyMusic");
            session_start();
            $sessao_name_new = session_name(); //recupera o nome atual

        }
       /* echo "Nivel de usuario: ".$rowLogin['nivel_usuario']." Numero De linhas: ".$numerolinhas." user: ".$login_usuario." senha: ".$senha_usuario." Nome da sessao: ".$sessao_name_new; 
        print_r($rowLogin);*/
        if ($numerolinhas > 0) {

            $_SESSION['login_usuario'] = $login_usuario;
            $_SESSION['nivel_usuario'] = $rowLogin['nivel_usuario'];
            $_SESSION['nome_da_sessao'] = $sessao_name_new;
            echo "<script>window.open('index.php','_self')</script>";
            if ($rowLogin['nivel_usuario'] == "sup") {
                echo "<script>window.open('index.php','_self')</script>";
            } else {
                echo "<script>window.open('../cliente/index.php?cliente=" . $login_usuario . "','_self')</script>";
            }
        } else {
            echo "<script>window.open('invasor.php','_self')</script>";
        }
    }


    ?>

 <!DOCTYPE html>
 <html lang="pr-br">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>BlueGalaxyMusic - Login</title>
     <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
     <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
 </head>

 <body class="fundofixo">

     <main class="container">
         <section>
             <article>
                 <div class="row">
                     <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                         <h1 class="breadcrumb text-info text-center">Faça Login</h1>
                         <div class="thumbnail">
                             <p class="text-info text-center" role="alert">
                                 <i class="fas fa-users fa-10x"></i>
                             </p>
                             <br>
                             <div class="alert alert-info" role="alert">
                                 <form action="login.php" name="form_login" id="form_login" method="post" enctype="multipart/form-data">
                                     <label for="login_usuario">Login:</label>
                                     <p class="input-group">
                                         <span class="input-group-addon">
                                             <span class="glyphicon glyphicon-user text-info" aria-hidden="true"></span>
                                         </span>
                                         <input type="text" name="login_usuario" id="login_usuario" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu login.">
                                     </p>
                                     <label for="senha_usuario">Senha:</label>
                                     <p class="input-group">
                                         <span class="input-group-addon">
                                             <span class="glyphicon glyphicon-qrcode text-info" aria-hidden="true"></span>
                                         </span>
                                         <input type="password" name="senha_usuario" id="senha_usuario" class="form-control" required autocomplete="off" placeholder="Digite sua senha.">
                                     </p>
                                     <p class="text-right">
                                         <input type="submit" value="Entrar" class="btn btn-primary">
                                     </p>
                                 </form>
                                 <p class="text-center">
                                     <small>
                                        <br>
                                         Caso não faça uma escolha em 30 segundos será redirecionado automaticamente para página inicial.
                                     </small>
                                 </p>
                             </div><!-- fecha alert -->
                         </div><!-- fecha thumbnail -->
                     </div><!-- fecha dimensionamento -->
                 </div><!-- fecha row -->
             </article>
         </section>
     </main>




   <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script src="../js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
 </body>

 </html>