<?php
session_start();
 if (count($_POST['cities']) != 10) {
        echo "  Error: You must select exactly 10 cities. <a href='request.php'>Go back</a>";
 }
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
    
   
unset($_SESSION['selected_cities']);
 
session_destroy();

mysqli_close($con);
?>
<link rel="stylesheet" href="showaqi.css">