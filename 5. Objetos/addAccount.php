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
if(isset($_REQUEST["submit"])){
    $client = $_REQUEST["client"];
    $acctype = $_REQUEST["acctype"];
    $balance = $_REQUEST["balance"];
    $interes = $_REQUEST["interes"];
    if(isset($_REQUEST["minbalance"])){
        $minbalance = $_REQUEST["minbalance"];
    }
    if($acctype == "saving"){
        $acc = new SavingAccount($balance,$interes,$minbalance);
    }else{
        $acc = new CurrentAccount($balance,$interes);
    }
    $aClientes[$client]->addAccount($acc);
    $bol = true;
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
    <title>Document</title>
    <style>
        .container {
            padding-top: 5%;
        }
    </style>
</head>
<body>
<?php
    require_once('nav.php');
?>
<div class="container">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="GET">
        <?php
            if(sizeof($aClientes)!=0){
                echo "<div class='form-group col-6 mx-auto'>";
                echo "<label for='client' name='client' id='client'>Client</label>";
                echo "<select class='form-control' name='client'>";
                for ($i=0;$i<sizeof($aClientes);$i++){
                    echo "<option value='$i'>";
                    echo $aClientes[$i]->getName()." - ".$aClientes[$i]->getCard();
                    echo "</option>";
                }
                echo "</select>";
                echo "</div>";
        ?>
            <div class="form-group col-6 mx-auto">
                <label for="acctype" >Account type</label>
                <select class="form-control" name="acctype" id="acctype">
                    <option id="0" value="current">Current Account</option>
                    <option id="1" value="saving">Saving Account</option>
                </select>
            </div>
            <div class="form-group col-6 mx-auto">
                <label for="balance">Balance</label>
                <input type="number" class="form-control" name="balance" id="balance" min="0" required placeholder="balance" required>
            </div>
            <div class="form-group col-6 mx-auto">
                <label for="interes">Interes</label>
                <input type="number" class="form-control" name="interes" id="interes" min="0" required placeholder="balance" required>
            </div>
            <div class="form-group col-6 mx-auto">
                <label for="minbalance">Minimum Balance</label>
                <input type="number" class="form-control" name="minbalance" id="minbalance" min="0" placeholder="Min. balance" disabled>
            </div>
            <div class="form-group col-6 mx-auto">
                <button type="submit" name="submit" id="submit" class="btn btn-primary col-12">Submit</button>
            </div>
            <?php
            if($bol) echo "<div class='alert alert-success col-6 mx-auto text-center' role='alert'>Account added correctly</div>";
        }else{
            echo "There isn't any clients";
        }
        ?>
    </form>
</div>

<script>
    window.addEventListener("load",function(){
        var min = document.getElementById("minbalance");
        var type = document.getElementById("acctype");
        type.addEventListener("click",function(){
            if(document.getElementById("1").selected){
                min.disabled=false;
                document.getElementById("minbalance").value = 0;
                min.required="true";
            }else{
                min.value = "";
                min.required="false";
                document.getElementById("minbalance").innerText = "MinBalance is enabled only for Saving Accounts";
                min.disabled=true;
            }
        })
    })

</script>
</body>
</html>
