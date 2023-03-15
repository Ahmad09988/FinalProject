<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="sign-in.css" rel="stylesheet">
  </head>
  <body class="text-center">


<?php
        // Include the database configuration file
        include 'dbConfig.php';
		//$usern="ahmad1";
    


 /*   // check if user is already logged in, redirect to userpage_home.php if yes
    if (isset($_SESSION['email'])) {
        header("Location: userpage_home.php");
        exit;
    }
*/
    // check if form is submitted
    if (isset($_POST['submit'])) {
        // retrieve email and password from form submission
        //$email = $_POST['email'];
        $password = $_POST['password'];
		$usern = $_POST['username'];
		
         // prepare and execute the SQL query
        $stmt = $db->prepare("SELECT * FROM users WHERE password=? AND name=?"); //////email=? AND
        $stmt->bind_param("ss", $password, $usern); //$email, 
        $stmt->execute();
        $result = $stmt->get_result();
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_assoc($result); // fetch the data
			?>
		<script>
        alert("login successful.");
		
		</script>
    <?php
			} 
	}
		?>
		




    <main class="form-signin w-100 m-auto border border-primary bg-primary-subtle">
      <form  id="form" method="POST">
    <!--<img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
		<input type="text" class="form-control" name="username" id="username2" >
		<label for="username2">User Name</label>
	</div>
	<!--<div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>-->
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
	<div class=" d-flex justify-content-between flex-direction: column">
    <button id="loginbutton" class="w-100 btn btn-lg btn-primary" type="submit" name="submit" >Sign in</button>
	<a class="w-100 btn btn-lg btn-primary" href="Registration.php">Register</a>
	<a class="btn btn-secondry" href="welcome.php">Cancel</a>
	</div>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
  </form>
</main>


<?php
	 if (isset($_POST['submit'])) {
        // check if query is successful and if there is only one matching record
        if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_assoc($result); // fetch the data
            // store email in session variable and redirect to userpage_home.php
			echo $usern;
            header("Location: userpage_home.php");
           // exit;
        } else {
            // display error message
            $error = "Invalid email or password.";
        }
		
        // close the database connection
        mysqli_close($db);
    }
?>

    
  </body>
  <footer>
  <script src="jQuery.min.js"> </script>
  <script>
	$("#form").submit(function(e){
		//localStorage.setItem("email",$("#floatingInput").val())
		localStorage.setItem("username",$("#username2").val())
		//console.log("email",window.localStorage.getItem("email"));
		//console.write("email");
	})
	</script>
  </footer>
</html>
