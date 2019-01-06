<?php

include_once 'header.php';
?>
<body style="background-image:url(photo/.gif)">
    
</body>
<section class="main-container">
<div class="main-wrapper">
    <h2>Sign Up</h2>
    <form  class="signup-form" action="includes/signup.inc.php" method="POST">
    <input type="text" name="first" placeholder="Firstname">
    <?php  
    if(isset($_GET["signup"])){
        $sgn = $_GET["signup"];
        if($sgn == "nameEmpty"){
            echo "First Name can not be empty";
        }   elseif($sgn == "nameInvalid"){
            echo "Please input valid characters";
        } 
    }

    
    ?>

<br>
    <input type="text" name="last" placeholder="Lastname">
<?php  
    if(isset($_GET["signup"])){
        $sgn = $_GET["signup"];
        if($sgn == "lastEmpty"){
            echo "Last Name can not be empty";
        }   elseif($sgn == "lastInvalid"){
            echo "Please input valid characters";
        } 
    }

    
    ?>

    <br>
    <input type="text" name="email" placeholder="E-mail">
    <?php  
    if(isset($_GET["signup"])){
        $sgn = $_GET["signup"];
        if($sgn == "emailEmpty"){
            echo "Email can not be empty";
        } elseif($sgn == "emailInvalid"){
            echo"Please Insert a correct email";
        }
    }
    ?>
    <br>
    <input type="text" name="uid" placeholder="Username">
    <?php  
    if(isset($_GET["signup"])){
        $sgn = $_GET["signup"];
        if($sgn == "uidEmpty"){
            echo "UserName can not be empty";
        } elseif($sgn == "uidInvalid"){
            echo"Please insert a correct username";
        }
    }
    ?>
    <br>
    <input type="password" name="pwd" placeholder="Password">
    <?php  
    if(isset($_GET["signup"])){
        $sgn = $_GET["signup"];
        if($sgn == "pwdEmpty"){
            echo "Password can not be empty";
        } else if($sgn =="pwdInvalid"){
            echo"Insert a correct carachters";
        }
    }
    ?>
    <br><br><br>
        <button type="submit" name="submit">Sign Up</button>    


    </form>

</div>
</section>

<?php

include_once 'footer.php';
?>