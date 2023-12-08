
<?php  
include '../innc/database.php';
        session_start();
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registr page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="addmember.css">

</head>

<body>


    <header>
        <img src="Taibah fitness logo 3-fotor-bg-remover-2023112445113.png" class="logo">
        <nav> <a href="http://localhost/webeprojectfinal-main/Admin/adminServices.html">AdminServices </a>
            <a href="">programs</a>
            <a href="">about us</a>
        </nav>
    </header>

    
       
      
    

        



    
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md12">
                <?php include('message.php'); ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Add User</h4>
                    </div>
                    <div class="card-body">
                    <form action="code.php" method="POST" id="addUserForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">

                                <input type="text" name="fullname" placeholder="First Name" class="form-control" required>

                                </div>
                                <div class="col-md-6 mb-3">

                                <input type="email" name="email" placeholder="Email" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">

                                    <input type="text" name="password" placeholder="Password" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">

                                <select name="package" class="form-control" required>
                                        <option value="">--Select Package--</option>
                                        <option value="basic">Basic</option>
                                        <option value="pro">Pro</option>
                                        <option value="ultra">Ultra</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
                                </div>

                            </div>
                        </form>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>