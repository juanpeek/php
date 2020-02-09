<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'conn.php';
$conn = OpenCon();

if(!isset($_SESSION["username"])){
    header("Location: index.php");
}

if(isset($_REQUEST["category"])){
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $categoria = $_REQUEST["category"];
        $stmt = $conn->prepare("SELECT * FROM noticias WHERE categoria=:categoria");
        $stmt->bindParam(":categoria",$categoria);
        //In case we dont want to bind Params and have all of it in one line
        //$stmt->execute(array(":categoria"=>$categoria));
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $count = $stmt->rowCount();
        $no_of_records_per_page = 2;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $stmt2 = $conn->prepare("SELECT * FROM noticias WHERE categoria=:categoria LIMIT $offset, $no_of_records_per_page");
        $stmt2->bindParam(":categoria",$categoria);
        $stmt2->execute();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


CloseCon();