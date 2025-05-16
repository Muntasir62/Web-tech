
<?php
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$year = $_POST['dob'];
$country = $_POST['country'];

$gender = $_POST['gender'];
$color = $_POST['color'];
$opinion = $_POST['opinion'];
if (isset($_POST['submit']))

{
   echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
     echo "   <meta charset='UTF-8'>";
     echo "   <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
     echo "   <title>Document</title>";
     echo "<link rel='stylesheet' href='process.css'>";
     
    echo "</head>";
    echo "<body>";
   echo " <div class='container'>";

    echo "<div class='info'>";
    echo"<h4> Hello   " .$fullname ."<br> </h4>" ;
    echo "<h4> Email   : " .$email ."<br> </h4>";
    echo "<h4> Birth Year  : " .$year ."<br> </h4>";
    echo "<h4> Country  : " .$country ."<br> </h4>";
    
    echo "<h4> Gender  : " .$gender ."<br> </h4>";
    echo "<h4> Color  : " .$color ."<br> </h4>";
    echo "<h4> Opinion  : " .$opinion ."<br> </h4>"; 
    echo "</div>";
    echo "<div class='buttons'>";
   echo " <button class='c_btn'> Confirm </button> <br>"; 
   echo "<a href='lab1.html'>  <button class='b_btn'> Back </button> </a>";
   echo " </div>";

   echo " </div>";
   
    

    echo "</body>";
    echo "</html>";
  

    

}
?>

