<?php

include_once 'header.php';
?>

<section class="main-container">
<div class="main-wrapper">
    <h2>Wellcome to users page </h2>

    <?php
    if(isset($_SESSION['u_id'])){
        echo"You are logged in!";

    }
    ?>



<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<style type="text/css">
    table {
        border-collapse: collapse;
        width: 100%;
        color: ;
        font-family: monospace;
        font-size: 25px;
        text-align: left;
        
    }

    th {
        background-color: #e46900;
        color: white;
        padding-bottom: 22px;
    }
    tr:nth-child(even)  {background-color:#f2f2f2}

    body {
        padding-bottom: 122px;
}
</style>
</head>
<img src="http://getwallpapers.com/wallpaper/full/e/2/c/729518-guitar-black-background-2560x1440-for-android.jpg" width="100%" height="300px" style="opacity: 0.90">

<body style="background-image:url(photo/25007.jpg)">

    <table class="table table-hover table-bordered table-warning" style="opacity: 0.80">
    <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>UserName</th>
     </tr>
    
    <?php
    $conn = mysqli_connect("localhost", "root", "", "loginsystem");
    if ($conn-> connect_error) {
        die("Connection failed: $conn-> connect_error");
    }
    $sql ="SELECT user_id, user_first, user_last, user_email, user_uid from users";
    $result = $conn-> query($sql);

    if ($result-> num_rows > 0 ) {
        while ($row = $result-> fetch_assoc()) {
          echo "<tr><td>". $row["user_id"] .
          "</td><td>". $row["user_first"] .
          "</td><td>".$row["user_last"] .
          "</td><td>". $row["user_email"] .
          "</td><td>".$row["user_uid"] .
          "</td></tr>";
        }
        echo "</table>";
    }  
    else {
        echo "0 result";
    }
        $conn-> close();
    ?>
    </table>
</body>
</html>
</div>
</section>

<?php

include_once 'footer.php';
?>