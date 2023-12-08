<?php
include("../innc/database.php");

if (isset($_POST["send"])) {
    session_start();
    $fkID = $_SESSION["UserID"];
    $complaint = $_POST["complaint"];
    $query = "INSERT INTO complaint (fk_m_id,complaintDetails) VALUES('$fkID','$complaint')";
    mysqli_query($conn, $query);
    echo "
<script> alert('Data Insert succsfully); </script>
";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint</title>
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
                    <i class="fa-solid fa-circle-exclamation"></i>
                    </div>
                    <h3>File a Complaint</h3>
                    <textarea type="text" name="" id=""></textarea>
                    <button type="submit" name="send" class="card-button">Send</button>
                </form>
            </div>
        </div>
    </section>
    <!-- <div class="container">
        <div class="card">

            <h3>File a complaint</h3>
            <form action="" method="post">
                <input type="text" name="complaint" id="">
                <button name="send">Send</button>
            </form>
        </div>
    </div> -->
</body>

</html>