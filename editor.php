<?php 
	 //подкл к БД
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=bd_marlin;charset=utf8;', 'root', 'OtsbSslgEEMCovEj');

    //имя таблицы в ложили в переменную $db_table
    $db_table = "users";
    
    //каждый ПОСТ запрос вложили в переменные
    $idLink = $_GET['id'];
    
	   $nameEdit = $_POST['nameEdit'];
	   $emailEdit = $_POST['emailEdit'];
	   $passEdit = $_POST['passEdit'];
	
  
	
	if ($nameEdit == true and $emailEdit == true and $passEdit == true) {
		/*$sql = "UPDATE `users` SET `Username` = '$nameEdit', `Email` = '$emailEdit', `password` = '$passEdit' WHERE `id` = '$idLink'";
		$statement = $pdo->query($sql);*/
		$resultUpdate = $pdo->prepare("UPDATE $db_table SET `Username` = :nameEdit, `Email` = :emailEdit, `password` = :passEdit WHERE `id` = :idEdit");
		$resultUpdate->bindParam(':nameEdit', $nameEdit);
		$resultUpdate->bindParam(':emailEdit', $emailEdit);
		$resultUpdate->bindParam(':passEdit', $passEdit);
		$resultUpdate->bindParam(':idEdit', $idLink);
		$resultUpdate->execute();

		
		$nameFile = $_FILES['imag']['name'];//создаем переменную где значение это имя загруженного файла
		$tmp_name = $_FILES['imag']['tmp_name'];//создаем переменную где значение это временное хранилище файла

		move_uploaded_file($tmp_name, 'uploads/' . uniqid() . $nameFile);//функция которя из временного хранилеща передает файл в созданую нами папку uploads и присваевает имени файла уникальное имя

		header('Location: http://marlin/index.php');
	}
?>
	