<?php 
include ("../innc/database.php");


if(isset($_POST["submit"])) {
   session_start();
$class = $_POST["co"];
$date = $_POST["date"];
$fkID = $_SESSION["UserID"];
$query = "INSERT INTO classes(fk_m_id,classInfo,classDate) VALUES('$fkID','$class','$date')";
mysqli_query($conn,$query);
echo "
    <script> alert('Data inserted succesfully');  </script>
    ";
    
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Admin/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
     <link rel="stylesheet" href="../header.css"> 
    
</head>

<body>
<header>
        <img src="../Admin/Taibah fitness logo 3-fotor-bg-remover-2023112445113.png" class="logo">
        <?php
        
        session_start();
        $fkID = $_SESSION["userID"];
        $Query = "SELECT fullname FROM members WHERE id='$fkID'";
        $result1 = mysqli_query($conn, $Query);
        $r = mysqli_fetch_assoc($result1);
        $_SESSION["userName"] = $r['fullname'];
        $fullName = $_SESSION["userName"];
        if (!empty($fkID)) {
            echo "
<div><h4> Welcome $fullName</h4></div>
";
        }
        ?>
        <nav>
            <a href="http://localhost/webeprojectfinal-main/Services/userServices.php">UserServices</a>
            <a href="#programs">Programs</a>
            <a href="#aboutus">About us</a>
        </nav>
    </header>
    <Section class="services">
    <div class="container">
    <div class="card">
        <form action="" method="post">
            <div>
            <i class="fa-regular fa-calendar-plus"></i>
            </div>
        <h3>Select Session</h3>
        
            <select name="co"  class="form-control" required >
                <option value="" selected hidden>--Sessions--</option>
                <option value="Fitness Session 8AM">Fitness Session 8AM</option>
                <option value="Build Body 1PM">Build Body 1PM</option>
                <option value="Swimming Session 4PM">Swimming Session 4PM</option>
            </select>
             <input type="date" name="date"  class="" required> 
        <button type="submit" name="submit" class="card-button" >Book</button>
 </form>
 </div>
</div>
</section>

       
 
        

    </Section>
</body>

</html>