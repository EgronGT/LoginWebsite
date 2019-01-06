 
 
 <?php

    include_once 'header.php';
 ?>

<!DOCTYPE html>
<html>
<body style="background-image:url(photo/lp21.jpg)">


<h1>Welcome!</h1>
<p><a href="https://www.linkinpark.com">Visit linkinpark.com!</a></p>
 

</body>
</html>
 
<section class="main-container">
    <div class="main-wrapper">
<br><br><br>
        <h2 >Welcome To The Home Page </h2>
        <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 
        <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 
        <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 
   
        <?php
        if(isset($_SESSION['u_id'])){
            echo"You are logged in Home Page!";

        }
        

 
       
        if(isset($_GET['login'])){
            if ($_GET['login']=="empty" || $_GET['login']=="error") {
               echo "<script>alert('Please put correct Username/Password');</script>";
        
           }else {
            echo "<script>alert('You are Connected ;)');</script>";
           }
        }



      
        if(isset($_GET['login'])){
            if ($_GET['login']=="empty") {
                echo "<script>alert('Please complete all the fields');</script>";
            }
        }



        ?>

    </div>
</section>

 
 

<?php

include_once 'footer.php';
?>
 
 
