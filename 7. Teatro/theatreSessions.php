<!doctype html>
<html lang="en">
<head>
    <link  type="text/css" href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Theatre</title>
</head>
<body>
<div class="container h-100">
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once ("conn.php");
    $conn = OpenCon();
    try {
        if (isset($_GET['idTeatro']) && isset($_GET['nombreTeatro'])) {
            $id = $_GET['idTeatro'];
            $theatre = $_GET['nombreTeatro'];
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->query("SELECT * FROM teatro_sesiones WHERE teatro=$id AND TIMESTAMP(fecha, hora) > TIMESTAMP(NOW()) ");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $stmt3 = $conn->query("SELECT filas,columnas FROM teatro_teatros WHERE idTeatro=$id");
            $stmt3->execute();
            $result3 = $stmt3->fetchAll();
            $fil=$result3[0][0];
            $col=$result3[0][1];
            $capacity = $fil*$col;
        }
    }catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    if (isset($id) && isset($theatre)) {
        echo "<div class='row col-12 justify-content-center align-self-center pt-5'>";
        echo "<div class='col-12 text-center mb-3'><h1> $theatre Sessions</h1></div>";
        echo "<table class='table text-center mx-auto'>";
        echo "<thead>";
        echo "<tr class='col'>";
        echo "<th scope='col'> Fecha";
        echo "<th scope='col'> Hora";
        echo "<th scope='col'> Disponibilidad";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while($result = $stmt->fetch(PDO::FETCH_OBJ)){
                echo "<div class='col-12'>";
                echo "<tr>";
                echo "<td>$result->fecha</td>";
                echo "<td>$result->hora</td>";

                $stmt2 = $conn->query("SELECT COUNT(*) FROM teatro_entradas WHERE idSesion=$result->idSesion");
                $stmt2->execute();
                $result2 = $stmt2->fetchAll();
                //print_r($result2);

                if($capacity>$result2[0][0]){
                    echo "<td><a href='buyTickets.php?idSesion=$result->idSesion&teatro=$theatre&filas=$fil&columnas=$col'><img src='img/tickets.jpeg' width='150px'></a></td>";
                }else{
                    echo "<td><a href='buyTickets.php?idSesion=$result->idSesion&teatro=$theatre&filas=$fil&columnas=$col'><img src='img/agotadas.jpeg' width='200px'></a></td>";
                }
                echo "</tr>";
        }
        echo "</tbody>";
        echo "</div>";
        echo "</div>";

    }
    CloseCon();
    ?>
</div>
</body>
</html>

