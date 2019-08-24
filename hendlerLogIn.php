<?php
session_start();
//подкл к БД
$pdo = new PDO('mysql:host=127.0.0.1;dbname=bd_marlin;charset=utf8;', 'root', 'OtsbSslgEEMCovEj');
//передаем данные из формы и записываем их в переменные
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$checked = $_POST['option'];




   

if ($mail == true and $pass == true) {// если поля фрмы заполнены то выполняем следующее
    // а следующее выбераем по почте и паролю из БД того пользователя, которого внесли в форму
    $sql = "SELECT * FROM `users` WHERE Email='$mail' and password='$pass'";
    $statement = $pdo->query($sql);                        
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    

   
    if ($users) {
    	$_SESSION['name'] = $mail;
    	$_SESSION['password'] = $pass;

    	if ($checked) {
    		setcookie('login', $mail, time() + 259200);
    		setcookie('password', $pass, time() + 259200);

    	}else{
    		setcookie('login', '', time() -5);
    		setcookie('password', '', time() -5);
    	}
		header('Location: http://marlin/admin.php');
		

        
    }else{// но если в БД не существут такого пользователя, то... 
        //то выводим данное сообщение и предлогаем зарегатся.
        echo "вы не зарегистрированы. Пожалуйста" . ' ' .'<a href="http://marlin/index.php">зарегитсруйтесь</a>';
    }             
        
} else {//а если поля не заполнены 
    echo "не все поля заполнены";//уведомляем об этом.
}

?>
