<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once ("searchTheatres.php");
if (isset($stmt)) {
    echo "<div class='row justify-content-center align-self-center pt-5'>";
    echo "<div class='col-12 text-center mb-5'><h1>Theatre exercise</h1></div>";
    while($result = $stmt->fetch(PDO::FETCH_OBJ)){
        echo "<div class='col-3 text-center mx-auto'>";
        echo "<a href='theatreSessions.php?idTeatro=$result->idTeatro&nombreTeatro=$result->teatro'>";
        echo "<img class='rounded-top' src='img/$result->imagen' width='100%' height='150px'>";
        echo "<h4>$result->teatro</h4>";
        echo "</a>";
        echo "</div>";
    }
    echo "</div>";
}
?>