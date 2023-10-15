<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
  <?php
  include 'mail/Mail.php';
  include 'components/head.php';
  require_once '../admin/code/function.php';
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
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
          case 'detail':
            include 'page/product-detail.php';
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
      case 'register';
        include 'page/register.php';
        break;
      case 'cart':
        switch ($_GET['action']) {
          case 'list':
            include 'page/cart.php';
            break;
          default:
            include 'page/cart.php';
            break;
        }
        break;
      case 'checkout':
        include 'page/checkout.php';
        break;
      case 'thank':
        include 'page/thank.php';
        break;
      case 'profile':
        switch ($_GET['action']) {
          case 'profile':
            include 'page/profile.php';
            break;
          case 'edphone':
            include 'page/edit-phone.php';
            break;
          case 'edaddress':
            include 'page/edit-address.php';
            break;
          default:
            include 'page/profile.php';
            break;
        }
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
        $(this).toggleClass('active');
        $(".nav-item").removeClass("active");
        $(this).addClass("active");
      });
    });
    /*
Template Name: Admin Template
Author: Wrappixel

File: js
*/
    // ==============================================================
    // Auto select left navbar
    // ==============================================================
    $(function() {
      "use strict";
      var url = window.location + "";
      var path = url.replace(
        window.location.protocol + "//" + window.location.host + "/",
        ""
      );
      var element = $("ul#sidebarnav a").filter(function() {
        return this.href === url || this.href === path; // || url.href.indexOf(this.href) === 0;
      });
      element.parentsUntil(".sidebar-nav").each(function(index) {
        if ($(this).is("li") && $(this).children("a").length !== 0) {
          $(this).children("a").addClass("active");
          $(this).parent("ul#sidebarnav").length === 0 ?
            $(this).addClass("active") :
            $(this).addClass("selected");
        } else if (!$(this).is("ul") && $(this).children("a").length === 0) {
          $(this).addClass("selected");
        } else if ($(this).is("ul")) {
          $(this).addClass("in");
        }
      });

      element.addClass("active");
      $("#sidebarnav a").on("click", function(e) {
        if (!$(this).hasClass("active")) {
          // hide any open menus and remove all other classes
          $("ul", $(this).parents("ul:first")).removeClass("in");
          $("a", $(this).parents("ul:first")).removeClass("active");

          // open our new menu and add the open class
          $(this).next("ul").addClass("in");
          $(this).addClass("active");
        } else if ($(this).hasClass("active")) {
          $(this).removeClass("active");
          $(this).parents("ul:first").removeClass("active");
          $(this).next("ul").removeClass("in");
        }
      });
      $("#sidebarnav >li >a.has-arrow").on("click", function(e) {
        e.preventDefault();
      });
    });
  </script>
</body>

</html>