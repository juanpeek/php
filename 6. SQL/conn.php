<?php
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "daw1920a9";
    $dbpass = "azGQf@4xqDLG3";
    $db = "daw1920a9";
    $conn = new PDO("mysql:host=$dbhost;dbname=$db", $dbuser, $dbpass);

    return $conn;
}

function CloseCon()
{
    $conn = null;
}