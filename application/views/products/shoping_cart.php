<div id="wrapper" ng-app="myApp">
   <div id="page-wrapper" ng-controller="UsuariosController as vm">
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
            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between">
              <div class="step {{vm.step_one}}">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-cart"></i></div>
                </div>
                <h4 class="step-title">Selección productos</h4>
              </div>
              <div class="step {{vm.step_two}}">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-config"></i></div>
                </div>
                <h4 class="step-title">Generar solicitud cotización</h4>
              </div>
            </div>        
        <div class="table-responsive shopping-cart" ng-show= "vm.mostrar_items_factura">
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
        <div ng-show="vm.mostrar_datos_factura_persona" class="col-xl-12 col-lg-12">
            <h4>Datos Cotización</h4>
            <hr class="padding-bottom-1x">
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="checkout-fn">Nombre</label>
                  <input class="form-control" type="text" id="checkout-fn">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="checkout-ln">Apellido</label>
                  <input class="form-control" type="text" id="checkout-ln">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="checkout-email">Rut</label>
                  <input class="form-control" type="email" id="checkout-email">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="checkout-email">Correo electrónico</label>
                  <input class="form-control" type="email" id="checkout-email">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="checkout-phone">Telefono</label>
                  <input class="form-control" type="text" id="checkout-phone">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="checkout-phone">Dirección</label>
                  <input class="form-control" type="text" id="checkout-phone">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="checkout-city">Región</label>
                  <select class="form-control" name="tipo_documento" ng-change="vm.cargar_comunas()" ng-options="region.nombre for region in vm.regiones track by region.id_region" ng-model="vm.cotizacion.region" title="Seleccione región" required>
                  	<option>Seleccione comuna</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="checkout-city">Comuna</label>
                  <select class="form-control" name="tipo_documento" ng-options="comuna.nombre for comuna in vm.comunas track by comuna.id_comuna" ng-model="vm.cotizacion.comuna" title="Seleccione comuna" required>
                  	<option>Seleccione comuna</option>
                  </select>
                </div>
              </div>
            </div>
            <hr class="padding-bottom-1x">
          </div>
        <div class="shopping-cart-footer">
          <div class="column"><a class="btn btn-outline-secondary" href="<?php echo base_url(); ?>products/"><i class="icon-arrow-left"></i>&nbsp;Volver a Productos</a></div>
          <div class="column">
            <button class="btn btn-warning" ng-show="vm.mostrar_datos_factura_persona" ng-click = "vm.volver_items()">Volver a Items</button>
          	<button class="btn btn-primary" href="<?php echo base_url(); ?>products/shoping_cart" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Your cart" data-toast-message="is updated successfully!">Actualizar</button>
          	<button class="btn btn-success" ng-show="vm.mostrar_items_factura" ng-click = "vm.ingresar_datos()" >Siguiente</button>
          	<button class="btn btn-success" ng-show="vm.mostrar_datos_factura_persona" ng-click = "vm.generar_orden_cotizacion()" >Solicitar Cotización</button>
          	</div>
        </div>
      </div>
	</div>
</div>    
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/angular.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/angular-touch.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/angular-animate.min.js"></script>

  <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular-messages.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/rut.js"></script>
  , 
  <script src="<?php echo base_url(); ?>assets/js/angular-flash.js"></script>
<script>
(function(){
    'use strict';
    angular.module('myApp', ['ngAnimate','ngMessages', 'platanus.rut']);
    angular.module('myApp').controller('UsuariosController', UsuariosController);


    UsuariosController.$inject = ['$http', '$timeout'];
    function UsuariosController($http){
        var vm = this;

        vm.sortKey = false;
        vm.reverse = false;
        vm.step_one = 'completed';
        vm.step_two = '';
        vm.mostrar_datos_factura_persona = false;
        vm.mostrar_items_factura  = true;
        vm.regiones = JSON.parse('<?php echo $regiones; ?>');

        vm.usuario = {};

        var config = {
            headers : {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        }
      vm.ingresar_datos       = ingresar_datos;  
      vm.guardar_usuario      = guardar_usuario;
      vm.validar_formulario   = validar_formulario;
      vm.cargar_comunas       = cargar_comunas;
      vm.volver_items         = volver_items;

      //vm.usuario.color = '#dfdfdf';
      vm.customSettings = {
        control: 'brightness',
        theme: 'bootstrap',
        position: 'top left'
      };



    function validar_formulario(userForm){
      var error =false;

      if(userForm.especialidad.$invalid){
        userForm.especialidad.$touched = true;
        error = true;
      }
      if(userForm.nombres.$invalid){
        userForm.nombres.$touched = true;
        error = true;
      }
      if(userForm.apellido_paterno.$invalid){
        userForm.apellido_paterno.$touched = true;
        error = true;
      }
      if(userForm.nombre_usuario.$invalid){
        userForm.nombre_usuario.$touched = true;
        error = true;
      }
      if(userForm.password.$invalid){
        userForm.password.$touched = true;
        error = true;
      }
      if(userForm.email.$invalid){
        userForm.email.$touched = true;
        error = true;
      }

      if(!error){
        guardar_usuario();
      }

    }

    function ingresar_datos(){
    	vm.mostrar_items_factura  = false;
    	vm.mostrar_datos_factura_persona = true;
    	vm.step_one = '';
      vm.step_two = 'completed';

    }

    function volver_items(){
    	vm.mostrar_items_factura  = true;
    	vm.mostrar_datos_factura_persona = false;
    	vm.step_one = 'completed';
      vm.step_two = '';

    }


    function guardar_usuario(){
          var data = $.param({
          usuario: vm.usuario
      });

      $http.post('<?php echo base_url(); ?>usuarios/update_usuario', data, config)
          .then(function(response){
              if(response.data !== 'false'){
                if(response.data){
                 console.log(response.data);
                 // window.location ='<?php echo base_url(); ?>usuarios/listado_usuarios/';

                }
              }
          },
          function(response){
              console.log("error al guardar stock.");
          }
      );
     }
     function cargar_comunas(){
          var data = $.param({
          region: vm.paciente.region.id_region,
      });
      //reinicio el valor de la comuna seleccionada para el paciente
      vm.paciente.comuna = '';
      if(vm.paciente.region.id_region){

        $http.post('<?php echo base_url(); ?>regiones/get_comunas_region', data, config)
            .then(function(response){
                if(response.data !== 'false'){
                  vm.comunas = response.data;
                }
            },
            function(response){
                console.log("error al obtener comunas.");
            }
        );
      }
     }
    }
})();

</script> 



