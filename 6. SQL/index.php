<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(isset($_SESSION['username'])){
    header("Location: news.php");
}
?>

<html>
<head>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
    .container {
        padding-top: 10%;
    }
    h1 {
        text-align: center;
    }
    p {
        font-style: italic;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="col-6 mx-auto">
            <h1>Ej1 - PHP</h1>
        </div>
        <div class="col-6 mx-auto">
            <form action="users.php" method="post">
                <div class="form-group">
                    <label for="user">User</label>
                    <input type="text" class="form-control" name="user" id="user" required placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <!--<label class="form-check-label"><input type="checkbox"> Remember me</label>-->
                </div>
                <button type="submit" class="btn btn-primary col-12">Sign in</button>
            </form>
        </div>
        <div class="col-6 mx-auto">
            <p>Users: antonio/anUHW1iEm4Pic  - alumno/alfPL7x/DpT7Y  </p>
            <?php
            if(isset($_GET["msj"])){
                echo "<div class='alert alert-danger text-center' role='alert'>$_GET[msj]</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>
