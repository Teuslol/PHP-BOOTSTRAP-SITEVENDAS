<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>verificação de contato</title>
    <!--apos 15 segundos a pagina sera redirecionada para index.php-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css">
</head>
<body class="fundofixo">
    <main class="container">
        <!-- inicio da sessão-->
        <section>
            <div class="jumbotron alert-denger">
                <h1 class="text-danger">Agradecemos o contato</h1>
                <!--destino da mensagem enviada atraves do POST-->
                <?php 
                    $destino = "emaildeteste@gmail.com"; 
                    $nome_contato = $_POST['nome_contato'];
                    $email_contato = $_POST['email_contato'];
                    $msg_contato = "Mensagem De: ".$_POST['nome_contato']."\n". $_POST['comentario_contato'] ;
                    echo "Destino: $destino, Nome: $nome_contato. Email: $email_contato, $msg_contato";
                    $mailsend = mail($destino,'formulario de contato Site',$msg_contato,"De: $email_contato");
                    echo "<p class='text-center'>Obrigado por enviar seus comentarios, <b>$nome_contato</b></p>";
                    echo "<p class='text-center'>Mensagem enviada com Sucesso!!</p>";
                ?>


            </div>





        </section>
        <!-- final da sessão-->

    </main>
        
    </div>








    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>  
</body>
</html>