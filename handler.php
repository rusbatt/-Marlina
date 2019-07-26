<?php 
    //подкл к БД
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=bd_marlin;charset=utf8;', 'root', 'OtsbSslgEEMCovEj');

    //имя таблицы в ложили в переменную $db_table
    $db_table = "users";

    //каждый гет запрос вложили в переменные
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    if ($name == true and $mail == true and $pass == true) {
        //с помощью Sql запросза добавили пользователя в БД 
        $pdo->query("INSERT INTO ".$db_table." (`id`, `Username`, `Email`, `password`) VALUES (NULL, '$name', '$mail', '$pass')");

        $nameFile = $_FILES['imag']['name'];
        $tmp_name = $_FILES['imag']['tmp_name'];

        move_uploaded_file($tmp_name, 'uploads/' . uniqid() . $nameFile);



        //переходим на index.php
        header('Location: http://marlin/index.php');
    } else {
        echo "не все поля заполнены";
    }

