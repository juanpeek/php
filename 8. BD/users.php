<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("conn.php");
$conn = OpenCon();
if(isset($_REQUEST["user"]) && isset($_REQUEST["pass"])){
    $user = $_REQUEST["user"];
    $pass = $_REQUEST["pass"];

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM users WHERE nick=:user AND password=:pass");
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':pass', $pass);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //print_r($result);
        $contarcol = $stmt->rowCount();
        if($contarcol == 1){
            session_start();
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                $_SESSION["iduser"]=$result["iduser"];
                $_SESSION["nick"]=$result["nick"];
                $_SESSION["name"]=$result["name"];
            }
            //echo $result["iduser"]." ".$result["name"]." ".$result["nick"];
            //echo $_SESSION["iduser"]." ".$_SESSION["name"]." ".$_SESSION["nick"];
            header("Location: agenda.php");
        }else{
            header("Location: index.php?error=loginerror");
        }

    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
CloseCon();
?>