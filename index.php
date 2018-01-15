<?php require_once 'funciones.php';
 $user = getUser();
 $products = getProducts();
  echo $products[0]["img"]["url"];
$contador = 0;
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Aero Lab</title>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>AeroLab Market</h3>
                </div>

                <ul class="list-unstyled components">
                    <p>Opciones</p>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Home</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="#">Home 1</a></li>
                            <li><a href="#">Home 2</a></li>
                            <li><a href="#">Home 3</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">About</a>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="#">algo</a></li>
                            <li><a href="#">Page 2</a></li>
                            <li><a href="#">Page 3</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Portfolio</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="navbar-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">

                            </ul>
                        </div>
                    </div>
                </nav>
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
                        <div>Titulos y filtros</div>
                        <div class="row">productos en si con 16 cajas por producto
                            <div class="line"></div>
                                <?php foreach ($products as $product){ $contador ++; ?>
                                <div class="box col-sm-4">
                                    <div id="<?php echo $contador?>" class="cover">
                                        <?php if((int)$product["cost"] < (int)$user["points"]){
                                            echo "Redeem";
                                        } else {
                                            $x = (int)$product["cost"] - (int)$user["points"];
                                            echo "You'r ". $x."<img src=\"assets/icons/coin.svg\">". " short.";
                                        } ?>
                                    </div>
                                        <img class="whiteBlue whiteBlue<?php echo $contador?>" src="assets/icons/buy-blue.svg">
                                        <div>
                                            <img class="productImg" src="<?php echo $product["img"]["url"];?>">
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
        <script src="js/main.js"></script>
    </body>
</html>
