<?php
session_name('BlueGalaxyMusic');
session_start();
session_destroy();
header('location: ../index.php');
exit;

?>