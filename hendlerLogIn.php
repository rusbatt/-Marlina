<?php 
//подкл к БД
$pdo = new PDO('mysql:host=127.0.0.1;dbname=bd_marlin;charset=utf8;', 'root', 'OtsbSslgEEMCovEj');
//передаем данные из формы и записываем из в переменные
$mail = $_POST['mail'];
$pass = $_POST['pass'];


   

if ($mail == true and $pass == true) {// если поля фрмы заполнены то выполняем следующее
    // а следующее выбераем по почте и паролю из БД того пользователя, которого внесли в форму
    $sql = "SELECT * FROM `users` WHERE Email='$mail' and password='$pass'";
    $statement = $pdo->query($sql);                        
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    

   
    if ($users) {//и если выбраный пользователь существует, то... 
        header('Location: http://marlin/admin.php');//то пересылаем на страницу где список всех пользователей
    }else{// но если в БД не существут такого пользователя, то... 
        //то выводим данное сообщение и предлогаем зарегатся.
        echo "вы не зарегистрированы. Пожалуйста" . ' ' .'<a href="http://marlin/index.php">зарегитсруйтесь</a>';
    }             
        
} else {//а если поля не заполнены 
    echo "не все поля заполнены";//уведомляем об этом.
}

?>
