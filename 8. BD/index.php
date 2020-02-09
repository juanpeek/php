<?php
session_start();
if (isset($_SESSION["iduser"])){
    header("Location: agenda.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>BD Exercise</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5"><h3>Login</h3></div>
        <div class="col-6 mx-auto text-center" style="padding-top:100px">
            <form action="users.php" class="form-group">
                <div>
                    Username: <input type="text" id="user" name="user" class="form-control">
                </div>
                <div>
                    Password: <input type="text" id="user" name="pass" class="form-control">
                </div>
                <br>
                <?php
                    if(isset($_REQUEST["error"])){
                        echo "<p style='color:red'>There was an error with the login, please try again</p>";
                    }
                ?>
                <button id="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>