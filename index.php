<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>User Info</title>
	<link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">User Info</a>
			</div>
		</div>
	</nav>

	<div class="container">
		<form action="post">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" name="name" class="form-control">
			</div>

			<div class="form-group">
				<label for="surname">Surname:</label>
				<input type="text" name="surname" class="form-control">
			</div>

			<div class="form-group">
				<label for="idNumber">RSA ID:</label>
				<input type="text" name="idNumber" class="form-control">
			</div>

			<div class="form-group">
				<label for="dateOfBirth">Date of Birth:</label>
				<input type="text" name="dateOfBirth" class="form-control">
			</div>

			<br>
			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			<a class="btn btn-secondary" href="index.php">Cancel</a>
		</form>
	</div>
</body>
</html>

