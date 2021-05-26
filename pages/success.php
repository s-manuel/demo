<?php
/*
    * Success page -  Shortcut and Mark Flow.
    * Buyer can change shipping information for Shortcut flow before execute.
    * Buyer can view order details after execute.
*/
    session_start();
    $rootPath = "../";
    include_once('../api/Config/Config.php');
    include ("./conexionbdd.php");
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
      <link type="text/css" rel="stylesheet" href="../css/slick.css"/>
      <link type="text/css" rel="stylesheet" href="../css/slick-theme.css"/>
      <!-- nouislider -->
      <link type="text/css" rel="stylesheet" href="../css/nouislider.min.css"/>
      <!-- Font Awesome Icon -->
      <link rel="stylesheet" href="../css/font-awesome.min.css">
      <!-- Custom stlylesheet -->
      <link type="text/css" rel="stylesheet" href="../css/style.css"/>
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

            <!-- ACCOUNT -->
            <div class="col-md-3 clearfix">
              <div class="header-ctn">
                <!-- Wishlist -->
                <div>
                  <a href="#">
                    <i class="fa fa-heart-o"></i>
                    <span>Su lista</span>
                    <div class="qty">?</div>
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
      

<!-- HTML Content -->
<div class="row-fluid">
    <!-- Middle Section -->
    <div class="col-sm-offset-3 col-md-4">
        <div id="loadingAlert"
             class="card"
             style="display: none;">
            <div class="card-body">
                <div class="alert alert-info block"
                     role="alert">
                    Loading....
                </div>
            </div>
        </div>
        <form id="orderConfirm"
              class="form-horizontal"
              style="display: none;">
            <h3>Your payment is authorized.</h3>
            <h4>Confirm the order to execute</h4>
            <hr>
            <div class="form-group">
                <label class="col-sm-5 control-label">Shipping Information</label>
                <div class="col-sm-7">
                    <p id="confirmRecipient"></p>
                    <p id="confirmAddressLine1"></p>
                    <p id="confirmAddressLine2"></p>
                    <p>
                        <span id="confirmCity"></span>,
                        <span id="confirmState"></span> - <span id="confirmZip"></span>
                    </p>
                    <p id="confirmCountry"></p>
                </div>
            </div>
            <div class="form-group">
                <label for="shippingMethod" class="col-sm-5 control-label">Shipping Type</label>
                <div class="col-sm-7">
                    <select class="form-control" name="shippingMethod" id="shippingMethod">
                        <optgroup label="United Parcel Service" style="font-style:normal;">
                            <option value="8.00">
                                Worldwide Expedited - $8.00</option>
                            <option value="4.00">
                                Worldwide Express Saver - $4.00</option>
                        </optgroup>
                        <optgroup label="Flat Rate" style="font-style:normal;">
                            <option value="2.00" selected>
                                Fixed - $2.00</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-7">
                    <label class="btn btn-primary" id="confirmButton">Complete Payment</label>
                </div>
            </div>
        </form>
        <form id="orderView"
              class="form-horizontal"
              style="display: none;">
            <h3>Your payment is complete</h3>
            <h4>
                <span id="viewFirstName"></span>
                <span id="viewLastName"></span>,
                Thank you for your Order
            </h4>
            <hr>
            <div class="form-group">
                <div class="form-group">
                    <label class="col-sm-5 control-label">Shipping Details</label>
                    <div class="col-sm-7">
                        <p id="viewRecipientName"></p>
                        <p id="viewAddressLine1"></p>
                        <p id="viewAddressLine2"></p>
                        <p>
                            <span id="viewCity"></span>,
                            <span id="viewState"></span> - <span id="viewPostalCode"></span>
                        </p>
                        <p id="confirmCountry"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Transaction Details</label>
                    <div class="col-sm-7">
                        <p>Transaction ID: <span id="viewTransactionID"></span></p>
                        <p>Payment Total Amount: <span id="viewFinalAmount"></span> </p>
                        <p>Currency Code: <span id="viewCurrency"></span></p>
                        <p>Payment Status: <span id="viewPaymentState"></span></p>
                        <p id="transactionType">Payment Type: <span id="viewTransactionType"></span> </p>
                    </div>
                </div>
            </div>
            <hr>
            <h3> Click <a href='../index.php'>here </a> to return to Home Page</h3>
        </form>
    </div>
</div>

<!-- Javascript Import -->
<script src="<?= $rootPath ?>js/config.js"></script>

<!-- PayPal In-Context Checkout script -->
<script type="text/javascript">
    showDom('loadingAlert');

    document.onreadystatechange = function(){
        if (document.readyState === 'complete') {
            $.ajax({
                    type: 'POST',
                    url: '<?= $rootPath.URL['services']['orderGet'] ?>',
                    success: function (response) {
                        hideDom('loadingAlert');
                        if (response.ack) {
                            if(getUrlParams('commit') === 'true') {
                                showPaymentExecute(response.data);
                            } else {
                                showPaymentGet(response.data);
                            }
                        } else {
                            alert('Something went wrong');
                        }  
                    }
            });
        }
    }

    function showPaymentGet(res) {
        let shipping = res.purchase_units[0].shipping;
        let shipping_address = shipping.address;
        console.log('Get Order result' + JSON.stringify(res));
        console.log('shipping add' + JSON.stringify(shipping));
        document.getElementById('confirmRecipient').innerText = shipping.name.full_name;
        document.getElementById('confirmAddressLine1').innerText = shipping_address.address_line_1;
        if(shipping_address.address_line_2)
            document.getElementById('confirmAddressLine2').innerText = shipping_address.address_line_1;
        else
            document.getElementById('confirmAddressLine2').innerText = "";
        document.getElementById('confirmCity').innerText = shipping_address.admin_area_2;
        document.getElementById('confirmState').innerText = shipping_address.admin_area_1;
        document.getElementById('confirmZip').innerText = shipping_address.postal_code;
        document.getElementById('confirmCountry').innerText = shipping_address.country_code;

        showDom('orderConfirm');

        // Listen for click on confirm button
        document.querySelector('#confirmButton').addEventListener('click', function () {
            let shippingMethodSelect = document.getElementById("shippingMethod"),
                updatedShipping = shippingMethodSelect.options[shippingMethodSelect.selectedIndex].value,
                currentShipping = res.purchase_units[0].amount.breakdown.shipping.value;

            let postPatchOrderData = {
                    "order_id": res.id,
                    "item_amt": res.purchase_units[0].amount.breakdown.item_total.value,
                    "tax_amt": res.purchase_units[0].amount.breakdown.tax_total.value,
                    "handling_fee": res.purchase_units[0].amount.breakdown.handling.value,
                    "insurance_fee": res.purchase_units[0].amount.breakdown.insurance.value,
                    "shipping_discount": res.purchase_units[0].amount.breakdown.shipping_discount.value,
                    "total_amt": res.purchase_units[0].amount.value,
                    "currency": res.purchase_units[0].amount.currency_code,
                    "updated_shipping": updatedShipping,
                    "current_shipping": currentShipping
                };

            console.log('patch data: '+ JSON.stringify(postPatchOrderData));
            // Execute the payment
            hideDom('confirmButton');
            showDom('loadingAlert');

            console.log('Current shipping '+ currentShipping + ' and updated shipping is '+ updatedShipping);
            console.log('order id: <?= $_SESSION['order_id']?>');
            if(currentShipping == updatedShipping) {
                return callPaymentCapture();
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?= $rootPath.URL['services']['orderPatch'] ?>',
                    data: postPatchOrderData,
                    success: function (response) {
                        console.log('Patch Order Response : '+ JSON.stringify(response));
                        if (response.ack)
                            return callPaymentCapture();
                        else
                            alert("Something went wrong");
                    }
                });
            }
        });
    }

    function callPaymentCapture(){
        $.ajax({
                    type: 'POST',
                    url: '<?= $rootPath.URL['services']['orderCapture'] ?>',
                    success: function (response) {
                        hideDom('orderConfirm');
                        hideDom('loadingAlert');
                        console.log('Capture Response : '+ JSON.stringify(response));
                        if (response.ack)
                            showPaymentExecute(response.data);
                        else
                            alert("Something went wrong");
                    }
        });
    }

    function showPaymentExecute(result) {

        let payerInfo = result.payer,
            shipping = result.purchase_units[0].shipping;

        document.getElementById('viewFirstName').textContent = payerInfo.name.given_name;
        document.getElementById('viewLastName').textContent = payerInfo.name.surname;
        document.getElementById('viewRecipientName').textContent = shipping.name.full_name;
        document.getElementById('viewAddressLine1').textContent = shipping.address.address_line_1;
        if(shipping.address.address_line_2)
            document.getElementById('viewAddressLine2').textContent = shipping.address.address_line_2;
        else
            document.getElementById('viewAddressLine2').textContent = "";
        document.getElementById('viewCity').textContent = shipping.address.admin_area_2;
        document.getElementById('viewState').textContent = shipping.address.admin_area_1;
        document.getElementById('viewPostalCode').innerHTML = shipping.address.postal_code;
        document.getElementById('viewTransactionID').textContent = result.id;
        if(result.purchase_units[0].payments && result.purchase_units[0].payments.captures) {
            document.getElementById('viewFinalAmount').textContent = result.purchase_units[0].payments.captures[0].amount.value;
            document.getElementById('viewCurrency').textContent = result.purchase_units[0].payments.captures[0].amount.currency_code;
        }else {
            document.getElementById('viewFinalAmount').textContent = result.purchase_units[0].amount.value;
            document.getElementById('viewCurrency').textContent = result.purchase_units[0].amount.currency_code;
        }
        document.getElementById('viewPaymentState').textContent = result.status;
        if(result.intent) {
            document.getElementById('viewTransactionType').textContent = result.intent;
            document.getElementById('transactionType').style.display='block';
        } else {
            document.getElementById('transactionType').style.display='none';
        }
        hideDom('orderConfirm');
        hideDom('loadingAlert');
        showDom('orderView');
    }

</script>

<?php
include('../templates/footer.php');
?>