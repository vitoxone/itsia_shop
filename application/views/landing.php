    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
      <!-- Page Content-->
      <!-- Main Slider-->
      <section class="hero-slider" style="background-image: url(<?php echo base_url(); ?>assets/img/main-bg.jpg);">
        <div class="owl-carousel large-controls dots-inside" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 7000 }">
<?php 
		foreach ($slider_products as $index => $slider_product):
?>  
          <div class="item">
            <div class="container padding-top-3x">
              <div class="row justify-content-center align-items-center">
                <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
                  <div class="from-bottom"><img class="d-inline-block w-150 mb-4" src="<?php echo base_url(); ?>assets/img/brands/<?php echo $slider_product->img_name?>" alt="Puma">
                    <div class="h2 text-body text-normal mb-2 pt-1"><?php echo $slider_product->category_name_single ?> <?php echo $slider_product->name ?></div>
<?php                if($slider_product->show_value):
?>                    
                    	<div class="h2 text-body text-normal mb-4 pb-1"> <span class="text-bold">$<?php echo $slider_product->sell_value ?> + IVA</span></div>
<?php                elseif ($slider_product->show_value_iva):
?>
                    	<div class="h2 text-body text-normal mb-4 pb-1"> <span class="text-bold">$<?php echo $slider_product->sell_value_iva ?></span></div>
 <?php               endif;
 ?>             
                  </div><a class="btn btn-primary scale-up delay-1" href="<?php echo base_url(); ?>products/add_to_cart/<?php echo $slider_product->slug?>">Cotizar ahora</a>
                </div>
                <div class="col-md-6 padding-bottom-2x mb-3"><img class="d-block mx-auto" src="https://s3-us-west-1.amazonaws.com/itsiaproducts/<?php echo $slider_product->images[0]->url?>" alt="Puma Backpack"></div>
              </div>
            </div>
          </div>
<?php 
		endforeach;
?>          
        </div>
      </section>
      <!-- Featured Products Carousel-->
      <section class="container padding-top-3x padding-bottom-3x" id="productos">
        <h3 class="text-center mb-30">Productos destacados</h3>
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
<?php 
		foreach ($products as $index => $product):
?>          
	          <!-- Product-->
	          <div class="grid-item">
	            <div class="product-card">
	              <div class="product-badge text-danger"><?php echo $product->category_name_single ?></div><a class="product-thumb" href="<?php echo base_url(); ?>products/product_detail/<?php echo $product->slug?>"><img src="https://s3-us-west-1.amazonaws.com/itsiaproducts/<?php echo $product->images[0]->url?>" alt="Product"></a>
	              <h3 class="product-title"><a href="<?php echo base_url(); ?>products/product_detail/<?php echo $product->slug?>"><?php echo $product->name ?></a></h3>
 	              
<?php             if($slider_product->show_value):
?>                    
 					<h4 class="product-price">
	                	$<?php echo $slider_product->sell_value?>
	              	</h4>
<?php             elseif ($slider_product->show_value_iva):
?>
 					<h4 class="product-price">
	                	$<?php echo $slider_product->sell_value_iva ?>
	              	</h4>
 <?php            endif;
 ?>  
	              <div class="product-buttons">
	                <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Cotizar</button>
	              </div>
	            </div>
	          </div>
<?php 
		endforeach;
?>	               
        </div>
      </section>
      <section class="bg-faded padding-top-3x padding-bottom-3x">
        <div class="container">
          <h3 class="text-center mb-30 pb-2">Nuestras marcas</h3>
          <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;autoplay&quot;: false, &quot;autoplayTimeout&quot;: 4000, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:2}} }"><img class="d-block w-16 opacity-75" src="<?php echo base_url(); ?>assets/img/brands/ricoh_logo.png" alt="Ricoh">     <img class="d-block w-16 opacity-75 m-auto" src="<?php echo base_url(); ?>assets/img/brands/kyocera_logo.png" alt="Brooks"></div>        </div>
      </section>
   
