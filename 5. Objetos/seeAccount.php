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
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        .container {
            padding-top: 5%;
        }
    </style>
    <title>See Account</title>
</head>
<body>
<?php
    require_once('nav.php');
?>
<div class="container">
    <form action="<?php $_SERVER['PHP_SELF']?>">
        <?php
        if(sizeof($aClientes)!=0){
            echo "<div class='form-group col-6 mx-auto'>";
            echo "Client<select class='form-control' name='client'>";
            for ($i=0;$i<sizeof($aClientes);$i++){
                echo "<option value='$i'>";
                echo $aClientes[$i]->getName()." - ".$aClientes[$i]->getCard();
                echo "</option>";
            }
            echo "</select>";
            echo "</div>";
        ?>
        <div class="form-group col-6 mx-auto">
            <button type="submit" name="submit" id="submit" class="btn btn-primary col-12">Submit</button>
        </div>
    </form>
    <div>
        <?php
            if(isset($_REQUEST["submit"])){
                $client = $_REQUEST["client"];
                $accs = $aClientes[$client]->getAccounts();
                echo "<ul class='list-group'>";
                foreach ($accs as $acc){
                    echo "<li class='list-group-item'>";
                    echo $acc;
                    echo "</li>";
                }
                echo "</ul>";
            }
        }else{
            echo "There isn't any clients";
        }
        ?>
    </div>
</div>
</body>
</html>
