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
        $resultSelect = $pdo->prepare("INSERT INTO ".$db_table." (`Username`, `Email`, `password`) VALUES (:name, :mail, :pass)");// prepare -подготовка запроса
        $resultSelect->bindParam(':name', $name); // bind_param подставляем нужные переменные
        $resultSelect->bindParam(':mail', $mail);
        $resultSelect->bindParam(':pass', $pass);

        $resultSelect->execute(); //выводим запрос 

        $nameFile = $_FILES['imag']['name'];//создаем переменную где значение это имя загруженного файла
        $tmp_name = $_FILES['imag']['tmp_name'];//создаем переменную где значеник это временное хранилище файла

        move_uploaded_file($tmp_name, 'uploads/' . uniqid() . $nameFile);//функция которя из временного хранилеща передает файл в созданую нами папку uploads и присваевает имени файла уникальное имя



        //переходим на index.php
        header('Location: http://marlin/index.php');
    } else {
        echo "не все поля заполнены";
    }

