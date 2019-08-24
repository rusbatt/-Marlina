<?php 
session_start();
session_destroy();
setcookie('login', '', time() -5);
setcookie('password', '', time() -5);
header('Location: http://marlin/admin.php');
exit;?>