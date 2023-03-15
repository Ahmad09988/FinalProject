<?php

session_start(); // start the session

//if (isset($_SESSION['name']) && isset($_SESSION['userType'])) {
  // retrieve the userType value from the session
  //$username = $_SESSION['name'];
  //$userType = $_SESSION['userType'];
  
//}
//$_SESSION['name'] = $username;
//$_SESSION['userType'] = $userType;
?>
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

    <link href="../bootstrap-4.0.0/assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="welcomstyle.css" rel="stylesheet">

    

<!--<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">-->

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
    <div class="container">
      <link rel="stylesheet" href="styles.css">
      <script type="text/javascript" src="javascrpit.js"></script>

      <!-- Full-width images with number text -->
      <?php
        // Include the database configuration file
        include 'dbConfig.php';

        // Get images from the database
        $query = $db->query("SELECT * FROM rooms ORDER BY uploaded_on DESC");

        if($query->num_rows > 0){
          $counter = 1;
          while($row = $query->fetch_assoc()){
            $imageURL = 'uploads/'.$row["file_name"];
      ?>
            <div class="mySlides">
              <div class="numbertext"><?php echo $counter; ?> / <?php echo $query->num_rows; ?></div>
              <img src="<?php echo $imageURL; ?>" style="width:50%">
            </div>

            <div class="column">
              <img class="demo cursor" src="<?php echo $imageURL; ?>" style="width:50%" onclick="currentSlide(<?php echo $counter; ?>)" alt="<?php echo $row["location"] . ",  " . $row["hotel_name"] . " ,  " . $row["room_type"] . " Room.<br>" . $row["description"]; ?> ">
            </div>

            <?php
              $counter++;
            }
          }
            ?>

      <!-- Next and previous buttons -->
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>

      <!-- Image text -->
      <div class="caption-container">
        <p id="caption">What we have for you</p>
      </div>

      <!-- Thumbnail images -->
      <div class="row">
        <?php
          // Reset counter
          $counter = 1;

          // Get images from the database again
          $query = $db->query("SELECT * FROM rooms ORDER BY uploaded_on DESC");

          if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
              $imageURL = 'uploads/'.$row["file_name"];
        ?>
              <div class="column">
                <img class="demo cursor" src="<?php echo $imageURL; ?>" style="width:50%" onclick="currentSlide(<?php echo $counter; ?>)" alt="<?php echo $row["location"] . ",  " . $row["hotel_name"] . " ,  " . $row["room_type"] . " Room.<br>" . $row["description"]; ?>">
              </div>

        <?php
              $counter++;
            }
          }
        ?>
      </div>
    </div>

    <h1 class="fw-light">Hotel's And Rooms</h1>
    <p class="lead text-muted">We made it our purpose to help you find your best stay on you'r holiday.</p>
    <p>
      <a href="userpage_Rooms.php" class="btn btn-primary my-2">Check out The Hotels Rooms</a>
    </p>
  </div>
</section>


  <div class="album py-5 bg-light text-center">
  
  <div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php
      // Include the database configuration file
      include 'dbConfig.php';

      // Get images from the database
      $query = $db->query("SELECT * FROM rooms ORDER BY uploaded_on DESC");

      if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
          $imageURL = 'uploads/'.$row["file_name"];
      ?>
          <div class="col">
            <div class="card shadow-sm">
              <img src="<?php echo $imageURL; ?>" alt= "<?php echo $row["file_name"]; ?>" 
			  width="100%" height="225"  role="img" aria-label="Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" >
              <div class="card-body">
                <p class="card-text"><?php echo $row["location"] . ",  " . $row["hotel_name"] . " ,  " . $row["room_type"] . " Room.<br>" . $row["description"]; ?></p>

                <div class="d-flex justify-content-between align-items-center">
                 
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
mysqli_close($db);	  
	  ?>
    </div>
  </div>


  </div>
	
	
	</section>
	
	
</main>

	
	
 <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8054865819958850"
     crossorigin="anonymous" ></script>
	 
    <script src="../bootstrap-4.0.0/assets/dist/js/bootstrap.bundle.min.js">

      <script src="sidebars.js"></script>
	 
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
