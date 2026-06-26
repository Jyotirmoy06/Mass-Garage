<?php 

include 'Database.php';

Class Product 
{

  public $db;
  
  public $product_id;

  public $product_details;
  public function __construct()
  {
      $this->db = new Database;
      $this->product_details = $this->db->read_query('product',[],['url_slug' => $_GET['product']]);
     
      $this->product_id = $this->product_details[0]['product_id'];

  }

public function get_product_images()
{
    $images = $this->db->read_query('image',[],['product_id' => $this->product_id]);

    return $images;
}

public function get_product_pricing()
{
    $pricing = $this->db->read_query('product_pricing',[],['product_id' => $this->product_id ]);
    return $pricing;
}

}