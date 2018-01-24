<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	public $components = array('Cookie');

	public function index($category = null){
		$this->load->model('Products_model');

		$categories = [];
		$categories = $this->Products_model->get_categories();

		$data_header['categories'] = $categories;

		$products = [];
   	$products = $this->Products_model->get_products($category);
   	if(!empty($products)){
	   	foreach ($products as $product) {
	   		$product->images = $this->Products_model->get_images_product($product->id_product);
	   	}
	   }

   	$data['products'] = $products;

   	$this->load->view('header', $data_header);
		$this->load->view('products/products_grid', $data);
		$this->load->view('footer');
	}

	public function product_detail($slug = null)
	{

		$this->load->model('Products_model');

		$categories = [];
		$categories = $this->Products_model->get_categories();

		$data_header['categories'] = $categories;

		$product = [];
		$product = $this->Products_model->get_product_by_slug($slug);
		$product->images = $this->Products_model->get_images_product($product->id_product);
		$product->url_video =  str_replace("watch?v=", "embed/", $product->url_video);

			//$this->Products_model->update_visualization_number($product->id_product, (int)($product->views)+1);

		$data['product'] = $product;

		$this->load->view('header', $data_header);
		$this->load->view('products/product_detail', $data);
		$this->load->view('footer');
	}

	public function add_to_cart($slug = null){
		$this->load->model('Products_model');
		$this->load->helper('cookie');

		$product = [];
		$product_data = [];
		$product = $this->Products_model->get_product_by_slug($slug);

		$quotation_request_list = get_cookie('quotation_request');

		if(empty($quotation_request_list)){

			if($product){
					$product_list[] = array('id_product' => $product->id_product,  'cantidad' => 1);

	            $product_data = json_encode($product_list);
	        }
	    }
	    else{
	    	$quotation_request_list = json_decode($quotation_request_list);
	    	$produc_exist = false;
	    	foreach ($quotation_request_list as $item) {
	    		if($item->id_product == $product->id_product){
	    			$item->cantidad = $item->cantidad+1;
	    			$produc_exist = true;
	    		}
	    	}
	    	if(!$produc_exist){
	    		$quotation_request_list[] = array('id_product' => $product->id_product,  'cantidad' => 1);
	    	}
	    	$product_data = json_encode($quotation_request_list);
	    }

		set_cookie('quotation_request', $product_data, '3600'); 
		
		redirect('/products/shoping_cart/'); 
	}

	public function shoping_cart(){
		$this->load->model('Products_model');
		$this->load->helper('cookie');

		$categories = [];
		$categories = $this->Products_model->get_categories();

		$regiones = $this->Products_model->get_regiones();

     foreach($regiones as $region){
         $regiones_value[] = array('id_region' => $region->id_region, 'nombre' => $region->region);
     }

		$data_header['categories'] = $categories;

		$quotation_request_list = get_cookie('quotation_request');

		$quotation_request = json_decode($quotation_request_list);

		$product_list = [];
		if(!empty($quotation_request)){

			foreach ($quotation_request as $item) {
				$product = [];
				$product = $this->Products_model->get_product_by_id($item->id_product);
				$product->images = $this->Products_model->get_images_product($product->id_product);
				$product->url_video =  str_replace("watch?v=", "embed/", $product->url_video);
				$product->cantidad = $item->cantidad;

				$product_list[] = $product;
			}
		}

		$data['quotation_request'] = $product_list;
		$data['regiones']          = json_encode($regiones_value);

		$this->load->view('header', $data_header);
		$this->load->view('products/shoping_cart', $data);
		$this->load->view('footer');
	}

	public function shoping_cart_delete(){
			delete_cookie('quotation_request');

	}

	/**
	 * Funcion que devuelve un array con los valores:
	 *  os => sistema operativo
	 *  browser => navegador
	 *  version => version del navegador
	 */
	function detect()
	{
	    $browser=array("IE","OPERA","MOZILLA","NETSCAPE","FIREFOX","SAFARI","CHROME");
	    $os=array("WIN","MAC","LINUX");
	 
	    # definimos unos valores por defecto para el navegador y el sistema operativo
	    $info['browser'] = "OTHER";
	    $info['os'] = "OTHER";
	 
	    # buscamos el navegador con su sistema operativo
	    foreach($browser as $parent)
	    {
	        $s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
	        $f = $s + strlen($parent);
	        $version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
	        $version = preg_replace('/[^0-9,.]/','',$version);
	        if ($s)
	        {
	            $info['browser'] = $parent;
	            $info['version'] = $version;
	        }
	    }
	 
	    # obtenemos el sistema operativo
	    foreach($os as $val)
	    {
	        if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),$val)!==false)
	            $info['os'] = $val;
	    }
	 
	    # devolvemos el array de valores
	    return $info;
	}
}
