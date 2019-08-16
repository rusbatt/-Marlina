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
				<h1>Add User</h1>

			
				<form action="hendlerAdd.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Username</label>
						<input name="name" type="text" class="form-control" >
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="mail" type="email" class="form-control" >
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input name="pass" type="password" class="form-control" >
					</div>
					<div class="form-group">
						<label for="">Add file</label>
						<input name="imag" type="file">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>