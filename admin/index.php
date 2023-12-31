<?php
require_once "../config/db.php";
include "code/function.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <?php
    include 'components/stylesheet.php';
    ?>
</head>

<body>
    <?php
    include 'components/navbar.php';
    ?>
    <div id="wrapper">
        <?php
        include 'components/sidebar.php';

        ?>
        <?php
        if (isset($_GET['pages'])) {
            switch ($_GET['pages']) {
                case 'product':
                    switch ($_GET['action']) {
                        case 'list':
                            include 'product/list.php';
                            break;
                        case 'add':
                            include 'product/add.php';
                            break;
                        case 'edit':
                            include 'product/edit.php';
                            break;
                        default:
                            include 'product/list.php';
                            break;
                    }
                    break;
                case 'user':
                    switch ($_GET['action']) {
                        case 'list':
                            include 'user/list.php';
                            break;
                        case 'add':
                            include 'user/add.php';
                            break;
                        case 'edit':
                            include 'user/edit.php';
                            break;
                        default:
                            include 'user/list.php';
                            break;
                    }
                    break;

                case 'order':
                    switch ($_GET['action']) {
                        case 'list':
                            include 'order/list.php';
                            break;
                        case 'detail':
                            include 'order/detail.php';
                            break;
                        default:
                            include 'order/list.php';
                            break;
                    }
                    break;

                case 'category':
                    switch ($_GET['action']) {
                        case 'list':
                            include 'category/list.php';
                            break;
                        case 'add':
                            include 'category/add.php';
                            break;
                        case 'edit':
                            include 'category/edit.php';
                            break;
                        default:
                            include 'category/list.php';
                            break;
                    }
                    break;
            }
        }


        ?>
    </div>

    <script>
        $(".nav-item").on("click", function() {
            $(".nav-item").removeClass('active');
            $(this).addClass('active');
        })
    </script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="asset/js/demo/chart-area-demo.js"></script>
    <script src="asset/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>