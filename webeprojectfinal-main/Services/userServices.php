



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User interface</title>
    <link rel="stylesheet" href="../Admin/style.css">
    <link rel="stylesheet" href="../header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <header>
        <img src="../Admin/Taibah fitness logo 3-fotor-bg-remover-2023112445113.png" class="logo">
        <?php
        include("../innc/database.php");
        session_start();
        $fkID = $_SESSION["userID"];
        $Query = "SELECT fullname FROM members WHERE id='$fkID'";
        $result1 = mysqli_query($conn, $Query);
        $r = mysqli_fetch_assoc($result1);
        $_SESSION["userName"] = $r['fullname'];
        $fullName = $_SESSION["userName"];
        if (!empty($fkID)) {
            echo "
<div><h2> Welcome $fullName</h2></div>
";
        }
        ?>
        <nav>
            <a href="http://localhost/webeprojectfinal-main/User/index.php">Logout</a>
            <a href="#programs">Programs</a>
            <a href="#aboutus">About us</a>
            <a href= "userProfile.php"><?php 
            session_start();
            echo $_SESSION ['UserName'];
            ?></a>
        </nav>
    </header>
    <section class="services">
        <div class="container">
            <div class="card">
                <div>
                    <i class="fa-regular fa-calendar"></i>
                </div>
                <h3>Book a Training Class</h3>
                <p>From Here you can book training classes.</p>
                <button class="card-button" onclick="location.href='http://localhost/webeprojectfinal-main/Services/class.php'">Book</button>
            </div>

            <div class="card">
                <div>
                    <i class="fa-solid fa-box-archive"></i></i>
                </div>
                <h3>Subscribe in a Package</h3>
                <p>From Here you can subscribe in packages.</p>
                <button class="card-button" onclick="location.href='http://localhost/webeprojectfinal-main/services/package.php'">Subscribe</button>
            </div>

            <div class="card">
                <div>
                    <i class="fa-solid fa-circle-exclamation"></i>
                </div>
                <h3>File a complaints</h3>
                <p>From Here you can file a complaint.</p>
                <button class="card-button" onclick="location.href='http://localhost/webeprojectfinal-main/services/complaint.php'">File a complaint</button>

            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>

</html>