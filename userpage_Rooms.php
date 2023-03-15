<!doctype html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=""
    <title>HotelsAndRooms</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">

    <?php
	// Include the database configuration file
      include 'dbConfig.php';
	?>

    

<<link href="../bootstrap-4.0.0/assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
	<link href="bookform.css" rel="stylesheet">
  
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
  
  <section class="py-5 text-center container">

<div class="row py-lg-5">

	<h1 class="fw-light">Find The Best Hotel For Your Holiday Now!</h1>
		<!-- Booking Form -->
	<div class="book">	
	<form class="book-form" method="post">  
		<div class="form-item">
  <label for="location">location</label>
  <select name="location" required> 
    <option value="">Select Location</option> 
    <option value="USA">USA</option> 
    <option value="UK">UK</option> 
    <option value="Canada">Canada</option> 
    <option value="Australia">Australia</option>
<!-- add more locations or make and retreiv location from data base -->	
  </select><br> 
  </div>
		<div class="form-item">
  <label for="Type_Of_Room">Type Of Room:</label>
  <select name="Type_Of_Room" required id="rooms"> 
    <option value="">Select Rooms</option> 
    <option value="single">single</option> 
    <option value="double">double</option>
	</select><br> 
  </div>
		<div class="form-item">
          <label for="rooms">Rooms: </label>
          <input type="number" min="1" value="1" id="rooms" />
        </div>
		<div class="form-item">
          <label for="adult">Family Members: </label>
          <input type="number" min="1" value="1" id="adult" />
        </div>
		<div class="form-item">
  <label for="checkin-date">Check In Date: </label>
  <input type="date" id="chekin-date" />
  </div>
		<div class="form-item">
  <label for="checkout-date">Check Out Date: </label>
  <input type="date" id="chekout-date" />
  </div>      
		<div class="form-item">
          <input type="submit" class="btn" value="Search Rooms" />
        </div>
	</form>
</div>
	
	
	<!-- end of booking form -->
		
</div>

  </section>
  
  
	
	
  <div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php
      

      // Get images from the database
		// Set default query
$query = $db->query("SELECT * FROM rooms ORDER BY uploaded_on DESC");

// Check for search parameters
if (isset($_POST['location']) || isset($_POST['Type_Of_Room'])) {
    $location = isset($_POST['location']) ? $_POST['location'] : null;
    $Type_Of_Room = isset($_POST['Type_Of_Room']) ? $_POST['Type_Of_Room'] : null;
    
    // Build query string
    $queryString = "SELECT * FROM rooms WHERE 1=1";
    
    if ($location) {
        $queryString .= " AND location = '$location'";
    }
    
    if ($Type_Of_Room) {
        $queryString .= " AND room_type = '$Type_Of_Room'";
    }
    
    $queryString .= " ORDER BY uploaded_on DESC";
    
    // Execute query
    $query = $db->query($queryString);
}

	  
      if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
          $imageURL = 'uploads/'.$row["file_name"];
      ?>
          <div class="col">
            <div class="card shadow-sm">
			
              <img src="<?php echo $imageURL; ?>" 
			  alt= "<?php echo $row["file_name"]; ?>" 
			  width="100%" height="225"  role="img" aria-label="Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" >
              <div class="card-body">
                <p class="card-text"><?php echo $row["location"] . ",  " . $row["hotel_name"] . " ,  " . $row["room_type"] . " Room.<br>" . $row["description"]; ?></p>

                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
					<!-- in your HTML form -->
					<?php 
					if ( $row["booked"] != "booked") {
					
					?>
<form method="POST">
  <input type="hidden" name="room_id" value="<?php echo $row["id"]; ?>">
  <input type="hidden" name="user_name" value="ahmadsalem" >
  <button type="submit" name="book_room">Book Now</button>
</form>
<?php
					}else {
						?>
					<button type="submit" color="gray">Booked</button>
					<?php
					}

?>

<p id="booked_message" style="display:none;"></p>

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
      <?php 
	  } 
	  $location="";
	  $Type_Of_Room="";
	  mysqli_close($db);
	  ?>
    </div>
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
