<?php
					//подключаемся к БД (создав объект)
					
					$pdo = new PDO('mysql:host=127.0.0.1;dbname=bd_marlin;charset=utf8;', 'root', 'OtsbSslgEEMCovEj');
					
					$idLink = $_GET['id']; //GET запрос устанавливаем в качестве значение переменной $idLink  
					$sql = "SELECT * FROM `users` WHERE id='$idLink'"; // ВЫБЕРАЕМ ИЗ таблицы users строку ГДЕ id пользователя равен запросу методом $_GET  
					$statement = $pdo->query($sql);	// это тот же запрос только для PHP.						
					$users = $statement->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Homepage</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
					
					

						
					<?php foreach ($users as $elem): ?>
				<h1>Edit User ID <?php echo $idLink;?></h1>
				<form action="../editor.php<?='/?id='.$elem['id']?>" method="POST" enctype="multipart/form-data">
					
					<div class="form-group">
						<label for="">Username</label>
						<input type="text" name="nameEdit" class="form-control" value="<?php echo $elem['Username']; ?>">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="email" name="emailEdit"class="form-control" value="<?php echo $elem['Email']; ?>">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input name="passEdit" class="form-control" value="<?php echo $elem['password']; ?>">
					</div>
					<div class="form-group">
						<label for="">Add file</label>
						<input name="imag" type="file">
					</div>
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-warning">Submit</button>
					</div>

				</form>
				<?php endforeach;	?>
				
				
			</div>
		</div>
	</div>
</body>
</html>