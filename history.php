<?php
require_once("funciones.php");
$user = getUser();
$historys = getHistory();
?>


<!DOCTYPE html>

<html>
<?php require_once("head.php"); ?>

<body>
<div class="wrapper">
    <!-- Sidebar Holder -->
    <?php require_once("sidebar.php"); ?>

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


            <section class="history">

                <table id="historyTable" class="table">
                    <thead>
                    <tr>
                        <th onclick="sortTable(0)">Name <i class="fa fa-sort" aria-hidden="true"></i></th>
                        <th onclick="sortData(1)">Points <i class="fa fa-sort" aria-hidden="true"></i></th>
                        <th onclick="sortTable(2)">Category <i class="fa fa-sort" aria-hidden="true"></i></th>
                        <th onclick="sortTable(3)">Image <i class="fa fa-sort" aria-hidden="true"></i></th>
                        <th onclick="sortTable(4)">Date <i class="fa fa-sort" aria-hidden="true"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($historys as $history){
                            $date = date_create($history['createDate']);
                            echo '<tr><td>' .$history['name']. '</td>';
                            echo '<td>' .(int)$history['cost']. '</td>';
                            echo '<td>' .$history['category']. '</td>'; ?>
                            <td> <img class="historyImg" src="<?php echo $history["img"]["url"]?>"></td>
                            <?php echo '<td>' . date_format($date, 'Y-m-d'). '</td>';?>
                        </tr>
                     <?php } ?>

                    </tbody>
                </table>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>