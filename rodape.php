<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css">
    <title>Nome do meu site</title>
</head>
<body class="fundofixo">
    <!--abre painel rodapé-->
    <div class="row panel-footer" style="background-color: rgba(255,255,255,0.8);">
     <!--abre area localização-->
     <div class="col-sm-6 col-md-4">
        <div class="panel-footer" style="background: none;">
                <!--aqui vc coloca a foto da logo-->
            <img src="images/logo" alt="">
            <br>
            <i>Aqui coloca o teu slogan</i>
            <address>
                <i>Rua temos que inventar, 00 itaquera - são paulo - CEP 01255-987
                    <br>
                    <samp class="glyphicon glyphicon-phone-alt"></samp>
                    &nbsp; telefone 11-95432-9955
                    <samp class="glyphicon glyphicon-envelope"></samp>
                    &nbsp; <a href="mailto:email@musica.com.br?subject=contato&cc=email@musica.com.br">
                                email@musica.com.br
                            </a>
                            </address>
                            <div class="embad-responsive embad-responsive-16by9">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3507.081323173601!2d-81.46881578279715!3d28.477097450033025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88e77b01e56e9157%3A0x8c42cd33aa32e2b8!2sHard%20Rock%20Hotel!5e0!3m2!1spt-BR!2sbr!4v1664045361300!5m2!1spt-BR!2sbr" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                </div>
     </div><!--fecha area de localização-->
     <!-- abre area de navegação-->
     <div class="col-sm-6 col-md-4">
<div class="panel-footer" style="background: none;">
<h4>Links</h4>
<ul class="nav nav-pills nav-stacked">
    <li>
        <a href="index.php#home" class="text-danger">
            <span class="glyphicon glyphicon-home" aria-hidden="true">
                &nbsp;Home
            </span>
        </a>
    </li>
    <li>
        <a href="index.php#destaques" class="text-danger">
            <span class="glyphicon glyphicon-ok-sign" aria-hidden="true">
                &nbsp;Destaques
            </span>
        </a>
    </li>
    <li>
        <a href="index.php#produtos" class="text-danger">
            <span class="glyphicon glyphicon-cutlery" aria-hidden="true">
            &nbsp;Produtos
            </span>
        </a>
    </li>
    <li>
        <a href="index.php#contato" class="text-danger">
            <span class="glyphicon glyphicon-envelope" aria-hidden="true">
            &nbsp;Contato
            </span>
        </a>
    </li>
    <li>
        <a href="admin/index.php#" class="text-danger">
            <span class="glyphicon glyphicon-user" aria-hidden="true">
            &nbsp;Administração
            </span>
        </a>
    </li>
</ul>
</div>
     </div><!--fecha area de navegação-->
     <!--abre area de contato-->
     <div class="col-sm-6 col-md-4">
        <div class="panel-footer" style="background: none;">
            <h4>contato</h4>
            <form action="rodape_contato_envia.php" method="post" name="form-contato" id="form-contato">
                <p>
                    <span class="input-grup">
                        <span class="input-group-addon" id="basic-addon1">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>                        
                        </span>
                        <input type="text" name="nome_contato" id="nome_contato" placeholder="Digite seu nome" aria-describedby="basic-addon1" required class="form-control">
                    </span>
                </p>
                <p>
                    <span class="input-grup">
                        <span class="input-group-addon" id="basic-addon2">
                            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>                        
                        </span>
                        <input type="email" name="email_contato" id="email_contato" placeholder="Digite seu email" aria-describedby="basic-addon2" required class="form-control">
                    </span>
                </p>
                <p>
                    <span class="input-grup">
                        <span class="input-group-addon" id="basic-addon3">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>                        
                        </span>
                        <textarea name="comentario_contato" id="comentario_contato" placeholder="Digite seus comentarios/duvidas" aria-describedby="basic-addon3" required class="form-control" cols="30" rows="5"></textarea>
                    </span>
                </p>
                <p>
                    <button class="btn btn-primary btn-block" aria-label="enviar" role="button">
                        ENVIAR
                        <span class="glyphicon glyphicon-send" ></span> 
                    </button>
                </p>
            </form>                                
        </div>
     </div><!--Abre area de contato-->
     <!--Abre area de contato-->
     <div class="col-sm-12">
        <div class="panel-footer" style="background: none;">
            <h6 class="text-danger text-center">
                Desenvolvido por Mateus&trade; 2022.
                <br>
                <a href="www...."><!--coloca o github ou qualquer site que mostre quem q desenvolvel-->
            </h6>
        </div>
     </div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>