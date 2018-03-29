<?php 
$filepath = realpath(dirname(__FILE__));
require_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
//include_once '../lib/Database.php';
//include_once '../helpers/Format.php';
?>
<?php  
class Product
{
private $db;
	private $fm;

  public function __construct() {
     $this->db = new Database();
     $this->fm = new Format(); 
      }
      public function productInsert($data, $file){
       
     	 $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
     	 $catId = mysqli_real_escape_string($this->db->link, $data['catId']);
     	 $body = mysqli_real_escape_string($this->db->link, $data['body']);
     	 $price = mysqli_real_escape_string($this->db->link, $data['price']);
     	 $type = mysqli_real_escape_string($this->db->link, $data['type']);
      
      $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_temp = $file['image']['tmp_name'];


    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "uploads/".$unique_image;
    if($productName =="" || $catId =="" || $body =="" || $price =="" || $file_name == "" || $type =="") {

  		$msg ="<span class='error'>Fields must not be empty!.</span>";
  		return json_encode($msg); 
    }elseif($file_size >1048567){
        echo "<span class='error'>Image size should be less than 1MB</span>";
    }elseif(in_array($file_ext, $permited) === false){
      echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";

    } 
    else{

    	 move_uploaded_file($file_temp,  $uploaded_image);
    	 $query = "INSERT INTO tbl_product(productName,catId,body,price,image,type) VALUES('$productName' , '$catId' , '$body', '$price', ' $uploaded_image', '$type')";
    

    $inserted_row = $this->db->insert($query);
  		if($inserted_row){
  			$msg ="<span class='success'>Product Inserted Successfully.</span>";
  			return json_encode($msg);
  		}else{
$msg ="<span class='error'>Product Not Inserted Successfully.</span>";
  			return json_encode($msg);
  		}

}
      }


      public function getAllProduct()
      {

        $query = "SELECT tbl_product.*, tbl_category.catName 
              FROM tbl_product
              INNER JOIN tbl_category
              ON tbl_product.catId = tbl_category.catId
              ORDER BY tbl_product.productId DESC";

        $result = $this->db->select($query);
        return $result;
      }

      public function getProById($id)
      {
$query = "SELECT * FROM tbl_product WHERE  productId = '$id'";
 $result = $this->db->select($query);
 return $result;
      }
      public function productUpdate($data , $file, $id){

       $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
       $catId = mysqli_real_escape_string($this->db->link, $data['catId']);
       $body = mysqli_real_escape_string($this->db->link, $data['body']);
       $price = mysqli_real_escape_string($this->db->link, $data['price']);
       $type = mysqli_real_escape_string($this->db->link, $data['type']);
      
      $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_file['image']['name'];
    $file_size = $_file['image']['size'];
    $file_temp = $_file['image']['tmp_name'];


    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "uploads/".$unique_image;
    if($productName =="" || $catId =="" || $body =="" || $price =="" || $type =="") {

      $msg ="<span class='error'>Fields must not be empty!.</span>";
      return $msg; 
    } else{
        if (!empty($file_name)) {
        
        if($file_size >1048567){
        echo "<span class='error'>Image size should be less than 1MB</span>";
    }elseif(in_array($file_ext, $permited) === false){
      echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";

    }
    else{

       move_uploaded_file($file_temp, $uploaded_image);
       $query = "INSERT INTO tbl_product(productName,catId,body,price,image,type) VALUES('$productName' , '$catId' , '$body', '$price', '$uploaded_image', '$type')";
    $query = "UPDATE tbl_product
                 SET
                 productName = '$productName',
                 catId = '$catId',
                 body = '$body',
                 price = '$price',
                 image = '$uploaded_image',
                 type = '$type',
                 WHERE productId = '$id'";

    $updated_row = $this->db->update($query);
      if($inserted_row){
        $msg ="<span class='success'>Product updated Successfully.</span>";
        return $msg;
      }else{
$msg ="<span class='error'>Product Not updated Successfully.</span>";
        return $msg;
      }

}
} else {
 
      // $query = "INSERT INTO tbl_product(productName,catId,body,price,image,type) VALUES('$productName' , '$catId' , '$body', '$price', '$uploaded_image', '$type')";
    $query = "UPDATE tbl_product
                 SET
                 productName = '$productName',
                 catId = '$catId',
                 body = '$body',
                 price = '$price',
                 
                 type = '$type',
                 WHERE productId = '$id' ";

    $updated_row = $this->db->update($query);
      if($updated_row){
        $msg ="<span class='success'>Product Updated Successfully.</span>";
        return $msg;
      }else{
$msg ="<span class='error'>Product Not Updated Successfully.</span>";
        return $msg;
      }
 }
      }
      }

      public function getFeaturedProduct(){

         $query = "SELECT * FROM  tbl_product WHERE type='0' ORDER BY productId DESC LIMIT 4";
         $result = $this->db->select($query);
         return $result;
      }
      public function getNewProduct(){

         $query = "SELECT * FROM  tbl_product WHERE type='1' ORDER BY productId DESC LIMIT 4";
         $result = $this->db->select($query);
         return $result;
      }
      public function getSingleProduct($id){

        $query = "SELECT tbl_product.*, tbl_category.catName 
              FROM tbl_product
              INNER JOIN tbl_category
              ON tbl_product.catId = tbl_category.catId AND tbl_product.productId ='$id'";
              

        $result = $this->db->select($query);
        return $result; 
      }

      public function latestFromCake(){

         $query = "SELECT * FROM  tbl_product WHERE catId = '7' AND type='3' ORDER BY productId DESC LIMIT 1";
         $result = $this->db->select($query);
         return $result;
      }

      public function latestFromIce(){

         $query = "SELECT * FROM  tbl_product WHERE catId = '4' ORDER BY productId DESC LIMIT 1";
         $result = $this->db->select($query);
         return $result;
      }

      public function latestFromJuice(){

         $query = "SELECT * FROM  tbl_product WHERE catId = '5' ORDER BY productId DESC LIMIT 1";
         $result = $this->db->select($query);
         return $result;
      }

      public function latestFromFruit(){

         $query = "SELECT * FROM  tbl_product WHERE catId = '12' ORDER BY productId DESC LIMIT 1";
         $result = $this->db->select($query);
         return $result;
      }
      public function productByCat($id){
 $catId = mysqli_real_escape_string($this->db->link, $id);
        $query = "SELECT * FROM tbl_product WHERE  catId = '$catId'";
 $result = $this->db->select($query);
 return $result;
      }

      public function insertCompareData($cmprid, $cmrId){
 $cmrId = mysqli_real_escape_string($this->db->link, $cmrId);
  $productId = mysqli_real_escape_string($this->db->link, $cmprid);

   $query = "SELECT * FROM tbl_product WHERE productId = '$productId'";
        $result = $this->db->select($query)->fetch_assoc();
        if ($result) {
        
          $productId = $result['productId'];
           $productName = $result['productName'];
           
             $price = $result['price'] ;
              $image = $result['image'];
              $query = "INSERT INTO tbl_compare(cmrId, productId, productName, price, image) VALUES('$cmrId' , '$productId' , '$productName', '$price',  '$image')";
    $inserted_row = $this->db->insert($query);
    if ($inserted_row) {
      $msg ="<span class='success'>Added to compare.</span>";
        return $msg;
      }else{
$msg ="<span class='error'> Not Added</span>";
        return $msg;
    }

      }
    }
    
  }
  ?>
