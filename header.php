
<?php
    session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  

<header>
<nav>
    <div class ="main-wrapper">
        <ul>

      
       <div class="scrollmenu">
       <li><a href=""></a></li>  
            <li><a href="index.php">Home</a></p></li>  
            <?php
            if (isset($_SESSION['u_id'])) {
                echo '   <li><a href="success.php">Users</a></li> 
                <li><a href="photoUp.php">Photo</a></li>  
               <li><a href="productDB.php">Product</a></li> 
               <li><a href="about.php">__About</a></li> 
                
               ';
            }  

            ?>
          
         
</div>
 </ul>    
        </ul>
        <div class="nav-login">
            <?php
            if (isset($_SESSION['u_id'])) {
                echo '<form action="includes/logout.inc.php" method="POST">
                <button type="submit" name="submit">Logout</button>
                </form>';
            } else {
               echo '<form action="includes/login.inc.php" method="POST">
               <input type="text" name="uid" placeholder="Username/e-mail">
               <input type="password" name="pwd" placeholder="password">
               <button type="submit" name="submit">Login</button>
          </form>
          <a href="signup.php">Sign Up</a>';
            }

            ?>
   
        </div>

    </div>
</nav>
</header>