<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'conn.php';
$conn = OpenCon();
session_start();

// prepare and bind
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario=:usuario AND BINARY clave=:clave");
$stmt->bindParam(":usuario", $user);
$stmt->bindParam(":clave", $pass);

// set parameters and execute
$user = $_REQUEST["user"];
$pass = $_REQUEST["pass"];
$stmt->execute();
//$stmt->debugDumpParams();
if($stmt->rowCount() == 1)  //To check if the row exists
{
    //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    if($row = $stmt->fetch()) //fetching the contents of the row
    {
        $_SESSION['username'] = $row["usuario"];
        $conn = null;
        header("Location: news.php");
    }
}else{
    header("Location: index.php?msj=User or password incorrect");
}

