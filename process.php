<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $year = $_POST['dob'];
    $country = $_POST['country'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $color = $_POST['color'];
    $opinion = $_POST['opinion'];

    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "   <meta charset='UTF-8'>";
    echo "   <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "   <title>Registration Process</title>";
    echo "<link rel='stylesheet' href='Process.css'>";
    echo "</head>";
    echo "<body>";
    echo " <div class='container'>";

    echo "<div class='info'>";
    echo "<h2>Registration Details</h2>";
    echo "<h4> Hello... " . htmlspecialchars($fullname) . "<br> </h4>";
    echo "<h4> Email : " . htmlspecialchars($email) . "<br> </h4>";
    echo "<h4> Birth Year : " . htmlspecialchars($year) . "<br> </h4>";
    echo "<h4> Country : " . htmlspecialchars($country) . "<br> </h4>";
    echo "<h4> Password : " . htmlspecialchars($password) . "<br> </h4>"; 
    echo "<h4> Gender : " . htmlspecialchars($gender) . "<br> </h4>";
    echo "<h4> Color : " . htmlspecialchars($color) . "<br> </h4>";
    echo "<h4> Opinion : " . htmlspecialchars($opinion) . "<br> </h4>";
    echo "<br>";
    echo "</div>";

    
    if (isset($_POST['confirm_submit'])) {
        $con = mysqli_connect("localhost", "root", "", "aqi"); 
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

       
        $sql = "INSERT INTO user (Name, Email, Password, `Year of birth`, Country, Gender) VALUES ('$fullname', '$email', '$password', '$year', '$country', '$gender')"; 

        if (mysqli_query($con, $sql)) { 
            echo " <h4>Registration Successful !</h4>";
            setcookie('user_bgcolor', $color, time()+ (86400 * 30) , "/");
            header("refresh: 2; url = lab1.php"); 
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
            header("refresh: 4; url = lab1.php"); 
            exit();
        }
        mysqli_close($con);
    }
     else if (isset($_POST['back_to_form']))
      { 
        header("refresh: 2; url = lab1.php"); 
        exit();
     }
    else {

        echo "<form method='post'>";
        
        echo "<input type='hidden' name='fullname' value='" . htmlspecialchars($fullname) . "'>";
        echo "<input type='hidden' name='email' value='" . htmlspecialchars($email) . "'>";
        echo "<input type='hidden' name='password' value='" . htmlspecialchars($password) . "'>";
        echo "<input type='hidden' name='dob' value='" . htmlspecialchars($year) . "'>";
        echo "<input type='hidden' name='country' value='" . htmlspecialchars($country) . "'>";
        echo "<input type='hidden' name='gender' value='" . htmlspecialchars($gender) . "'>";
        echo "<input type='hidden' name='color' value='" . htmlspecialchars($color) . "'>";
        echo "<input type='hidden' name='opinion' value='" . htmlspecialchars($opinion) . "'>";
      
        echo "<div class='buttons'>";
        echo "<button type='submit' name='confirm_submit' class='c_btn'>Confirm</button>"; 
        echo "<button type='submit' name='back_to_form' class='b_btn'>Back</button>"; 
        echo "</div>";
        echo "</form>";
    }

    echo " </div>"; 
    echo "</body>";
    echo "</html>";

}


?>