<?php
include ("pages/conexionbdd.php");
?>
<html>
  <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Computadoras</title>
      <!--Including Bootstrap style files-->
      <link href="<?= $rootPath ?>css/bootstrap.min.css" rel="stylesheet">
      <link href="<?= $rootPath ?>css/bootstrap-responsive.min.css" rel="stylesheet">

      <!-- Google font -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
      <!-- Slick -->
      <link type="text/css" rel="stylesheet" href="css/slick.css"/>
      <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
      <!-- nouislider -->
      <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
      <!-- Font Awesome Icon -->
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <!-- Custom stlylesheet -->
      <link type="text/css" rel="stylesheet" href="css/style.css"/>
      <script src="https://polyfill.io/v3/polyfill.min.js"></script>
  </head>
  <body>
    <!-- HEADER -->
    <header>
      <!-- TOP HEADER -->
      <div id="top-header">
        <div class="container">
          <ul class="header-links pull-left">
            <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
            <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
            <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
          </ul>
          <ul class="header-links pull-right">
            <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
            <li><a href="#"><i class="fa fa-user-o"></i> My cuenta</a></li>
          </ul>
        </div>
      </div>
      <!-- /TOP HEADER -->

      <!-- MAIN HEADER -->
      <div id="header">
        <!-- container -->
        <div class="container">
          <!-- row -->
          <div class="row">
            <!-- LOGO -->
            <div class="col-md-3">
              <div class="header-logo">
                <a href="#" class="logo">
                  <img src="./img/logo.png" alt="">
                </a>
              </div>
            </div>
            <!-- /LOGO -->

            <?php
              $select = $con->prepare("select * from categoria_productos");
              $select->execute();
            ?>

            <!-- SEARCH BAR -->
            <div class="col-md-6">
              <div class="header-search">
                <form>
                  <select class="input-select">
                    <option value="0" disabled>Categorías </option>
                    <?php
                      while ($fila = $select->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { ?>
                        <option value="<?php echo strtolower($fila[1]) ?>"><?php echo $fila[1] ?></option>
                    <?php 
                      }
                    ?>
                  </select>
                  <input class="input" placeholder="....">
                  <button class="search-btn">Buscar</button>
                </form>
              </div>
            </div>
            <!-- /SEARCH BAR -->
            <?php
              $x = 0;
                if(isset($_SESSION["carrito"]) && !empty($_SESSION["carrito"])){
                  foreach ($_SESSION["carrito"] as $c) {
                    $x++;
                  }
                }
              ?>
            <!-- ACCOUNT -->
            <div class="col-md-3 clearfix">
              <div class="header-ctn">
                <!-- Wishlist -->
                <div>
                  <a href="#">
                    <i class="fa fa-heart-o"></i>
                    <span>Su lista</span>
                    <div class="qty"><?php echo $x ?></div>
                  </a>
                </div>
                <!-- /Wishlist -->

                <!-- Cart -->
                <div class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Su carrito</span>
                    <div class="qty">?</div>
                  </a>
                </div>
                <!-- /Cart -->

                <!-- Menu Toogle -->
                <div class="menu-toggle">
                  <a href="#">
                    <i class="fa fa-bars"></i>
                    <span>Menu</span>
                  </a>
                </div>
                <!-- /Menu Toogle -->
              </div>
            </div>
            <!-- /ACCOUNT -->
          </div>
          <!-- row -->
        </div>
        <!-- container -->
      </div>
      <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
      <!-- container -->
      <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
          <!-- NAV -->
          <ul class="main-nav nav navbar-nav">
            <li class="active"><a href="index.php">Inicio</a></li>
            <li><a href="#">Nosotros</a></li>
              <?php
                $select = $con->prepare("select * from categoria_productos");
                $select->execute();
                while ($fila = $select->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { ?>
                  <li><a href="<?php echo strtolower($fila[1]).'.php';?>"><?php echo $fila[1];?></a></li>
              <?php 
                }
              ?>
            <li><a href="#">Contactos</a></li>
            <li><a href="admin.php">Login</a></li>
          </ul>
          <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
      </div>
      <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->
      