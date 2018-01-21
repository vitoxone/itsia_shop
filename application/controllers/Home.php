<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{

		$this->load->model('Products_model');

		$categories = [];
   		$categories = $this->Products_model->get_categories();

   		$data_header['categories'] = $categories;

    	$products = [];
   		$products = $this->Products_model->get_products();

   		foreach ($products as $product) {
   			$product->images = $this->Products_model->get_images_product($product->id_product);
   		}
   		$data['products'] = $products;

   		$slider_products = [];
   		$slider_products = $this->Products_model->get_slider_products();

   		foreach ($slider_products as $slider_product) {
   			$slider_product->images = $this->Products_model->get_images_product($slider_product->id_product);
   		}
   		$data['slider_products'] = $slider_products;

		$this->load->view('header', $data_header);
		$this->load->view('landing', $data);
		$this->load->view('footer');
	}

	// public function listado_productos()
 //    {

 //    	$this->load->model('Products_model');

 //    	$products = [];
 //   		$products = $this->Products_model->get_products();


 //   		$data['products'] = $products;

 //   		var_dump($data['products']); die;

 //   		$this->load->view('header');
	// 	$this->load->view('landing', $data);
	// 	$this->load->view('footer');
 //    }
}
