<?php
	require_once(__DIR__ . '/vendor/autoload.php');

	if (filter_has_var(INPUT_POST, "submit")) {
		$user = new \App\Models\User();

		$user->setName($_POST["name"]);
		$user->setSurname($_POST["surname"]);
		$user->setIdNumber($_POST["idNumber"]);
		$user->setDateOfBirth($_POST["dateOfBirth"]);

		$message = "";
		$messageClass = "";

		$userValidator = new \App\Validation\UserValidator($user);
		$isValidUser = $userValidator->validateUser();


		if (!$isValidUser) {
			$messageClass = "alert-danger";
			foreach ($userValidator->getErrors() as $err) {
				$message .= $err . "<br>";
			}
		} else {
			$userStore = new \App\UserStore();
			$recordCount = $userStore->storeUser($user);
			echo $recordCount;
			$messageClass = "alert-success";
			$message = "User info was successfuly stored!";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>User Info</title>
	<link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
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
		<?php if (isset($message) && strlen($message) > 0): ?>
		<div class="alert <?php echo $messageClass; ?>">
			<?php echo $message; ?>
		</div>
		<?php endif; ?>

		<form method="post">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" name="name" class="form-control" required
					value="<?php isset($_POST['name']) ? $_POST['name'] : ''; ?>">
			</div>

			<div class="form-group">
				<label for="surname">Surname:</label>
				<input type="text" name="surname" class="form-control" required
					value="<?php isset($_POST['surname']) ? $_POST['surname'] : ''; ?>">
			</div>

			<div class="form-group">
				<label for="idNumber">RSA ID:</label>
				<input type="text" name="idNumber" class="form-control" required
					value="<?php isset($_POST['idNumber']) ? $_POST['idNumber'] : ''; ?>">
			</div>

			<div class="form-group">
				<label for="dateOfBirth">Date of Birth:</label>
				<input type="text" id="dateOfBirth" name="dateOfBirth" class="form-control" required
					value="<?php isset($_POST['dateOfBirth']) ? $_POST['dateOfBirth'] : ''; ?>">
			</div>

			<br>
			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			<a class="btn btn-secondary" href="index.php">Cancel</a>
		</form>
	</div>
	<script>
	$("#dateOfBirth").datepicker({
		format: "dd/mm/yyyy",
		orientation: "bottom auto"
	});
	</script>
</body>
</html>

