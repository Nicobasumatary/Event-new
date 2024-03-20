<?php
include("dbconnect.php");
session_start();

// Assuming you have set $_SESSION['login'] to the email during login
?>

<?php
if(isset($_POST['book'])){
    $event_id = $_POST['event_id'];
    //echo $event_id;
    $descript = $_POST['description'];

    //$sql = "select * from events_list where event_id = ";
    if(isset($_SESSION['login'])){
        $email = $_SESSION['login']; 
        $query = "SELECT * FROM user_regis WHERE email = '$email'";
        $execute = mysqli_query($conn, $query);
        if($execute){
            $data = mysqli_fetch_assoc($execute);
            $userid = $data['u_id'];
            $user_email = $data['email'];
            $username = $data['username'];
            $phone = $data['phnno'];
        }
       
    }
    $sql = "INSERT INTO events_booking VALUES (NULL, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "iissis", $event_id, $userid, $username, $user_email, $phone, $descript);
        
        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Booking Successful";
        } 
        // Close the statement
        mysqli_stmt_close($stmt);
    }
    
}

?>
