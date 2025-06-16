<?php
session_start();


if(isset($_POST['login_submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = mysqli_connect("localhost", "root", "", "aqi");

     if (!$conn) {
        echo "Connection failed: ". mysqli_connect_error();
    }
        $sql = "SELECT * FROM user WHERE Email = '$email' AND Password = '$password'";
        $result = mysqli_query($conn, $sql);
         $count = mysqli_num_rows($result);
          if ($count == 1) {
        
        $_SESSION['loggedin'] = true;
        $_SESSION['user_email'] = $email;
            echo "You Are Now Redirected...";
        header("refresh: 2; url = request.php"); 
        exit();

}
 else 
 {
       
        echo "<!DOCTYPE html>";
        echo "<html lang='en'>";
        echo "<head>";
        echo "   <meta charset='UTF-8'>";
        echo "   <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "   <title>Login Failed</title>";
        echo "<link rel='stylesheet' href='Process.css'>"; 
        echo "</head>";
        echo "<body>";
        echo " <div class='container'>";
        echo "<h2>Login Failed</h2>";
        echo "<p>Invalid email or password. Please try again.</p>";
        
        echo " </div>";
        echo "</body>";
        echo "</html>";
        header("refresh: 5; url = lab1.php"); 
        exit();
    }
    mysqli_close($conn); 
} 
 else {
    
    echo "Fill the email and password." . "<br>";
    
    header("refresh: 2; url = lab1.php");
    
    exit();
   
}

?>