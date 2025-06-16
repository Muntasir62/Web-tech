<div class="header_btn">
   <a href='profile.php' class='showaqi_profile_btn'> Profile </a>
 
 <a href="showaqi.php?logout=true" class="showaqi_logout_btn">Logout</a>
</div>
<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
   header("refresh: 0; url = lab1.php");
    exit();
}
if (isset($_GET['logout'])) {
    
    session_unset();
    session_destroy();
    session_start();
   
    
    session_regenerate_id(true);
    header("refresh: 0; url = lab1.php");
    exit();
}
$user_bgcolor = 'silver';
if (isset($_COOKIE['user_bgcolor']) && !empty($_COOKIE['user_bgcolor']))
{
  $user_bgcolor = htmlspecialchars($_COOKIE['user_bgcolor']);
}
echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "   <meta charset='UTF-8'>";
echo "   <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "   <title>Selected Cities AQI</title>";
echo "<link rel='stylesheet' href='Showaqi.css'>"; 


echo "<style>";
echo "body { background-color: " . $user_bgcolor . "; }";
echo "</style>";

echo "</head>";
echo "<body>";

 
if (isset($_POST['cities']) && !empty($_POST['cities']))
{
  $_SESSION['selected_cities'] = $_POST['cities'];
}
  
if (isset($_SESSION['selected_cities']) && !empty($_SESSION['selected_cities']))
{
     $con = mysqli_connect("localhost", "root", "", "AQI");
     

$selected_cities = $_SESSION['selected_cities'];
$placeholders = implode("','", $selected_cities);
$sql = "SELECT city, country, aqi FROM info WHERE city IN ('$placeholders')";
$obj = mysqli_query($con, $sql);

 echo "<h2> Selected Cities And Their AQI </h2>";
 echo "<table>";
 echo "<tr> <th> City </th> <th> Country </th> <th> AQI </th></tr>";
 $num_rows = mysqli_num_rows($obj);
 if ($num_rows > 0)
 {
    while ($entry = mysqli_fetch_assoc($obj))
    {
        echo "<tr>";
        echo "<td>". htmlspecialchars($entry['city']). "</td>";
        echo "<td>" . htmlspecialchars($entry['country']) . "</td>";
        echo "<td>" . htmlspecialchars($entry['aqi']) . "</td>";
        echo "</tr>";
    }
}

    else
    {
        echo "  No results found";
    }
  
 
 echo "  </table>";

 

 
}

  mysqli_free_result($obj);
    
   


 


mysqli_close($con);
unset($_SESSION['selected_cities']);
echo "</body>";
echo "</html>";
?>
