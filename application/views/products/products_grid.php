
		<!-- Off-Canvas Wrapper-->
		<div class="offcanvas-wrapper">
			<!-- Page Title-->
			<div class="page-title">
				<div class="container">
					<div class="column">
						<h1>Listado de productos</h1>
					</div>
					<div class="column">
						<ul class="breadcrumbs">
							<li><a href="<?php echo base_url(); ?>home/#productos"?>Home</a>
							</li>
							<li class="separator">&nbsp;</li>
							<li>Listado de productos</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- Page Content-->
			<div class="container padding-bottom-5x mb-1">
				<div class="row">
					<!-- Products-->
					<div class="col-xl-12 col-lg-6 order-lg-6">
						<!-- Products Grid-->
						<div class="isotope-grid cols-5 mb-2">
							<div class="gutter-sizer"></div>
							<div class="grid-sizer"></div>

<?php 
					if(!empty($products)):
						foreach ($products as $index => $product):
?>   
								<div class="grid-item">
									<div class="product-card">
										<div class="product-badge text-danger"><?php echo $product->category_name_single ?></div><a class="product-thumb" href="<?php echo base_url(); ?>products/product_detail/<?php echo $product->slug?>"><img src="<?php echo base_url(); ?>assets/img/products/<?php echo $product->images[0]->url?>" alt="Product"></a>
										<h3 class="product-title"><a href="<?php echo base_url(); ?>products/product_detail/<?php echo $product->slug?>"><?php echo $product->name?></a></h3>
<?php             	if($product->show_value):
?>                    
 											<h4 class="product-price">
	                			$<?php echo $product->sell_value?>
	              			</h4>
<?php             	elseif ($product->show_value_iva):
?>
 											<h4 class="product-price">
	                			$<?php echo $product->sell_value_iva ?>
	              			</h4>
 <?php            	endif;
 ?>  
										<div class="product-buttons">
											<button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Cotizar</button>
										</div>
									</div>
								</div>
<?php 
						endforeach;
					endif;
?>

						</div>
						<!-- Pagination-->
						<nav class="pagination">
							<div class="column">
								<ul class="pages">
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li>...</li>
									<li><a href="#">12</a></li>
								</ul>
							</div>
							<div class="column text-right hidden-xs-down"><a class="btn btn-outline-secondary btn-sm" href="#">Next&nbsp;<i class="icon-arrow-right"></i></a></div>
						</nav>
					</div>
				</div>
			</div>
