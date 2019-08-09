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
			<div class="col-md-12">
				<h1>User management</h1>
				<a href="create.php" class="btn btn-success">Add User</a>				
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Username</th>
							<th>Email</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						
						<?php 
							//подключаемся к БД (создав объект)
							$pdo = new PDO('mysql:host=127.0.0.1;dbname=bd_marlin;charset=utf8;', 'root', 'OtsbSslgEEMCovEj');
							
							$sql = "SELECT * FROM `users`"; // "SELECT * FROM `users`" - это команда из языка sql, которя является значением переменной $sql и само по себе ни каких действии не производит, для этого нам нужена функция query()  
							$statement = $pdo->query($sql);	// это функция выбора таблицы как и "SELECT * FROM `users`" только в PHP.										
						 $users = $statement->fetchAll();// а эта функция fetchAll() с помощью которой мы говорим что из выбраной таблиции нам нужны все пользователи.
						 
						 

						foreach ($users as $elem):
						?>
						<tr>					
							<td><?php echo $elem['id']; ?></td>
							<td><?php echo $elem['Username']; ?></td>
							<td><?php echo $elem['Email']; ?></td>
						<td>
							<a href="edit.php<?='/?id='.$elem['id']?>" class="btn btn-warning">Edit</a>
							<a href="#" onclick="return confirm('are you sure?')" class="btn btn-danger">Delete</a>
						</td>
						</tr>
						

						<?php
							endforeach;
						?>
					
						  
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>

<!--$arrUserAll = [
								['id' => '1',
									'Username' => "Иванов",
									'Email' => "ivanv@mail.ru"
								],
								['id' => '2',
								 'Username' => "Петров", 
								 'Email' => "petr@mail.ru"
								],
								['id' => '3',
								 'Username' => "Cидоров", 
								 'Email' => "sidor@mail.ru"
								],
								['id' => '7',
								 'Username' => "омпмрп", 
								 'Email' => "pescasctrscsc@mail.ru"
								]

							];-->
