<?php

class Products_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_categories(){

        $this->db
            ->select('c.*')
            ->from('categories c')
            ->where('c.deleted', 0)
            ->where('c.active', 1);

        $consulta = $this->db->get();

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return false;
        }
    
   }
   public function get_products($category = null){

   	if($category){
        $this->db
            ->select('p.*, c.name as category_name, c.single_name as category_name_single')
            ->from('products p')
            ->join('brands b', 'p.brand = b.id_brand')
            ->join('categories c', 'p.category = c.id_category')
            ->where('c.slug', $category)
            ->where('p.deleted', 0)
            ->where('b.deleted', 0)
            ->where('p.active', 1)
            ->where('b.active', 1);

   	}else{
   		$this->db
            ->select('p.*, c.name as category_name, c.single_name as category_name_single')
            ->from('products p')
            ->join('brands b', 'p.brand = b.id_brand')
            ->join('categories c', 'p.category = c.id_category')
            ->where('p.deleted', 0)
            ->where('b.deleted', 0)
            ->where('p.active', 1)
            ->where('b.active', 1);
   	}
        $consulta = $this->db->get();

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return false;
        }
    
   }
   public function get_product_by_slug($slug = null){

        $this->db
            ->select('p.*, c.name as category_name, c.single_name as category_name_single, c.slug as category_slug, b.img_name as image_brand')
            ->from('products p')
            ->join('brands b', 'p.brand = b.id_brand')
            ->join('categories c', 'p.category = c.id_category')
            ->where('p.deleted', 0)
            ->where('b.deleted', 0)
            ->where('p.active', 1)
            ->where('b.active', 1);

        $consulta = $this->db->get();

        if ($consulta->num_rows() > 0) {
            return $consulta->row();
        } else {
            return false;
        }
    
   }
   public function get_slider_products(){

        $this->db
            ->select('p.*, c.name as category_name, c.single_name as category_name_single, b.img_name')
            ->from('slider_product sp')
            ->join('products p', 'sp.product = p.id_product')
            ->join('brands b', 'p.brand = b.id_brand')
            ->join('categories c', 'p.category = c.id_category')
            ->where('p.deleted', 0)
            ->where('b.deleted', 0)
            ->where('p.active', 1)
            ->where('b.active', 1)
            ->where('sp.active', 1)
            ->where('sp.deleted', 0)
            ->order_by('sp.order', 'ASC');

        $consulta = $this->db->get();

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return false;
        }
    
   }

   public function get_images_product($id_product){

        $this->db
            ->select('i.name, i.url, ip.order')
            ->from('image_product ip')
            ->join('images i', 'ip.image = i.id_image')
            ->join('products p', 'ip.product = p.id_product')
            ->where('ip.product', $id_product)
            ->where('ip.deleted', 0)
            ->where('i.deleted', 0)
            ->where('i.active', 1)
            ->where('ip.active', 1)
            ->where('p.deleted', 0);

        $consulta = $this->db->get();

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return false;
        }
    
   }

}
