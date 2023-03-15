<!doctype html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>HotelsAndRooms</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="bookform.css" rel="stylesheet">
	<?php
	// Include the database configuration file
      include 'dbConfig.php';
	  $statusMsg = "Please select a file to upload.";

	?>

    

<link href="../bootstrap-4.0.0/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="sidebars.css" rel="stylesheet">
  </head>
  <body>
<?php
// handle the booking process when the Book Now button is clicked
if(isset($_POST['book_room'])) {
  $room_id = mysqli_real_escape_string($db, $_POST['room_id']);
  $user_name = mysqli_real_escape_string($db, $_POST['user_name']);

  // update the room record in the database
  $sql = "UPDATE rooms SET booked='booked', user_name='$user_name' WHERE id=$room_id";
  $result = mysqli_query($db, $sql);

  if($result) {
    // display a success message
    echo "Room is booked!";
  }
}
?>



<?php
        // Include the database configuration file
        include 'dbConfig.php';
		$usern = '<span type="text" name="username" id="usernamelabel" ></span>';
		// prepare and execute the SQL query
        $stmt = $db->prepare("SELECT * FROM users WHERE name=?"); //////email=? AND
        $stmt->bind_param("s", $usern); //$email, 
        $stmt->execute();
        $result = $stmt->get_result();
		{
		$row = mysqli_fetch_assoc($result); // fetch the data
		if(isset($row))  $usert = $row['name'];		
		}
?>


<main class="d-flex flex-nowrap" style="overflow-y: auto;">

  <section class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; postions:fixed; ">
    <a  class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> <!--href=""-->
      <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <strong><span  class="text-align-center" style="font-family: Brush Script MT, Times, serif; font-style: italic; color:white; text-shadow: 2px 2px red; font-size: 40px;" > H&R </span></strong>
	  
    </a>
	
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li >
		
        <a href="userpage_home.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="userpage_home.php"/></svg>
          Home
        </a>
      </li>
      <li>
        <a href="userpage_Rooms.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Rooms
        </a>
      </li>
      <li>
        <a href="user_Reservations.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Reservations
        </a>
      </li>
            <!--IF manager THEN SEE THIS-->
		<?php 
		if ($usert== "manager"){
		?>
	  <li>
        <a href="Myhotel.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Myhotel
        </a>
      </li>
	  	  <?php 
		}
	  ?>
	  
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="" alt="" width="32" height="32" class="rounded-circle me-2"> <!--for prfile image later-->
        <?php
	echo '<span type="text" name="username" id="usernamelabel" ></span>';
		?>
		
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
  <li><a class="dropdown-item" href="#">Settings</a></li>
  <li><a class="dropdown-item" href="#">Profile</a></li>
  <li><hr class="dropdown-divider"></li>
  <li><a class="dropdown-item" href="welcome.php" id="logout">Sign out</a></li>
</ul>


    </div>
  
  </section>

  <div class="b-example-divider b-example-vr"></div>
		
 <section class="text-center container-fluid" style="overflow-y: auto">
 
    <div class="container">
        <h1>Add Your hotel Rooms</h1>
		<div class="book">
        <form class= "book-form"action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-item">
                <label for="location">Location:</label>
                <select class="form-control" id="location" name="location" required>
				 <option value="">Choose Location</option>
                    <option value="USA">USA</option>
                    <option value="Canada">Canada</option>
                    <option value="UK">UK</option>
                    <!-- add more options for other countries as needed -->
                </select>
            </div>
			 <div class="form-item">
                <label for="hotel_name">Hotel Name:</label>
                <input type="text" class="form-control" id="hotel_name" name="hotel_name" required>
            </div>
            <div class="form-item">
                <label for="file">Image:</label>
                <input type="file" class="form-control-file" id="file" name="file" required>
            </div>
            <div class="form-item">
                <label for="room_type">Room Type:</label>
                <select class="form-control" id="room_type" name="room_type" required>
                    <option value="single">Single</option>
                    <option value="double">Double</option>
                </select>
            </div>
            <div class="form-item">
                <label for="description">description:</label>
                <input class="form-control" type= "text" id="description" name="description" rows="3" required>
            </div>
            <div class="form-item">
                <label for="booked">Booked:</label>
                <select class="form-control" id="booked" name="booked" value="not_booked" required>
                    <option value="not_booked">Not Booked</option>
                    <option value="booked">Booked</option>
                </select>
            </div>
            
			<button type="submit" class="btn btn-primary" name="submit" title="Please select a file to upload." onclick="showDialog()">Submit</button>
        </form>
		<div class="dialog" id="dialog" style=" display : none ">
		<!-- Display status message -->
		<p style="color:white"> <?php echo $statusMsg; ?> </p>
		<button id = "showme" style=" display : none "  onclick="hideDialog()">Close</button>
	</div>
		</div>
	</div>
	

	<script>
		function showDialog() {
			document.getElementById("dialog").style.display = "block";
				document.getElementById("showme").style.display = "block";
		}

		function hideDialog() {
			document.getElementById("dialog").style.display = "none";
		}
	</script>

<?php

// File upload path
$targetDir = "uploads/";
$allowedExtensions = array('jpg', 'jpeg', 'png', 'gif', 'pdf');

if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    // Validate the input fields
    if (!empty($_POST['location']) && !empty($_POST['room_type']) && !empty($_POST['description']) && !empty($_POST['booked'])) {
        $hotel_name = htmlspecialchars($_POST['hotel_name']);
		$location = htmlspecialchars($_POST['location']);
        $roomType = htmlspecialchars($_POST['room_type']);
        $description = htmlspecialchars($_POST['description']);
        $booked = $_POST['booked'] == 'booked' ? 1 : 0; // Convert the Booked value to boolean
		$user_name ="";

        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        // Check if the file has a valid extension
        if (in_array(strtolower($fileExtension), $allowedExtensions)) {
            // Check if the file already exists on the server
            if (!file_exists($targetFilePath)) {
                // Create the table if not exists
                $sql = "CREATE TABLE IF NOT EXISTS ROOMS (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `hotel_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `room_type` enum('single','double') COLLATE utf8_unicode_ci NOT NULL,
    `description` text COLLATE utf8_unicode_ci NOT NULL,
    `booked` enum('not_booked','booked') COLLATE utf8_unicode_ci NOT NULL,
    `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `uploaded_on` datetime NOT NULL,
    `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
                if ($db->query($sql) === TRUE) {
                    // Upload file to server
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                        // Insert image file name into database
                        $insert = $db->prepare("INSERT INTO `rooms` (`hotel_name`, `location`, `file_name`, `room_type`, `description`, `booked`, user_name, `uploaded_on`) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
                        $insert->bind_param("sssssss", $hotel_name, $location, $fileName, $roomType, $description, $booked, $user_name);
                        if ($insert->execute()) {
                            $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                        } else {
                            $statusMsg = "File upload failed, please try again.";
                        }
                    } else {
                        $statusMsg = "Sorry, there was an error uploading your file.";
                    }
                } else {
                    $statusMsg = "Error creating table: " . $db->error;
                }
            } else {
                $statusMsg = "File already exists on the server.";
            }
        } else {
            $statusMsg = "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed to upload.";
        }
    } else {
        $statusMsg = "Please fill in all the required fields.";
    }
} else {
    $statusMsg = "Please select a file to upload.";
}


?>


  <div class="container">
	<br> <br>
    <div class="Book">
	<form class= "book-form" method="post">
	<div class="form-item">
                <label for="hotel_name1">type your Hotel Name:</label>
                <input type="text" class="form-control" id="hotel_name1" name="hotel_name1" required>
            </div>
			<button type="submit" class="btn btn-primary" name="ShowMyRooms" >Find Your Hotel Rooms</button>
	</form>
	</div>
	<?php
	if(isset($_POST["ShowMyRooms"])) {
		if(!empty($_POST["hotel_name1"])){
	?>
	<div class="row row-cols-1 row-cols-md-3 g-4">
      <?php

      // Get images from the database
		// Set default query
$query2 = $db->query("SELECT * FROM rooms ORDER BY uploaded_on DESC");

// Check for search parameters
if (isset($_POST['hotel_name1'])) {
    $hotel_name1 = isset($_POST['hotel_name1']) ? $_POST['hotel_name1'] : null;
    
    // Build query string
    $queryString = "SELECT * FROM rooms WHERE 1=1";
    
    if ($hotel_name1) {
        $queryString .= " AND hotel_name = '$hotel_name1'";
    }
    
    $queryString .= " ORDER BY uploaded_on DESC";
    
    // Execute query
    $query2 = $db->query($queryString);
}

      if($query2->num_rows > 0){
        while($row = $query2->fetch_assoc()){
          $imageURL = 'uploads/'.$row["file_name"];
      ?>
          <div class="col">
            <div class="card shadow-sm">
              <img src="<?php echo $imageURL; ?>" alt= "<?php echo $row["file_name"]; ?>" 
			  width="100%" height="225"  role="img" aria-label="Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" >
              <div class="card-body">
                <p class="card-text"><?php echo $row["location"] . ",  " . $row["hotel_name"] . " ,  " . $row["room_type"] . " Room.<br>" . $row["description"]; ?></p>

                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary">book now?</button>
                   <form method="POST" action="">
  <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
  <button type="submit" name="delete" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this image?')">Delete </button>
</form>
                  </div>
                  <small class="text-muted">"<?php echo"uploaded on: "; echo date("F j, Y", strtotime($row["uploaded_on"])); ?>"</small>
                </div>
              </div>
            </div>
          </div>
      <?php 
        }
      }else{ ?>
          <div class="col">
            <p>No image(s) found...</p>
          </div>
      <?php } ?>
    </div>
	<?php
		}else {
			echo "Please Enter Your Hotel Name.";
		}
	}
	mysqli_close($db);
	?>
 </div>
	
</section>	
</main>

	
	
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8054865819958850"
     crossorigin="anonymous" ></script>
	 
    <script src="../bootstrap-4.0.0/assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="sidebars.js"></script>
	  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
  
  <footer>
  <script src="jQuery.min.js"> </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
	 $("#logout").on("click",function(e){
		 window.localStorage.clear()
	 })
	 </script>
  <script>
	
	$(document).ready(function(){
		$("#emaillabel").text(window.localStorage.getItem("email"))
		$("#usernamelabel").text(window.localStorage.getItem("username"))
	})
	</script>
  </footer>
  
</html>
