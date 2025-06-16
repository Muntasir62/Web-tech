<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("refresh: 1; url = lab1.php");
    exit();
}

$con = mysqli_connect("localhost", "root", "", "AQI");
if (!$con) { 
    echo "Connection failed: ". mysqli_connect_error(); 
}

$logged_in_email = $_SESSION['user_email'];
$sql = "SELECT `name`, email, `year of birth`, country, gender 
        FROM user 
        WHERE Email = '$logged_in_email'";

$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    $user_data = mysqli_fetch_assoc($result);
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    
    <link rel="stylesheet" href="profile.css"> 
</head>
<body>
    <div class="profile-container">
        <h4>User Profile Information</h4>
        
            <table class="profile-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Year of Birth</th>
                        <th>Country</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($user_data['name']); ?></td>
                        <td><?php echo htmlspecialchars($user_data['email']); ?></td>
                        <td><?php echo htmlspecialchars($user_data['year of birth']); ?></td>
                        <td><?php echo htmlspecialchars($user_data['country']); ?></td>
                        <td><?php echo htmlspecialchars($user_data['gender'] ); ?></td>
                    </tr>
                </tbody>
            </table>
        
        <a href="request.php" class="back-button">Back to City Selection</a>
    </div>
</body>
</html>