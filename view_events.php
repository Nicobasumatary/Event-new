<?php
include('dbconnect.php');
session_start();
$query = "select * from events_list";
$result=mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKINGS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin_header_style2.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
<div class="container-fluid p-0 d-flex h-100">
<div id="bdSidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-success text-white offcanvas-md offcanvas-start" style="width: 280px;">
            <a href="#" class="navbar-brand">
                <h5>WEPLAN<h5> <br>
                <h5>
                <?php
                if(isset($_SESSION['signin'])){
                    echo htmlentities($_SESSION['signin']);}
                ?>

                </h5>
                
            </a>
            <hr>
            <ul class="mynav nav nav-pills flex-column mb-auto">
            <li class="nav-item mb-1">
                    <a href="admin_index.php" class="">
                        DASHBOARD
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="users.php" class="">
                        USERS
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="admin_booking_list.php" class="">
                        BOOKINGS
                        <span class="notification-badge"></span>
                    </a>
                </li>
                <li class="nav-item mb-1">
    <div class="dropdown">
        <a class="nav-item dropdown-toggle" href="#" role="button" id="manageEventsDropdown" data-bs-toggle="dropdown" aria-expanded="true">
            MANAGE EVENTS
        </a>
        <ul class="dropdown-menu bg-success" aria-labelledby="manageEventsDropdown">
            <li>
                
                
                    <ul class="list-unstyled">
                        <li><a class="dropdown-item " href="view_events.php">VIEW EVENTS</a></li>
                        <li><a class="dropdown-item " href="add_events.php">ADD EVENTS</a></li>
                        
                        <!-- Add more options as needed -->
                    </ul>
                
            </li>
        </ul>
    </div>
</li>
                <li class="nav-item mb-1">
                    <a href="manage_events.php" class="">
                        MANAGE GALLERY
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="#" class="">
                        MANAGE PAGES
                    </a>
                </li>
                <?php
                if(isset($_SESSION['signin'])){
                ?>
                <li class="nav-item mb-1">
                    <a href="logout.php" class="">
                        LOGOUT
                    </a>
                <?php }?>
                </li>
            </ul>
            <hr>
            
        </div>
        <div class="bg-light flex-fill">
            <div class="p-2 d-md-none d-flex text-white bg-success">
                <a href="#" class="text-white" data-bs-toggle="offcanvas" data-bs-target="#bdSidebar">
                    <i class="fa-solid fa-bars"></i>
                </a>
                
            </div>
            <div class="p-4">
                <div class="row">
                    <div class="col">
                        <h5>EVENTS LIST</h5>
        <div class="row">
        <div class="col"> 
    <table class="table table-bordered tex-centered">
    <tr class="bg-dark text-white">
        <td>SL NO</td>
        <td>EVENT NAME</td>
        <td>EVENT DESCRIPTION</td>
        <td>EDIT</td>
        
    </tr>
    <tr>
      <?php
        $serial = 1;

        while($row = mysqli_fetch_assoc($result)){
           
            echo "
            <tr>
            <td>".$serial."</td>
            <td>".$row['event_name']."</td>
            <td>".$row['description']."</td>
            <td>
            <button class='btn btn-primary'> EDIT</button>
            <button class='btn btn-danger'> DELETE</button>
            </td>
            </tr>"     
      ?> 
        
    </tr>
    <?php
         $serial++;    
        }
        
      ?> 

</table>
                    </div>
                </div>
            </div>
            
        </div>

        
    </div>
            
        </div>
</div>
</body>
</html>