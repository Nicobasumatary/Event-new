<?php
include("dbconnect.php");
session_start();
if(isset($_SESSION['signin'])){
    header("location:admin_index.php");
}
$errors = array();
if(isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("select * from admin where email = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows>0){
        $data = $stmt_result->fetch_assoc();
        if($data['password'] == $password){
            $_SESSION["signin"] = $_POST["email"];
            // Redirect to another page
            header('location:admin_index.php');
            //echo "Login Success";
            exit(); 
        } else {
            $errors[] = 'Invalid email or password';
        }
    } else {
        $errors[] = 'Invalid email or password';
    }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>
    <div class="wrapper">
        <form action="adminlogin.php" method="POST">
            <h1>Admin</h1>
            <div class="inputbox">
                <input type="text" placeholder="Email" name="email" required>
            </div>
            <div class="inputbox">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="error">
             <?php
                 if(!empty($errors)){
                    echo implode("<br>", $errors);
                 }
                ?> 
                
            </div>
            <button type="submit" class="btn" name="signin">Login</button>
                Go back to<a href="index.php">Home</a>
        </form>
    </div>
</body>
</html>