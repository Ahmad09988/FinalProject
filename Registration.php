<!doctype html>
<html lang="en">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
	<style>
	body {
  font-family: Arial, sans-serif;
  background-color: #f5f5f5;
}

h1 {
  text-align: center;
  margin-top: 50px;
}

form {
  max-width: 500px;
  margin: 0 auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0,0,0,0.2);
}

label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

input[type="text"], input[type="email"], input[type="password"], select {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 2px solid #ddd;
  border-radius: 5px;
  font-size: 16px;
  font-family: inherit;
}

select {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image: url('data:image/svg+xml;utf8,<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M4 12h24v8H4z" fill="%23333"/><path d="M6 14v4h20v-4z" fill="%23fff"/></svg>');
  background-repeat: no-repeat;
  background-position: right 10px center;
  background-size: 15px;
  padding-right: 30px;
}

input[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #007bff;
  color: #fff;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
}

input[type="submit"]:hover {
  background-color: #0062cc;
}

.error-message {
  color: red;
  margin-top: 10px;
}

	</style>
</head>
<body>
    <h1>User Registration</h1>
    <form  method="post" action='Registration.php'>
	<?php
   $rand=rand();
   $_SESSION['rand']=$rand;
  ?>
        <label for="username">User Name:</label>
        <input type="text" name="username" id="username" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br><br>
		<div class="form-floating">
			<select class="form-select" id="userType" name="userType" value="user" required>
				<option value="user">User</option>
				<option value="manager">Manager</option>
			</select>
		<label for="userType">User Type</label>
		</div>
		<br><br>
		
		 <button type="submit" class="btn btn-primary"  name="Register" value="Register"> Register</button>
		 <a class="btn btn-primary" href="login.php">Login</a>
		 <a class="btn btn-secondry" href="welcome.php">Cancel</a>
    </form>
<script>
setsub()
{
	<?php 
	$_POST["Register"] = true;
	?>
}
</script>

	<?php
// Include the database configuration file
      include 'dbConfig.php';
	  
if (isset($_POST["Register"])) {
	
    // The "Register" button was clicked and a POST request was sent
	if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['userType'])) {
// Get form data if not empty
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$userType = $_POST['userType'];

// prepare and execute the SQL query
        $stmt = $db->prepare("SELECT * FROM Users WHERE email=? AND password=?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
		$rowmatch = mysqli_fetch_assoc($result);
		

// Define the string to check = $username $email

// Prepare the SQL query with COUNT and index
$sql = "SELECT COUNT(*) FROM my_table WHERE name = ? AND email = ?";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "ss", $username, $email);

// Execute the query
mysqli_stmt_execute($stmt);

// Fetch the result and check if the string exists
mysqli_stmt_bind_result($stmt, $db);
mysqli_stmt_fetch($stmt);

if ($count > 0) {
    // The string exists in the 'name' column of the table
    echo "Choose A Diffrent Name / Email. ";
} else {
    // The name and email does not exist in the table
    
		// Insert user data into database
		//$sql = "INSERT INTO Users (name, email, password, userType) VALUES ('$username', '$email', '$password', '$userType')";
		$insert = $db->prepare("INSERT INTO Users (name, email, password, userType) VALUES (?, ?, ?, ?)");
						$insert->bind_param("ssss", $username, $email, $password, $userType);
                        if ($insert->execute()) { 
						?>
		<script>
        alert("Registration successful.");
		
		</script>
    <?php
						
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}
}

// Close the statement and database connection
mysqli_stmt_close($stmt);
		
		}

}
mysqli_close($db);
?>



</body>
</html>
