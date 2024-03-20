<?php
include('dbconnect.php');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WePlan-Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
   rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link href="style.css" rel="stylesheet">
   <link href = "event.css"rel="stylesheet">
   <script>
        function redirectToFooter() {
            // Scroll to the footer
            document.getElementById('footer').scrollIntoView({ behavior: 'smooth' });
        }
    </script>
    <link rel="stylesheet" href="event.css">
  </head>
  <body>
  
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand me-auto" href="#">WePlan</a>
      
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="event.php">EVENTS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="gallery.php">GALLERY</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="#" onclick="redirectToFooter()">VISIT US</a>
    
            </li>
            
          </ul>
        </div>
      </div>
      <?php
      if(isset($_SESSION['login'])){
      ?>
      <a href="logout.php" class="login-button">LOGOUT</a>
    <?php
      }else{
    ?>
        <a href="login.php" class="login-button">USER</a>
        <a href="adminlogin.php" class="login-button">ADMIN</a>
    <?php }?>
        
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
       data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
  <!--<div class="hero-section">
  
  </div>-->
  <?php
    $query = "select * from event_list";
    $execute = mysqli_query($conn,$query);
    $check_event = mysqli_num_rows($execute)>0; 
    if($check_event){
        while($row = mysqli_fetch_assoc($execute)){
          ?>
            
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 m-5">
            <div class="col">
            <form method="POST" action="events_details.php">
                    <button type="submit" name="eventsubmit" class="btn">
                        <input type="hidden" name="result" value="<?php echo $row['event_id']; ?>">
                        <div class="card rounded-0">
                            <img src="picture/<?php echo $row['image_url']?>" alt="pic1" class="card-img-top rounded-0">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $row['event_name']?></h5>
                            </div>
                        </div>
                    </button>
                </form>
             
            </div>
        </div>
        
      
  
        <?php
        }
    }
  ?>
  
    <?php
    include("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>