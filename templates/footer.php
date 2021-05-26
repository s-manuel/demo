



		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Información</h3>
								<p>Somos una empresa con más de 10 años de experiencia.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>Izamba-Ambato-Ecuador</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>099-583-3641</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>cristina@gmail.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categorias</h3>
								<ul class="footer-links">
									<?php
					                $select = $con->prepare("select * from categoria_productos");
					                $select->execute();
					                while ($fila = $select->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { ?>
					                  <li><a href="<?php echo strtolower($fila[1]).'.php';?>"><?php echo $fila[1];?></a></li>
					              <?php 
					                }
					            ?>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">Acerca de nosotros </a></li>
									<li><a href="#">Contactos </a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Servicios</h3>
								<ul class="footer-links">
									<li><a href="#">Mi cuenta</a></li>
									<li><a href="#">Ver carrito </a></li>
									<li><a href="#">Pagar </a></li>
									<li><a href="#">Hayudas</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://code.jquery.com/jquery.js"></script>
		<!-- jQuery Plugins -->
		<!-- <script src="js/jquery.min.js"></script> -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

		

		<!-- PayPal In-Context Checkout script -->

<script src="https://www.paypal.com/sdk/js?client-id=Ab0IkgxtYm4yb7_AJFLMHkTKajSc76bCTzKDHy6_deQqfqoOF80i9RcR_n0Hnq6pBVk7ZSRXmZ3YcJiv&components=buttons"></script>

<script>
  paypal.Buttons({ }).render('#paypal-button-container')
</script>

</html>