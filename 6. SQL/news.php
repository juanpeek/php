<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

//Paginacion
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}


if(isset($_SESSION["username"])) {
    include("fetchNews.php");
    require_once("cards.php");
    ?>
    <html>
    <header>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </header>
    <body>
    <?php require_once ("nav.php")?>
    <div class="container" style="display: none">
        <div class="col-12 mx-auto">
            <div class="h1 mt-3 row justify-content-md-center">News</div>
                <form method="get">
                    <div class="row justify-content-md-center">
                        <select class="form-control col-2 ml-3" name="category" id="category">
                            <option value="ofertas">Ofertas</option>
                            <option value="costas">Costas</option>
                            <option value="promociones">Promociones</option>
                        </select>
                        <button class="btn btn-primary ml-1" type="submit" value="submit">Submit</button>
                    </div>
                </form>
            <form>
                <div class="row justify-content-center">
                    <?php
                        if (isset($stmt2)) {
                            while($result = $stmt2->fetch(PDO::FETCH_OBJ)){
                                echo newCard($result->id,$result->titulo,$result->texto,$result->categoria,$result->fecha,$result->imagen);
                            }
                            //$row_count = $stmt->rowCount();
                        }
                    if(isset($count) && isset($no_of_records_per_page)){
                        $total_pages = ceil($count / $no_of_records_per_page);
                    }
                    ?>
                </div>
            </form>
            <?php
                if(isset($_REQUEST["category"])){
                    ?>
                    <div class="col-2 mx-auto">
                        <ul class="pagination">
                            <li class="mr-2"><a href="<?php echo "?pageno=1&category=".$categoria?>">First</a></li>
                            <li class="mr-2 <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                                <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1)."&category=".$categoria; } ?>">Prev</a>
                            </li>
                            <li class="mr-2 <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1)."&category=".$categoria; } ?>">Next</a>
                            </li>
                            <li><a href="?pageno=<?php echo $total_pages."&category=".$categoria; ?>">Last</a></li>
                        </ul>
                    </div>

            <?php
                }
            ?>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    </body>
    </html>
    <?php
}else{
    header("Location: index.php");
}
?>