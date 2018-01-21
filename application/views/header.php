<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Itsia
		</title>
		<!-- SEO Meta Tags-->
		<meta name="description" content="itsia">
		<meta name="keywords" content="ricoh, kyocera, codeigniter,responsive, mobile, bootstrap 4, html5, css3, jquery, js">
		<meta name="author" content="Itsia">
		<!-- Mobile Specific Meta Tag-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- Favicon and Apple Icons-->
		<link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
		<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/favicon.png">
		<link rel="apple-touch-icon" href="touch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="167x167" href="touch-icon-ipad-retina.png">
		<!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
		<link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/css/vendor.min.css">
		<!-- Main Template Styles-->
		<link id="mainStyles" rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/css/styles.min.css">
		<!-- Modernizr-->
		<script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
	</head>
	<!-- Body-->
	<body>
		<!-- Off-Canvas Mobile Menu-->
		<div class="offcanvas-container" id="mobile-menu">
			<nav class="offcanvas-menu">
				<ul class="menu">
					<li class="has-children active"><span><a href="<?php echo base_url(); ?>home"><span>Home</span></a></span></span>
					</li>
					<li class="has-children"><span><a href="<?php echo base_url(); ?>products/"><span>Productos</span></a><span class="sub-menu-toggle"></span></span>
						<ul class="offcanvas-submenu">
<?php
				foreach ($categories as $category):
?>						
								<li><a href="<?php echo base_url(); ?>products/index/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a></li>

<?php    endforeach;
?>								
						</ul>
					</li>
					<li class="has-children"><span><a href="shop-grid-ls.html"><span>Servicios</span></a></span>
					</li>
					<li class="has-children"><span><a href="shop-grid-ls.html"><span>Contacto</span></a></span>
					</li>
				</ul>
			</nav>
		</div>
		<!-- Navbar-->
		<!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
		<header class="navbar navbar-sticky">
			<!-- Search-->
			<form class="site-search" method="get">
				<input type="text" name="site_search" placeholder="Type to search...">
				<div class="search-tools"><span class="clear-search">Clear</span><span class="close-search"><i class="icon-cross"></i></span></div>
			</form>
			<div class="site-branding">
				<div class="inner">
					<a class="offcanvas-toggle menu-toggle" href="#mobile-menu" data-toggle="offcanvas"></a>
					<a class="site-logo" href="index.html"><img src="<?php echo base_url(); ?>assets/img/itsia.png" alt="Unishop"></a>
				</div>
			</div>
			<!-- Main Navigation-->
			<nav class="site-menu">
				<ul>
					<li class="has-megamenu active"><a href="<?php echo base_url(); ?>home"><span>Home</span></a>
					</li>
					<li><a href="<?php echo base_url(); ?>products/"><span>Productos</span></a>
						<ul class="sub-menu">
<?php
				foreach ($categories as $category):
?>
							<li><a href="<?php echo base_url(); ?>products/index/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a></li>
<?php         endforeach;
?>							
						</ul>
					</li>
					<li><a href="shop-grid-ls.html"><span>Servicios</span></a>
					</li>
					<li><a href="shop-grid-ls.html"><span>Contacto</span></a>
					</li>
				</ul>
			</nav>
			<!-- Toolbar-->
			<div class="toolbar">
				<div class="inner">
					<div class="tools">
						<div class="search"><i class="icon-search"></i></div>
						<div class="cart"><a href="cart.html"></a><i class="icon-bag"></i><span class="count">3</span><span class="subtotal">Cotizaciones</span>
							<div class="toolbar-dropdown">
								<div class="dropdown-product-item"><span class="dropdown-product-remove"><i class="icon-cross"></i></span><a class="dropdown-product-thumb" href="shop-single.html"><img src="img/cart-dropdown/01.jpg" alt="Product"></a>
									<div class="dropdown-product-info"><a class="dropdown-product-title" href="shop-single.html">Unionbay Park</a><span class="dropdown-product-details">1 x $43.90</span></div>
								</div>
								<div class="dropdown-product-item"><span class="dropdown-product-remove"><i class="icon-cross"></i></span><a class="dropdown-product-thumb" href="shop-single.html"><img src="img/cart-dropdown/02.jpg" alt="Product"></a>
									<div class="dropdown-product-info"><a class="dropdown-product-title" href="shop-single.html">Daily Fabric Cap</a><span class="dropdown-product-details">2 x $24.89</span></div>
								</div>
								<div class="dropdown-product-item"><span class="dropdown-product-remove"><i class="icon-cross"></i></span><a class="dropdown-product-thumb" href="shop-single.html"><img src="img/cart-dropdown/03.jpg" alt="Product"></a>
									<div class="dropdown-product-info"><a class="dropdown-product-title" href="shop-single.html">Haan Crossbody</a><span class="dropdown-product-details">1 x $200.00</span></div>
								</div>
								<div class="toolbar-dropdown-group">
									<div class="column"><span class="text-lg">Total:</span></div>
									<div class="column text-right"><span class="text-lg text-medium">$289.68&nbsp;</span></div>
								</div>
								<div class="toolbar-dropdown-group">
									<div class="column"><a class="btn btn-sm btn-block btn-secondary" href="cart.html">View Cart</a></div>
									<div class="column"><a class="btn btn-sm btn-block btn-success" href="checkout-address.html">Checkout</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
