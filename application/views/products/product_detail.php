    <div class="offcanvas-wrapper">
      <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>Detalle <?php echo $product->category_name_single; ?></h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="<?php echo base_url(); ?>home/#productos"?>Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Detalle producto</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1">
        <div class="row">
          <!-- Poduct Gallery-->
          <div class="col-md-6">
            <div class="product-gallery"><span class="product-badge text-danger"></span>
              <div class="gallery-wrapper">
<?php         if(!empty($product->images)): 
								foreach ($product->images as $i => $image):
									 ($i == 0) ? $class = 'active' : $class = '';
?>									
	                <div class="gallery-item <?php echo $class; ?>"><a href="https://s3-us-west-1.amazonaws.com/itsiaproducts/<?php echo $image->url?>" data-hash="one" data-size="1000x667"></a></div>
<?php           endforeach;
							endif;
?>
	              </div>
              <div class="product-carousel owl-carousel">
<?php         if(!empty($product->images)): 
								foreach ($product->images as $j => $image):
									 ($j == 0) ? $class = 'active' : $class = '';
?>	
                <div data-hash="<?php echo $j; ?>"><img src="https://s3-us-west-1.amazonaws.com/itsiaproducts/<?php echo $image->url?>" alt="Product"></div>
<?php           endforeach;
							endif;
?>
              </div>
              <ul class="product-thumbnails">
<?php         if(!empty($product->images)): 
								foreach ($product->images as $k => $image):
									 ($k == 0) ? $class = 'active' : $class = '';
?>
                <li class="<?php echo $class; ?>"><a href="#<?php echo $k ?>"><img src="https://s3-us-west-1.amazonaws.com/itsiaproducts/<?php echo $image->url?>" alt="Product"></a></li>

<?php           endforeach;
							endif;
?>
              </ul>
            </div>
          </div>
          <!-- Product Info-->
          <div class="col-md-6">
            <div class="padding-top-2x mt-2 hidden-md-up"></div>
            <h2 class="padding-top-1x text-normal"><?php echo $product->category_name_single ?> <?php echo $product->name ?></h2>

<?php       if($product->show_value):
?>     
	            <span class="h2 d-block">
	              <?php echo $product->sell_value ?> + IVA
	             </span>               
<?php       elseif ($product->show_value_iva):
?>
							<span class="h2 d-block">
	              <?php echo $product->sell_value_iva ?>
	             </span>
 <?php      endif;
 ?>  
            <p><?php echo $product->description ?></p>
            <div class="row margin-top-1x">
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="quantity">Cantidad</label>
                  <select class="form-control" id="quantity">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="pt-1 mb-2"><span class="text-medium">SKU:</span> #21457832</div>
            <div class="padding-bottom-1x mb-2"><span class="text-medium">Categoria:&nbsp;</span><a class="navi-link" href="<?php echo base_url(); ?>products/<?php echo $product->category_slug; ?>"><?php echo $product->category_name?></a></div>
            <hr class="mb-3">
            <div class="d-flex flex-wrap justify-content-between">
              <div class="sp-buttons mt-2 mb-2" style="padding: 0px 0px 0px 70%;">
              	<a class="btn btn-primary scale-up delay-1" href="<?php echo base_url(); ?>products/add_to_cart/<?php echo $product->slug?>">Cotizar ahora</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row padding-top-3x mb-3">
          <div class="col-lg-10 offset-lg-1">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link active" href="#description" data-toggle="tab" role="tab">Descripción</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="description" role="tabpanel">
                <p><?php echo $product->full_description; ?></p>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe width="420" height="315" src="<?php echo $product->url_video; ?>" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      
