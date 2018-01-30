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
              <div class="step {{vm.step_three}}">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-check"></i></div>
                </div>
                <h4 class="step-title">Resultado</h4>
              </div>
            </div>        
        <div class="table-responsive shopping-cart" ng-show= "vm.mostrar_items_cotizacion">
          <table class="table">
            <thead>
              <tr>
                <th>Producto</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center"><a class="btn btn-sm btn-outline-danger" ng-click = "vm.borrar_carro()">Borrar carro</a></th>
              </tr>
            </thead>
            <tbody>
<?php 
					if(!empty($quotation_request)):
?>   
              <tr ng-repeat="quotation_request in vm.quotation_requests">
                <td>
                  <div class="product-item"><a class="product-thumb" href="<?php echo base_url(); ?>products/product_detail/{{quotation_request.slug}}"><img src="https://s3-us-west-1.amazonaws.com/itsiaproducts/{{quotation_request.image_name}}" alt="Product"></a>
                    <div class="product-info">
                      <h4 class="product-title"><a href="<?php echo base_url(); ?>products/product_detail/{{quotation_request.slug}}">{{quotation_request.name}}</a></h4><span><em>Tipo:</em> {{quotation_request.category_name}}</span>
                    </div>
                  </div>
                </td>
                <td class="text-center">
                  <div class="count-input">
											<input ng-model="quotation_request.cantidad" class="form-control"/>
                  </div>
                </td>
                <td class="text-center"><a class="remove-from-cart" href="#" data-toggle="tooltip" title="Remove item"><i class="icon-cross"></i></a></td>
              </tr>
<?php 
					endif;
?>
            </tbody>
          </table>
        </div>
        <div ng-show="vm.mostrar_datos_cotizacion_persona" class="col-xl-12 col-lg-12">
	        <form name="userForm" novalidate> 
	            <h4>Datos Cotización</h4>
	            <hr class="padding-bottom-1x">
	            <div class="row">
                <div class="col-md-4">
                  <div class="form-group required" ng-class="{ 'has-error': userForm.nombres.$touched && userForm.nombres.$invalid }">
                    <label class="col-lg-3" for="content"><p>Nombre<bold style="color:  red;">*</bold></p></label>
                    <div class="col-lg-9">
                        <input ng-model = "vm.datos_solicitante.nombre" name="nombres" class="form-control" required/>
                        <div class="help-block" ng-messages="userForm.nombres.$error" ng-if="userForm.nombres.$touched" style="color: red;">
                        <p ng-message="required">Campo requerido</p>
                      </div>
       
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group required" ng-class="{ 'has-error': userForm.apellido_paterno.$touched && userForm.apellido_paterno.$invalid }">
                    <label class="col-lg-3" for="content"><p>Apellido<bold style="color:  red;">*</bold></p></label>
                    <div class="col-lg-9">
                        <input ng-model = "vm.datos_solicitante.apellido" name="apellido_paterno" class="form-control" required/>
                        <div class="help-block" ng-messages="userForm.apellido_paterno.$error" ng-if="userForm.apellido_paterno.$touched" style="color: red;">
                        <p ng-message="required">Campo requerido</p>
                      </div>
       
                    </div>
                  </div>
                </div>
	               <div class="col-md-4">
	                <div class="form-group required" ng-class="{ 'has-error': userForm.rut.$touched && userForm.rut.$invalid}">
	                  <label class="col-lg-3" for="content"><p>Rut<bold style="color:  red;">*</bold></p></label>
	                  <div class="col-lg-9">
	                      <input ng-rut rut-format="live" ng-model = "vm.datos_solicitante.rut" name="rut" class="form-control" style="text-transform:uppercase" required/>
	                      <div class="help-block" ng-messages="userForm.rut.$error" ng-if="userForm.rut.$touched" style="color: red;">
	                      <p ng-message="required">Campo requerido</p>
	                      <p ng-message="rut">Rut invalido</p>
	                    </div>
	     
	                  </div>
	                </div>
	              </div>
	            </div>
	            <div class="row">
	              <div class="col-md-4">
	                <div class="form-group required" ng-class="{ 'has-error': userForm.email.$touched && userForm.email.$invalid }">
	                  <label class="col-lg-3"><p>Email<bold style="color:  red;">*</bold></p></label>
	                  <div class="col-lg-9">
	                    <input type="email" name="email" class="form-control" ng-model="vm.datos_solicitante.email" required>  
	                    <div class="help-block" ng-messages="userForm.email.$error" ng-if="userForm.email.$touched" style="color: red;">
	                      <p ng-message="required">Campo requerido</p>
	                      <p ng-message="email">Ingrese email válido</p>
	                    </div>
	                  </div>
	                </div>
	              </div>
	              <div class="col-sm-4">
	                <div class="form-group">
	                  <label for="checkout-phone"><p>Telefono<bold></bold></p></label>
	                  <input ng-model = "vm.datos_solicitante.telefono" class="form-control" type="number" id="checkout-phone" ng-maxlength="10">
	                </div>
	              </div>
	            </div>
	            <div class="row">
	              <div class="col-sm-4">
	                <div class="form-group">
	                  <label for="checkout-phone">Dirección</label>
	                  <input ng-model = "vm.datos_solicitante.direccion" class="form-control" type="text" id="checkout-address">
	                </div>
	              </div>
	              <div class="col-sm-4">
	                <div class="form-group">
	                  <label for="checkout-city">Región</label>
	                  <select class="form-control" name="tipo_documento" ng-change="vm.cargar_comunas()" ng-options="region.nombre for region in vm.regiones track by region.id_region" ng-model = "vm.datos_solicitante.region">
	                  	<option>Seleccione Region</option>
	                  </select>
	                </div>
	              </div>
	              <div class="col-sm-4">
	                <div class="form-group">
	                  <label for="checkout-city">Comuna</label>
	                  <select class="form-control" name="tipo_documento" ng-options="comuna.nombre for comuna in vm.comunas track by comuna.id_comuna" ng-model = "vm.datos_solicitante.comuna" title="Seleccione comuna">
	                  	<option>Seleccione comuna</option>
	                  </select>
	                </div>
	              </div>
	            </div>
	            <hr class="padding-bottom-1x">
            </form>
          </div>
	       <div ng-show="vm.mostrar_resultado" class="container padding-bottom-3x mb-2">
	        <div class="card text-center">
	          <div class="card-block padding-top-2x">
	            <h3 class="card-title">Gracias por la solicitud!</h3>
	            <p class="card-text">Hemos recibido su solicitud de cotización.</p>
	            <p class="card-text">Nos comunicaremos a la brevedad  con usted para enviarle la información.</p>
	          </div>
	        </div>
	      </div>
        <div class="shopping-cart-footer">
          <div class="column"><a class="btn btn-outline-secondary" href="<?php echo base_url(); ?>products/"><i class="icon-arrow-left"></i>&nbsp;Volver a Productos</a></div>
          <div class="column">
            <button class="btn btn-warning" ng-show="vm.mostrar_datos_cotizacion_persona" ng-click = "vm.volver_items()">Volver a Items</button>
          	<button class="btn btn-success" ng-show="vm.mostrar_items_cotizacion && vm.quotation_requests.length > 0" ng-click = "vm.ingresar_datos()" >Siguiente</button>
          	<button class="btn btn-success" ng-show="vm.mostrar_datos_cotizacion_persona" ng-click="vm.validar_formulario(userForm)" >Solicitar Cotización</button>
          	</div>
        </div>
      </div>
	</div>
</div>    
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/angular.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/angular-touch.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/angular-animate.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular-flash.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular-messages.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/rut.js"></script>
  
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
        vm.mostrar_datos_cotizacion_persona = false;
        vm.mostrar_items_cotizacion  = true;
        vm.mostrar_resultado = false;
        vm.regiones = JSON.parse('<?php echo $regiones; ?>');
        vm.quotation_requests = JSON.parse('<?php echo $quotation_request; ?>');

        vm.usuario = {};

        var config = {
            headers : {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        }
      vm.ingresar_datos       = ingresar_datos;  
      vm.guardar_solicitud_cotizacion      = guardar_solicitud_cotizacion;
      // vm.validar_formulario   = validar_formulario;
      vm.cargar_comunas       = cargar_comunas;
      vm.volver_items         = volver_items;
      vm.validar_formulario = validar_formulario;
      vm.borrar_carro = borrar_carro;

      //vm.usuario.color = '#dfdfdf';
      vm.customSettings = {
        control: 'brightness',
        theme: 'bootstrap',
        position: 'top left'
      };

    function validar_formulario(userForm){
      var error =false;


      if(userForm.rut.$invalid){
        userForm.rut.$touched = true;
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
      if(userForm.email.$invalid){
        userForm.email.$touched = true;
        error = true;
      }

      if(!error){
       guardar_solicitud_cotizacion();
      }

    }

    function ingresar_datos(){
    	vm.mostrar_items_cotizacion  = false;
    	vm.mostrar_datos_cotizacion_persona = true;
    	vm.mostrar_resultado = false;
    	vm.step_one = '';
      vm.step_two = 'completed';
      vm.step_three = '';
    }

    function mostrar_result(){
    	vm.mostrar_items_cotizacion  = false;
    	vm.mostrar_datos_cotizacion_persona = false;
    	vm.mostrar_resultado = true;
    	vm.step_one = '';
      vm.step_two = '';
      vm.step_three = 'completed';
    }

    function volver_items(){
    	vm.mostrar_items_cotizacion  = true;
    	vm.mostrar_datos_cotizacion_persona = false;
    	vm.mostrar_resultado = false;
    	vm.step_one = 'completed';
      vm.step_two = '';
      vm.step_three = '';

    }



    function guardar_solicitud_cotizacion(){
          var data = $.param({
          products: vm.quotation_requests,
          datos_solicitante : vm.datos_solicitante
      });


      $http.post('<?php echo base_url(); ?>products/save_quotation_order', data, config)
          .then(function(response){
              if(response.data !== 'false'){
                if(response.data){
                 console.log(response.data);
                 mostrar_result();
                 // window.location ='<?php echo base_url(); ?>usuarios/listado_usuarios/';

                }
              }
          },
          function(response){
              console.log("error al guardar stock.");
          }
      );
     }

     function borrar_carro(){
        $http.post('<?php echo base_url(); ?>products/borrar_carro', config)
            .then(function(response){
                if(response.data !== 'false'){
                  vm.quotation_requests = response.data;
                }
            },
            function(response){
                console.log("error al obtener comunas.");
            }
        );
     }
     function cargar_comunas(){
          var data = $.param({
          region: vm.datos_solicitante.region.id_region,
      });

      if(vm.datos_solicitante.region.id_region){

        $http.post('<?php echo base_url(); ?>products/get_comunas_region', data, config)
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



