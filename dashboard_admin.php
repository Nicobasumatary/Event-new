<?php
session_start();
?>
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
                        <h5>DASHBOARD</h5>
                        <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-4">USERS</h3>
                                <?php
                                //Shows total number of users
                                $dash_users = "SELECT * FROM user_regis";
                                $dash_query_run = mysqli_query($conn,$dash_users);
                                if($users_total = mysqli_num_rows($dash_query_run)){
                                    echo '<p class="fs-5">'.$users_total.'</p>';
                                }
                                
                                ?>
                                
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                            <h3 class="fs-4">BOOKINGS</h3>
                            <?php
                            //Shows total number of bookings
                                 $dash_books = "SELECT * FROM events_booking";
                                 $dash_query_run = mysqli_query($conn,$dash_books);
                                 if($bookings_total = mysqli_num_rows($dash_query_run)){
                                     echo '<p class="fs-5">'.$bookings_total.'</p>';
                                 }
                                
                                ?>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                            <h3 class="fs-4">EVENTS</h3>
                            <?php
                            //Shows total number of events

                                $dash_events = "SELECT * FROM events_list";
                                $dash_query_run = mysqli_query($conn,$dash_events);
                                if($events_total = mysqli_num_rows($dash_query_run)){
                                    echo '<p class="fs-5">'.$events_total.'</p>';
                                }
                                
                                ?>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-4">GALLERY</h3>
                                <p class="fs-5">Numbers</p>
                            </div>
                            
                        </div>
                    </div>

                </div>
     
                </div>
            

                        
                
     
            </div>
                </div>   
     
            </div>
            
                        
                           
                </div>   

            
            </div>
        </div>       
    </div>    
</div>