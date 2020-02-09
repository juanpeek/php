<?php
require_once ("conn.php");

$idSesion=$_REQUEST["idSesion"];
$teatro=$_REQUEST["teatro"];
$fil=$_REQUEST["filas"];
$col=$_REQUEST["columnas"];
$occupiedSeats = [];

$conn = OpenCon();

$stmt = $conn->query("SELECT * FROM teatro_entradas WHERE idSesion=$idSesion");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
while ($result = $stmt->fetch(PDO::FETCH_OBJ)){
    array_push($occupiedSeats,array($result->fila,$result->columna));
}
//print_r($occupiedSeats);

CloseCon();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link  type="text/css" href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css">
    <style>
        input[type='checkbox']{
            opacity:0;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="col-12 justify-content-center align-self-center pt-5">
    <h3 class="text-center"><?php echo $teatro?></h3>
    <form action="buySeats.php" method="get">
        <input type="text" name="idSesion" value="<?php echo $idSesion ?>" hidden>
        <table id="seats" class="table">

        </table>
        <div class="col-12 mx-auto">
            <div class="text-center">
                <button class="btn btn-primary" id="cancelar" type="button" value="Cancelar">Cancelar</button>
                <button class="btn btn-primary" type="submit" value="Submit">Submit</button>
            </div>
        </div>
    </div>
</div>
</form>

<script src="jquery-3.4.1.min.js"></script>
<script>
    let occupiedSeats = <?php echo json_encode($occupiedSeats); ?>;
    let fil = <?php echo json_encode($fil); ?>;
    let col = <?php echo json_encode($col); ?>;
    let reservedSeats = [];
    console.log(occupiedSeats);
    $('#cancelar').on("click",function(){
        window.location.replace("index.php");
    });

    for (let i = 0; i < fil; i++) {
        $(".table").append(`<tr id=${i+1}>`);
        for (let j = 0; j < col; j++) {
            $(`tr:last-child`).append(`<td id=${j+1}><input name='ids[]' type='checkbox' id='cbox1' value='${i+1}-${j+1}'>`);
        }
        $(".table").append("</tr>");
    }
    $(`td`).append(`<img src='img/libre.gif'>`);

    for (let i = 0; i < occupiedSeats.length; i++) {
        $(`tr:nth-child(${occupiedSeats[i][0]}) > td#${occupiedSeats[i][1]}>img`).attr("src", "img/ocupada.gif");
    }
    libre();
    function libre(){
        $('img[src="img/libre.gif"]').click(function(){
            $(this).attr("src", "img/reservada.gif");
            $(this).prev().prop('checked',true);
            reservada();
            /*
            let trid =  $(this).parent().parent().attr('id');
            let tdid =  $(this).parent().attr('id');
            reservedSeats.push(new Array(trid,tdid));
            console.log(reservedSeats);
            //console.log(trid);
            //console.log(tdid);
            $(this).unbind( "click");
            console.log("hola");
            */
        })
    }
    function reservada(){
        $('img[src="img/reservada.gif"]').click(function(){
            $(this).attr("src", "img/libre.gif");
            $(this).prev().prop('checked',false);
            libre();
            /*
            $(this).unbind( "click");
            console.log("hola2");
            let trid =  $(this).parent().parent().attr('id');
            let tdid =  $(this).parent().attr('id');
            for (let i = 0; i < reservedSeats.length; i++) {
               if(reservedSeats[i][0]==trid && reservedSeats[i][1]==tdid){
                   reservedSeats[i].splice(1,1);
                   reservedSeats[i].splice(0,1);
               }
            }
            */
        })
    }
</script>
</body>
</html>
