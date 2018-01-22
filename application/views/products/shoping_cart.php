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
      <div class="container padding-bottom-3x mb-1">
        <div class="table-responsive shopping-cart">
          <table class="table">
            <thead>
              <tr>
                <th>Producto</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center"><a class="btn btn-sm btn-outline-danger" href="#">Borrar carro</a></th>
              </tr>
            </thead>
            <tbody>
<?php 
					if(!empty($quotation_request)):
						foreach ($quotation_request as $index => $product):
?>   
              <tr>
                <td>
                  <div class="product-item"><a class="product-thumb" href="<?php echo base_url(); ?>products/product_detail/<?php echo $product->slug?>"><img src="https://s3-us-west-1.amazonaws.com/itsiaproducts/<?php echo $product->images[0]->url?>" alt="Product"></a>
                    <div class="product-info">
                      <h4 class="product-title"><a href="<?php echo base_url(); ?>products/product_detail/<?php echo $product->slug?>"><?php echo $product->name?></a></h4><span><em>Tipo:</em> <?php echo $product->category_name_single ?></span>
                    </div>
                  </div>
                </td>
                <td class="text-center">
                  <div class="count-input">
                    <select class="form-control">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </td>
                <td class="text-center"><a class="remove-from-cart" href="#" data-toggle="tooltip" title="Remove item"><i class="icon-cross"></i></a></td>
              </tr>
<?php 
						endforeach;
					endif;
?>
            </tbody>
          </table>
        </div>
        <div class="shopping-cart-footer">
          <div class="column"><a class="btn btn-outline-secondary" href="shop-grid-ls.html"><i class="icon-arrow-left"></i>&nbsp;Volver a Productos</a></div>
          <div class="column"><a class="btn btn-primary" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Your cart" data-toast-message="is updated successfully!">Actualizar</a><a class="btn btn-success" href="checkout-address.html">Solicitar Cotización</a></div>
        </div>
      </div>
