<?php
session_start();
session_destroy();
header("Location: http://localhost/www/projeto_integrador_2024_website/pages/index.php"); 
exit();
?>
