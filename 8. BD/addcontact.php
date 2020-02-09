<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once ("conn.php");
session_start();

$conn = OpenCon();
$iduser = $_SESSION["iduser"];
$stmt = $conn->prepare("select * from users as u left join contacts as c on u.iduser=c.idcontact where c.iduser is null OR c.iduser!=:iduser AND u.iduser!=:iduser GROUP BY u.iduser;");
$stmt->bindParam(':iduser', $iduser);
$stmt->execute();
//$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
echo "<h2 class='display-4 border-bottom text-center mt-5' style='font-size: 25px'>Add contact</h2>";
echo "<select>";
while($row = $stmt->fetch()){
    //echo $row["iduser"];
    $messages = "messages.php?iduser=".$row["iduser"];
    echo "<option>".$row["nick"]."</option>";
    //echo $row["nick"];
}
echo "</select>";
print_r($row);
CloseCon();