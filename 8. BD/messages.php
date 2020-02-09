<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once ("conn.php");
session_start();

if(isset($_REQUEST["submit"])){
    $conn = OpenCon();
    $idcontact = $_REQUEST["iduser"];
    $iduser = $_SESSION["iduser"];
    $date = date("Y/m/d");
    $time = date("h:i:s");
    $subject = $_REQUEST["subject"];
    $body = $_REQUEST["body"];


    $stmt = $conn->prepare('INSERT INTO messages (refsender, refrecipient, date, time, subject, body) 
    VALUES (:rsender, :rrecipient, :date, :time, :subject, :body)');

    $stmt->bindParam(':rsender', $iduser);
    $stmt->bindParam(':rrecipient', $idcontact);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':time', $time);
    $stmt->bindParam(':subject', $subject);
    $stmt->bindParam(':body', $body);
    $stmt->execute();

    CloseCon();
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
    <title>Messages</title>
</head>
<body>
    <div class="container">
        <button type="button" class=" mt-3 float-right btn btn-sm btn-primary" onclick="location.href='logout.php';">Log Out</button>
        <div class="row">
            <div class="col-12 text-center display-4">Messages</div>
            <div class="col-12">
                <div class="col-6 mx-auto mt-4">
                    <form action="<?php $_SERVER["PHP_SELF"]?>" class="form-group" method="POST">
                        Subject: <input type="text" class="form-control" name="subject" required>
                        Body: <textarea type="text-area" class="form-control md-textarea" rows="4" name="body" required></textarea>
                        <div class="col-6 text-center mx-auto mt-3">
                            <button class="btn btn-primary" id="submit" name="submit">Submit</button><br>
                            <button class="btn btn-dark mt-2" onclick="location.href='index.php';">Go to Index</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
