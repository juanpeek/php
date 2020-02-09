<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once ("conn.php");

$conn = OpenCon();
$conn->query("set names utf8");
$iduser = $_SESSION["iduser"];
$iduser = $_SESSION["iduser"];
$stmt = $conn->prepare("SELECT users.iduser, users.name, users.nick FROM contacts JOIN users ON users.iduser=contacts.idcontact WHERE contacts.iduser=:iduser ");
$stmt->bindParam(':iduser', $iduser);
$stmt->execute();
//$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
echo "<h2 class='display-4 border-bottom text-center mt-5' style='font-size: 25px'>Contactos</h2>";
while($row = $stmt->fetch()){
    //echo $row["iduser"];
    $messages = "messages.php?iduser=".$row["iduser"];
    echo "<a href='$messages'>".$row["nick"]."</a>";
    //echo $row["nick"];
    echo "<br>";
}

CloseCon();