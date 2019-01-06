 
 <?php

include_once 'header.php';
?>

 
 
  

<br>


<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
 
<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel ="stylesheet" type="text/css" href="stylePhoto.css">
</head>
 
<body style="background-image:url(photo/34.jpg)">

 <div id="content">
 
 
<?php
    $db = mysqli_connect("localhost", "root", "","photos");
    $sql = "SELECT * FROM images";
    $result = $row = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result)) {
        echo "<div id='img_div'>";
            echo"<button type='submit' class='dlt'>Delete</button>";
            echo "<p style='display: none'>".$row['id']."</p>";
            echo"<img src='photo/".$row['image']."' >";
            echo "<p>".$row['text']."</p>";
        echo "</div>";
    }
?>

 
 <?php

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $conn = mysqli_connect("localhost", "root", "","photos");
    $sql = "DELETE FROM images WHERE id=".$id;

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$connect = mysqli_connect("localhost", "root", "", "photos");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM images WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>



 <form method="POST" action="photoUp.php" enctype="multipart/form-data">
 
    <input type="hidden" name"size" value"1000000">
    <div>
 
    <div>
  	  <input type="file" name="image"> 
         
        <?php
                $error = "";
            if (isset($_FILES["image"])) {
                $allowedExts = array("jpg", "png","gif");
                $temp = explode(".", $_FILES["image"]["name"]);
                $extension = end($temp);
 
            if ($_FILES["image"]["error"] > 0) {
                $error .= "Error opening the file<br />";
                }
 
            if (!in_array($extension, $allowedExts)) {
                 $error .= "Extension not allowed<br />";
                }
            if ($_FILES["image"]["size"] > 750000) {
                $error .= "File size shoud be less than 750000 kB<br />";
                }
 
            if ($error == "") {

  
                  $msg ="xxxxxxxxxxxxxx";
    //if upload button is pressed
if (isset($_POST['upload'])) {
    //the path to store the uploaded image
           $target ="photo/".basename($_FILES['image']['name']);

    //connect with database
             $db = mysqli_connect("localhost","root", "","photos");

    //get all the submitet data from the form
          $image = $_FILES['image']['name'];
         	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

         $sqli = "INSERT INTO images (image, text) VALUES ('$image', '$image_text')";
    mysqli_query($db, $sqli); // stores the submitted data into database table : images

    // Now move uploaded image into folder images
    if (move_uploaded_file($_FILES['image']['name'], $target)) {
        $msg = "Image upload successfuly";

    }else {
        $msg ="There was a problem updating image";
    }
}




 echo "uploaded successfully";
 

 } else {
 echo $error;
 }
} 
?>
  	</div>
    
      <textarea 
      
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="Say something about this image..."></textarea>
  	</div>  
      <div>
  		<button type="submit" name="upload">Upload Image</button>
  	</div>
      </div>
 </form>
 </div>

<script>
    $(".dlt").click(function(){
        var id = $(this).next().text();
        window.location.href = "http://localhost/LoginWebsite/photoUp.php?id="+id;
    });
</script>

</body>
</html>