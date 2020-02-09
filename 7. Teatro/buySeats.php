<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_REQUEST["ids"])) {
    $idSesion = $_REQUEST["idSesion"];
    require_once("conn.php");
    $conn = OpenCon();
    $stmt = $conn->prepare("INSERT INTO teatro_entradas (idSesion, fila, columna)
    VALUES (:idSesion, :fila, :columna)");
    $stmt->bindParam(':idSesion', $idSesion);
    $seats = $_REQUEST['ids'];
    $conn->beginTransaction();

    //print_r($seats);
    for ($i = 0; $i < sizeof($seats); $i++) {
        $posicion = explode("-", $seats[$i]);
        //echo $posicion[0];
        //echo $posicion[1];
        $stmt->bindParam(':fila', $posicion[0]);
        $stmt->bindParam(':columna', $posicion[1]);
        //$stmt->debugDumpParams();
        $stmt->execute();
    }
    $conn->commit();
    CloseCon();
?>
    <!doctype html>
    <html lang="en">
    <head>
        <link  type="text/css" href="bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css" type="text/css">
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    <div class="container">
        <div class='row col-12 justify-content-center align-self-center pt-5'>
            <div class='col-12 text-center mb-3'>
                <h2>Entradas Compradas correctamente</h2>
            </div>
            <div class='col-12 text-center mb-3'>
                <a href="index.php">Volver al index</a>
            </div>
        </div>
    </div>
    </body>
    </html>
<?php
}else{
?>
    <!doctype html>
    <html lang="en">
    <head>
        <link  type="text/css" href="bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css" type="text/css">
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <div class="container">
            <div class='row col-12 justify-content-center align-self-center pt-5'>
                <div class='col-12 text-center mb-3'>
                    <h2>No ha sido escogido ningún asiento</h2>
                </div>
                <div class='col-12 text-center mb-3'>
                    <a href="index.php">Volver al index</a>
                </div>
            </div>
        </div>
    </body>
    </html>
<?php

}
?>
