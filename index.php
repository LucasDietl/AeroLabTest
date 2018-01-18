<?php require_once('funciones.php');
$show = 0;
if(isset($_GET['Asc'])){
    $products = getProductsAsc();
}elseif(isset($_GET['Desc'])){
    $products = getProductsDesc();
}else{
    $products = getProducts();
}
 $total = count($products);
 $show = $total/2;

 $user = getUser();
 $contador = 0;

?>

<!DOCTYPE html>
<html>
<?php require_once("head.php"); ?>

    <body>
        <div class="wrapper">
            <!-- Page Content Holder -->
            <div id="content">

                <?php require_once("topNavbar.php"); ?>

                <div class="contenido">
                    <img class="logo" src="assets/aerolab-logo.svg">
                    <div>
                        <div class="user pull-right">
                            <div><a href="#"><?php echo $user["name"] ?></a></div>
                            <div class="points">
                                <a href="#"><?php echo $user["points"] ?>
                                    <span>
                                        <img src="assets/icons/coin.svg">
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <img class="imgHeader" src="assets/header-x1.png">
                    </div>

                    <section class="products">
                        <div class="filters">
                            <label class="lable">Sort by:</label>
                            <form class="mostRecent" method="get" action="index.php">
                                <input type="hidden" name="nada" value="sort">
                                <button id="mostRecent" type="submit">Most recent</button>
                            </form>
                            <form class="lowestPrice" method="get" action="index.php">
                                <input type="hidden" name="Asc" value="sort">
                                <button id="lowestPrice" type="submit">Lowest price</button>
                            </form>
                            <form class="highestPrice" method="get" action="index.php">
                                <input type="hidden" name="Desc" value="sort">
                                <button id="highestPrice" type="submit">Highest price</button>
                            </form>
                            <div class="total"><?php echo $show. " of ". $total . " Products"?> </div>
                            <div class="total2"><?php echo $total. " of ". $total . " Products"?> </div>
                            <div id="arrowRight">
                                <a><img id="change" src="assets/icons/arrow-right.svg"></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="line"></div>
                                <?php foreach ($products as $product){ $contador ++; ?>
                                <div class="box box<?php echo $contador?>">
                                    <div id="<?php echo $contador?>" class="cover">
                                        <?php if((int)$product["cost"] <= (int)$user["points"]){ ?>
                                            <b><?php echo $product["cost"] . "<img src=\"assets/icons/coin.svg\">" ?> </b>
                                            <button onclick='redeem( "<?php echo $product["_id"]; ?>" )' > Redeem now</button>
                                        <?php
                                        } else {
                                            $x = (int)$product["cost"] - (int)$user["points"];
                                            echo "<p>You're ". $x."<img src=\"assets/icons/coin.svg\">". " short.</p>";
                                        } ?>
                                    </div>
                                        <img class="whiteBlue whiteBlue<?php echo $contador?>" src="assets/icons/buy-blue.svg">
                                        <div>
                                            <img class="productImg" src="<?php echo $product['img']['url'];?>">
                                        </div>
                                        <div class="productLine"></div>
                                        <div class="productTitle1">
                                            <?php echo $product["category"] ?>
                                        </div>
                                        <div class="productTitle2">
                                            <?php echo $product["name"]; ?>
                                        </div>
                                        <?php if((int)$product["cost"] > (int)$user["points"]){ ?>
                                        <div id="notRedeemable<?php echo $contador?>" class="productTitle3">
                                            <?php
                                                echo "<b>You need " . $product["cost"]. "<img src=\"assets/icons/coin.svg\">". " to reedem</b>" ;
                                            }else{ ?>
                                            <div id="redeemable" class="productTitle3Bis">
                                                <?php
                                                echo "<b>Get it now!! for ". $product["cost"]. "<img src=\"assets/icons/coin.svg\"></b>";
                                            } ?>
                                            </div>
                                        </div>
                                        <?php  } ?>

                        </div>
                    </section>
                </div>


             </div>

        </div>

        <footer>
            <div> <p>Aerolab’s Coding Challenge - Lucas Dietl </p></div>
        </footer>





        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                     $(this).toggleClass('active');
                 });
             });
         </script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
