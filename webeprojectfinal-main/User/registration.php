
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
    <title>Registr page</title>
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


$sql = 'SELECT * FROM members';
$result = mysqli_query($conn,$sql);
$customers = mysqli_fetch_all($result, MYSQLI_ASSOC);

function isExisit($email,$errors) {

$conn = mysqli_connect("localhost","root","root","gms2");
$sql = 'SELECT * FROM members';
$result = mysqli_query($conn,$sql);
$customers = mysqli_fetch_all($result, MYSQLI_ASSOC);


    foreach($customers as $customer) {
        if($customer['email'] === $email) {
            return true;
        }
    }
    return false;
}



    


        $errors = [
            'firstNameErorr'=> '',
            'emailError' => '',
            'emailNotValid'=> '',
            'passwordEmpty'=> '',
            'repeatPasswordEmpty' => '',
            'passwordEqualsTheRepeat' => '',
            'passwordMoreThan8' => '',
            'EmailExisit' => '',
        ];

        

        if(isset($_POST['submit'])){

            $fullName = $_POST["fullName"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["passwordRepeat"];
            
                $sql = "INSERT INTO members(fullName, email,password) VALUES ('$fullName','$email','$password')";
              
              

                
             
                if (empty($fullName)) {
                    $errors['firstNameErorr'] = 'please enter the first Name';
                } elseif (empty($email)) {
                    $errors['emailError'] = 'please enter the email';
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['emailNotValid'] ='Email is not valid';
                } elseif (isExisit($email, $errors)) {
                    $errors['EmailExisit'] = 'Email already exists!';
                } elseif (empty($password)) {
                    $errors['passwordEmpty'] = 'please enter the password';
                } elseif (strlen($password)<8) {
                    $errors['passwordMoreThan8'] = 'Password must be at least 8 charactes long';
                } elseif (empty($passwordRepeat)) {
                    $errors['repeatPasswordEmpty'] = 'please enter the password';
                } elseif($password!==$passwordRepeat) {
                    $errors['passwordEqualsTheRepeat']='Password does not match';
                  }  else {
                        if ( mysqli_query($conn,$sql)) {
                        header('Location: http://localhost/webeprojectfinal-main/User/login.php');
                    } else {
                        echo 'Error:' . mysqli_error($conn);
                    }
                } 
            }
            
        ?>
        <form action="registration.php" method = "post">
            <div class="form-group">
                <label for="InputFullName" class="form-label"><h4>Full Name: </h4></label>
                <input type="text" class="form-control" name="fullName"id="fullName"value ="<?php echo $fullName?>" placeholder="Full Name:"> <br>
                <div  id="text2" class="form-text error"><h6><?php echo $errors['firstNameErorr']?></h6> </div>
            </div>
            <div class="form-group">
            <label for="InputEmail" class="form-label"><h4>Email: </h4></label>
                <input type="text" class="form-control" name="email"id="email"value ="<?php echo $email?>" placeholder="Email:">
                <div id="email2" class="form-text error"><h6><?php  echo $errors['emailError']?></h6> </div>
                <div id="email3" class="form-text error"><h6><?php echo $errors['emailNotValid']?></h6> </div>
                <div id="email4" class="form-text error"><h6><?php echo $errors['EmailExisit']?></h6> </div>
            </div>
            <div class="form-group">
            <label for="inputPassword" class="form-label"><h4>Password: </h4></label>
                <input type="password" class="form-control" name="password"id="password"value ="<?php echo $password?>" placeholder="Password:">
                <div id="password1" class="form-text error"><h6><?php echo $errors['passwordEmpty']?></h6> </div>
                <div id="password2" class="form-text error"><h6><?php echo $errors['passwordMoreThan8']?></h6> </div>
            </div>
            <div class="form-group">
            <label for="InputRepeatPassword" class="form-label"><h4>Repeat password: </h4></label>
                <input type="password" class="form-control" name="passwordRepeat"id="passwordRepeat"value ="<?php echo $passwordRepeat?>" placeholder="Repeat Password:">
                <div id="RepeatPassword1" class="form-text error"><h6><?php echo $errors['repeatPasswordEmpty']?></h6> </div>
                <div id="RepeatPassword2" class="form-text error"><h6><?php echo $errors['passwordEqualsTheRepeat']?></h6> </div>
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary"  name="submit" value="Register" >
            </div>
        </form>
        <div>
        <div><p>Already Registered <a href="login.php">Login Here</a></p></div>
      </div>
    </div>
</body>
</html>