<?php
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
