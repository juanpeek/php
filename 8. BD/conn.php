<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function OpenCon(){
    $host = "localhost";
    $db = "";
    $user = "";
    $pass = "";
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    return $conn;
}
function CloseCon(){
    $conn = null;
}

