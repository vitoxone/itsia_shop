<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {


	public function index($category = null){
		$this->load->model('Products_model');

		$categories = [];
		$categories = $this->Products_model->get_categories();

		$data_header['categories'] = $categories;

		$products = [];
   	$products = $this->Products_model->get_products($category);
   	foreach ($products as $product) {
   		$product->images = $this->Products_model->get_images_product($product->id_product);
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

			$data['product'] = $product;

		$this->load->view('header', $data_header);
		$this->load->view('products/product_detail', $data);
		$this->load->view('footer');
	}
}
