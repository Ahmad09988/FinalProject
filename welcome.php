<!doctype html>
<html lang="en">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>HotelsAndRooms</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">

    

    

<link href="../newDB/bootstrap-4.0.0/assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="welcomstyle.css" rel="stylesheet">
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

    
  </head>
  <body>
    
<header>
   
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container" >
      <div > <a href="#" class="navbar-brand d-flex align-items-center " >
       
        <strong><span  class="text-align-center" style="font-family: Brush Script MT, Times, serif; font-style: italic; color:white; text-shadow: 2px 2px red; font-size: 40px;" > H&R </span></strong>
      </a>
	  </div>
	  
	</div>
  </div>

</header>

<main>

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
      <a href="login.php" class="btn btn-primary my-2">login</a>
      <a href="Registration.php" class="btn btn-primary my-2">Register</a>
    </p>
  </div>
</section>



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



</main>

<footer class="text-muted py-5">
  <div class="container">
    
	<div class="collapse bg-dark" id="navbarHeader"> 
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">HotelsAndRooms</h4>
          <p class="text-white">If you are seeking superior hotels, our website is the perfect location to begin your search. find hotel that blends current-day modernity with classic elegance. You’ll enjoy the convenience of browsing diffrent hotels around the world, with many featuers such as a full-service fitness center, swimming pool, large restaurant and some of best bars and lounges to celebrate and entertain in sophisticated style.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
	<div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container" >
	<p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
		About
      </button>
	</div>
  </div>
  </div>
</footer>


    <script src="../newDB/bootstrap-4.0.0/assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
