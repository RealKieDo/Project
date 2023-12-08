
<!DOCTYPE html>
<html lang="en">
<head>
<style>
        h6 {
            color:red;
        }

        h4 {
            color:white;
        }
        </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="regstyle.css">
</head>
<body>
<header> <h2>Taibah fitness </h2>
    <nav> <a href="http://localhost/webeprojectfinal-main/User/index.php">Home </a> 
    <a href="">programs</a>
    <a href="">about us</a>

    </nav>
    </header>

    <section class="carsour">
        <div>
          
        </div>
    </nav>
    </header>
    <div class="container">
        <?php
        
    include '../innc/database.php';

$sql2 = 'SELECT * FROM admin';
$result2 = mysqli_query($conn,$sql2);
$adms = mysqli_fetch_all($result2, MYSQLI_ASSOC);


$sql = 'SELECT * FROM members';
$result = mysqli_query($conn,$sql);
$customers = mysqli_fetch_all($result, MYSQLI_ASSOC);





$errors = [
    'emailError' => '',
    'emailNotValid'=> '',
    'passwordEmpty'=> '',
    'passwordMoreThan8' => '',
    'incorrect' => '',
];



        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];


           if (empty($email)) {
            $errors['emailError'] = 'please enter the email';
        }  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['emailNotValid'] ='Email is not valid';
        }  elseif (empty($password)) {
            $errors['passwordEmpty'] = 'please enter the password';
        }  elseif (strlen($password)<8) {
            $errors['passwordMoreThan8'] = 'Password must be at least 8 charactes long';
        } else {

        

           foreach( $customers as $customer ) {
            if( $customer["Email"] === $email AND $customer["Password"] === $password ) {
                session_start();
                $idQuery = "SELECT id,fullname FROM members WHERE Email='$email'";
                $result1 = mysqli_query($conn, $idQuery);
                $r = mysqli_fetch_assoc($result1);
                $_SESSION['UserID'] = $r['id'];
                $_SESSION['UserName'] =$r['fullname'];
                header('Location: http://localhost/webeprojectfinal-main/Services/userServices.php');
        } 
    }   
          foreach( $adms as $admin ) {
           if( $admin["email"] === $email AND $admin["password"] === $password ) {
                  header('Location: http://localhost/webeprojectfinal-main/Admin/adminServices.html');
    } 
}   
        $errors['incorrect'] = 'the email or the password is not correct';
    
}   
    }
           
           
           
         //  require_once "database.php";
         //   $sql = "SELECT * FROM members WHERE email = '$email'";
         //   $result = mysqli_query($conn, $sql);
         //   $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
         //   if ($user) {
         //       if (password_verify($password, $user["password"])) {
         //           session_start();
         //           $_SESSION["user"] = "yes";
         //           header("Location: index.php");
         //           die();
         //       }else{
         //           echo "<div class='alert alert-danger'>Password does not match</div>";
         //       }
        //    }else{
        //        echo "<div class='alert alert-danger'>Email does not match</div>";
        //    }
        
        ?>
      <form action="login.php" method="post">
        <div class="form-group">
        <label for="InputEmail" class="form-label"><h4>Email: </h4></label>
            <input type="email" placeholder="Enter Email:" name="email"value ="<?php echo $email?>"  class="form-control">
            <div id="email2" class="form-text error"><h6><?php  echo $errors['emailError']?></h6> </div>
            <div id="email3" class="form-text error"><h6><?php echo $errors['emailNotValid']?></h6> </div>
        </div>
        <div class="form-group">
        <label for="InputPassword" class="form-label"><h4>Password:  </h4></label>
            <input type="password" placeholder="Enter Password:" name="password"value ="<?php echo $password?>"  class="form-control">
            <div id="password1" class="form-text error"><h6><?php echo $errors['passwordEmpty']?></h6> </div>
            <div id="password2" class="form-text error"><h6><?php echo $errors['passwordMoreThan8']?></h6> </div>


        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
            <div id="submt2" class="form-text error"><h6><?php echo $errors['incorrect']?></h6> </div>
        </div>
      </form>
     <div><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
    </div>
</body>
</html>