<?php
include('dbconnect.php');
session_start();
if(isset($_POST['eventsubmit'])){
$event_id = $_POST['result'];
$query = "select * from event_list where event_id = $event_id";
$execute = mysqli_query($conn,$query);
if($execute)
{
    $data = mysqli_fetch_assoc($execute);
}
}

// $event_id = $_GET['result'];
// $query = "select * from events_list where event_id = $event_id";
// $execute = mysqli_query($conn,$query);
// if($execute){
//     $details = mysqli_fetch_assoc($execute);
//      //echo $event_id;
//      //echo $details['description'];
    
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WePlan-Event Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
   rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link href="style.css" rel="stylesheet">
  <link rel="stylesheet" href="lando.css">
</head>
<body>
      <!--Navbar-->
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
  <div class="backdrop">
    <div class="area">
      <p>
        <?php
            if(isset($data)){
                echo $data['description'];
            }
        
        ?>
      </p>
    </div>
    <?php
    if(isset($_SESSION['login'])){?>
    <form method="POST" action="booking.php">
    <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
    <div class="form-floating">
</div>
    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="description"></textarea>
    <label for="floatingTextarea2"></label>
    <button type="submit" name="book" class="login-button">BOOK</button>
    </form>
    <?php
    }
    if(!isset($_SESSION['login'])){?>
    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="description"></textarea>
  <label for="floatingTextarea2"></label>
    <a href="login.php" class="login-button">BOOK</a>
    <?php
    }
    ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>