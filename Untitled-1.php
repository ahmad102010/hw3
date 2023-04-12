<!DOCTYPE html>
<html>

<head>
	<title>Sign Up Form</title>
</head>

<body>

	<h2>Sign Up</h2>

	<form action="Untitled-1.php" method="post" enctype="multipart/form-data">

		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required><br><br>

		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required><br><br>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password" minlength="6" required><br><br>

		<label for="gender">Gender:</label>
		<select id="gender" name="gender">
			<option value="male">Male</option>
			<option value="female">Female</option>
			<option value="other">Other</option>
		</select><br><br>

		<label for="image">Image:</label>
		<input type="file" id="image" name="image" accept="image/*" required><br><br>

		<label for="remember">Remember Me:</label>
		<input type="checkbox" id="remember" name="remember"><br><br>

		<input type="submit" value="Submit">

	</form>

</body>

</html>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hw5";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

function validateName($name)
{
	return preg_match('/^[A-Za-z -]/', $name);
}

function validateEmail($email)
{
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$gender = $_POST["gender"];
	$rememberMe = isset($_POST["remember-me"]);

	$nameValid = validateName($name);
	$emailValid = validateEmail($email);

	
	$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

	$stmt = $conn->prepare("INSERT INTO mydb(name, email, password, gender) VALUES ('$name','$email','$password','$gender')");
	$stmt->execute();

	$stmt->close();
	$conn->close();

	echo "Sign-up successful!";
}
?>