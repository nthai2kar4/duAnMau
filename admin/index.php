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
    <div id="wrapper">
        <?php
        include 'components/sidebar.php';
        ?>
        <?php
        if (isset($_GET['pages'])) {
            switch ($_GET['pages']) {
                case 'products':
                    switch ($_GET['action']) {
                        case 'list_product':
                            include 'product/list-product.php';
                            break;
                        case 'add_product':
                            include 'product/add-product.php';
                            break;
                        case 'edit_product':
                            include 'product/edit-product.php';
                            break;
                        default:
                            include 'product/list-product.php';
                            break;
                    }
                    break;
            }
        }
        ?>
    </div>

    <script>
        $(".nav-item").on("click", function() {
            $(".nav-item active").removeClass('active');
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