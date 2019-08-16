<?php 
	 //подкл к БД
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=bd_marlin;charset=utf8;', 'root', 'OtsbSslgEEMCovEj');

    //имя таблицы в ложили в переменную $db_table
    $db_table = "users";

    
    
    //каждый ПОСТ запрос вложили в переменные
    $idLink = $_GET['id'];

   
    $resultDelete = $pdo->prepare("DELETE FROM `$db_table` WHERE `id` = :idDel");
    $resultDelete->bindParam(':idDel', $idLink);
    $resultDelete->execute();
    header('Location: http://marlin/admin.php');
    
    

    
    
	
	
  
	