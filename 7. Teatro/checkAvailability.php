<?php
require_once ("conn.php");

$conn = OpenCon();

$stmt2 = $conn->query("SELECT COUNT(idSesion) FROM teatro_entradas WHERE idSesion=$result->idSesion");
$stmt2->execute();
$result2 = $stmt2->fetchAll();
print_r($result2[0][0]);
CloseCon();