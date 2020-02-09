<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Agenda</title>
</head>
<body>
<div class="container">
    <button type="button" class=" mt-3 float-right btn btn-sm btn-primary" onclick="location.href='logout.php';">Log Out</button>
    <div class="row">
        <div class="col-12 text-center">
            <?php echo "<h1 class='display-4'>Welcome ".$_SESSION["nick"]."</h1>"?>
        </div>
        <div class="col-6 mx-auto">
            <?php
                require_once ("contacts.php");
                if(isset($result)){

                }
            ?>
        </div>
        <div class="col-12 mx-auto">
            <button class="btn btn-primary" onclick="location.href='addcontact.php';">Add contact</button>
        </div>
    </div>
    <div class="row">
        <div class="">

        </div>
    </div>
</div>
</body>
</html>

