<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css">
    <title>Carousel</title>
</head>
<body>
    <div id="banners" class="carousel slide" data-ride="carousel">
        <!--indicador do item-->
        <ol class="carousel-indicators">
            <li data-target="banners" data-slide-to="0" class="active" ></li>
            <li data-target="banners" data-slide-to="1"></li>
            <li data-target="banners" data-slide-to="2"></li>
        </ol>
        <!--imagens 1400-600-->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="imagens/guitarra_banner.jpg" alt="" class="center-block img-rounded" style="height: 30em">
            </div>
            <div class="item">
                <img src="imagens/bateria_dw.jpg" alt="" class="center-block img-rounded" style="height: 30em">
            </div>
            <div class="item">
                <img src="imagens/guitarra_banner2.jpg" alt="" class="center-block img-rounded" style="height: 30em">
            </div>
        </div>
        <a href="#banners" class="left carousel-control" role="button" data-side="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a href="#banners" class="right carousel-control" role="button" data-side="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a>

    </div>

</body>
</html>