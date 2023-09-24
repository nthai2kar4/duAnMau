
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <?php
    include 'components/head.php';
    require_once '../admin/code/function.php';
    session_start();
    if (isset($_SESSION['login_user'])) {
        $data = login();
    }
    ?>
</head>

<body>
    <?php
    include 'components/header.php';
    ?>
    <?php
    if (isset($_GET['pages'])) {
        switch ($_GET['pages']) {
            case 'shop':
                switch ($_GET['action']) {
                    case 'category':
                        include 'page/category.php';
                        break;
                    case '':
                        include 'product/add.php';
                        break;
                    case 'edit':
                        include 'product/edit.php';
                        break;
                    default:
                        include 'page/category.php';;
                        break;
                }
                break;
            case 'login':
                include 'page/login.php';
                break;
        }
    } else {
        include 'components/main.php';
    }
    include 'components/footer.php';
    include 'components/script.php';
    ?>
    <script>
        $(document).ready(function() {
            $(".nav-item").click(function() {
                $(".nav-item").removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>
</body>

</html>