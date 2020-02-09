<?php
spl_autoload_register(function($class){
    include "$class.php";
});
session_start();

if(isset($_SESSION["clients"])){
    $aClientes = $_SESSION["clients"];
}else{
    $aClientes = array();
}
$msj = false;
if(isset($_REQUEST["name"]) && isset($_REQUEST["card"])){
    if($_REQUEST["name"] != "" && $_REQUEST["card"] != ""){
        $cliente = new Client($_REQUEST["name"],$_REQUEST["card"]);
        array_push($aClientes,$cliente);
        $_SESSION["clients"] = $aClientes;
        $msj = true;
    }
}
?>
<html>
    <head>
        <link rel="stylesheet" href="bootstrap.min.css">
        <style>
            .container {
                padding-top: 5%;
            }
            h1 {
                text-align: center;
            }
            p {
                font-style: italic;
            }
        </style>
    </head>
    <body>
    <?php
    require_once('nav.php');
    ?>
        <div class="container">
            <div class="col-6 mx-auto">
                <h1>Accounts exercise</h1>
            </div>
            <div class="col-6 mx-auto">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" required placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="card">Card</label>
                    <input type="text" class="form-control" name="card" id="card" required placeholder="Card" required>
                </div>
                <button type="submit" name="submit" id="submit" class="btn btn-primary col-12">Submit</button>
            </form>
            <?php
                if($msj){
                    echo "<div class='alert alert-success' role='alert'>
                            Client added correctly
                          </div>";
                }
            ?>
        </div>
    </body>
</html>
