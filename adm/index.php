<?php
// incluindo o sistema de autenticação

include ('../config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SYS_NAME;?></title>
</head>
<body>
    <?php
    
        include ('menu_adm.php');
        include ('adm_options.php'); 
    ?>


</body>
</html>
