<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
   rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link href="style.css" rel="stylesheet">
   <script>
        function redirectToFooter() {
            // Scroll to the footer
            document.getElementById('footer').scrollIntoView({ behavior: 'smooth' });
        }
    </script>
</head>
<body>
  <!--Navbar-->
    <?php
    include("header.php");
    ?>
<!--End-->


<div class="card text-center">
  <div class="card-header">
  </div>
  <div class="card-body">
    <p class="card-text fs-5">At WePlan, we specialize in bringing your vision to life, one event at a time. Whether you're planning a corporate gala, a wedding celebration, a community fundraiser, or any other special occasion, our team is here to turn your dreams into reality.
                    With our meticulous attention to detail and unwavering commitment to excellence, we take the stress out of event planning so you can focus on creating lasting memories with your guests. From concept development to execution, we handle every aspect of your event with professionalism and creativity.
                    No event is too big or too small for us to handle. Our dedicated team of experts works tirelessly to ensure that every event we manage exceeds expectations and leaves a lasting impression. We pride ourselves on our ability to seamlessly blend innovation with tradition, ensuring that your event is both timeless and unique.
                    So whether you're planning an intimate gathering or a grand affair, let WePlan be your trusted partner in creating an unforgettable experience. Contact us today to start planning your next event!
                </p>
    
    
  </div>
  <?php
  include('footer.php');
  ?>
<!--Script-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>