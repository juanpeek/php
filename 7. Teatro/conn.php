<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "";
    $dbpass = "";
    $db = "";
    $conn = new PDO("mysql:host=$dbhost;dbname=$db", $dbuser, $dbpass);

    return $conn;
}

function CloseCon()
{
    $conn = null;
}
