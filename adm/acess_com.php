<?php
//a sessão será iniciada a cada página diferente
// determinar o nivel de acesso, se necessário

session_name('BlueGalaxyMusic');
// isset quer saber se esta atribuido, vai retorna se não tiver definida
if(!isset($_SESSION)){
    session_start();
}


//print_r($_SESSION); //para ver o que tem

// verifica se há usuario logado na sessão
//identifica o usuário
if(!isset($_SESSION['login_usuario'])){
    //se não existir, destruimos a sessão por segurança
    header("location: login.php");
    exit;
}

$nome_da_sessao = session_name();
//verificar o nome da sessão, recurso de segurança 
if(!isset($_SESSION['nome_da_sessao']) or ($_SESSION['nome_da_sessao']!=$nome_da_sessao)){
// se não existir, destruimos a sessão por segurança
    session_destroy();
    header("location: ../index.php");
    exit;
}
?>