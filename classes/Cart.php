<?php 
$filepath = realpath(dirname(__FILE__));
require_once ($filepath.'/../lib/Database.php');
require_once ($filepath.'/../helpers/Format.php');
?>
<?php
class Cart
 {
 	private $db;
	private $fm;

  public function __construct() {
     $this->db = new Database();
     $this->fm = new Format(); 
      }

      public function addToCart($quantity,$Delivery, $id){

      		$quantity = $this->fm->validation($quantity);
         $Delivery = $this->fm->validation($Delivery);
     	$quantity = mysqli_real_escape_string($this->db->link, $quantity);
      $Delivery = mysqli_real_escape_string($this->db->link, $Delivery);
     	$productId = mysqli_real_escape_string($this->db->link, $id);
     	$sId = session_id();

     	$squery = "SELECT * FROM tbl_product WHERE productId = '$productId'";
     	$result = $this->db->select($squery)->fetch_assoc();

     	$productName = $result['productName'];
     	$price = $result['price'];
     	$image = $result['image'];


      $chquery  = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND sId = '$sId'";
       $getPro = $this->db->select($chquery);
       if ($getPro) {
        $msg = "Product Already Added !";
        return $msg;
       }else{

$query = "INSERT INTO tbl_cart(sId, productId, productName, price, quantity, image, Delivery) VALUES('$sId' , '$productId' , '$productName',  '$price', '$quantity', '$image', '$Delivery')";
    $inserted_row = $this->db->insert($query);
if($inserted_row){header("Location:cart.php");
}else{header("Location:404.php");
  		}
      }
}
      public function getCartProduct(){

        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE  sId = '$sId'";
 $result = $this->db->select($query);
 return $result;
      }

      public function updateCartQuantity($cartId, $quantity){

         $cartId = mysqli_real_escape_string($this->db->link, $cartId);
          $quantity = mysqli_real_escape_string($this->db->link, $quantity);
           $query =  "UPDATE tbl_cart
       SET
       quantity = '$quantity'
       WHERE cartId = '$cartId'";
       $updated_row = $this->db->update($query);
       if($updated_row)
       {
       header("Location:cart.php");
      } else {
        $msg ="<span class='error'>Quantity Not Updated .</span>";
        return $msg;
      }
      }

      public function updateCartDelivery($cartId, $selected_val){

         $cartId = mysqli_real_escape_string($this->db->link, $cartId);
          $quantity = mysqli_real_escape_string($this->db->link, $selected_val);
           $query =  "UPDATE tbl_cart
       SET
       Delivery = '$selected_val'
       WHERE cartId = '$cartId'";
       $updated_row = $this->db->update($query);
       if($updated_row)
       {
       header("Location:cart.php");
      } else {
        $msg ="<span class='error'>Delivery Not Updated .</span>";
        return $msg;
      }
      }

      public function delProductByCart($delId){
        $delId = mysqli_real_escape_string($this->db->link, $delId);
         $query = "DELETE FROM tbl_cart WHERE cartId = '$delId'";
  $deldata = $this->db->delete($query);
  if ($deldata) {
   echo "<script>window.location = 'cart.php';</script>";
  } else{
    $msg ="<span class='error'>Product  net deleted.</span>";
        return $msg;
  }
      }

       public function checkCartTable(){

   $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE  sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
       }
       public function delCustomerCart(){
        $sId = session_id();
        $query = "DELETE FROM tbl_cart WHERE sId='$sId'";
        $this->db->delete($query);
       }
    public function orderProduct($cmrId){
 $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE  sId = '$sId'";
        $getPro = $this->db->select($query);
        if ($getPro) {
         while ($result = $getPro->fetch_assoc()) {
          $productId = $result['productId'];
           $productName = $result['productName'];
            $quantity = $result['quantity'];
             $price = $result['price'] * $quantity;
              $image = $result['image'];
               $Delivery = $result['Delivery'];
              $query = "INSERT INTO tbl_order(cmrId, productId, productName, quantity, price, image,Delivery) VALUES('$cmrId' , '$productId' , '$productName', '$quantity', '$price',  '$image', '$Delivery')";
    $inserted_row = $this->db->insert($query);
              
         }
        }

    }
    public function payableAmount($cmrId){

       $query = "SELECT price FROM tbl_order WHERE  cmrId = '$cmrId' AND date = now()";
        $result = $this->db->select($query);
        return $result;
    }
     public function totalquantity($cmrId){

       $query = "SELECT quantity FROM tbl_order WHERE  cmrId = '$cmrId' AND date = now()";
        $result = $this->db->select($query);
        return $result;
    }

    public function getOrderedProduct($cmrId){

 $query = "SELECT * FROM tbl_order WHERE  cmrId = '$cmrId' ORDER bY date DESC ";
        $result = $this->db->select($query);
        return $result;
    }  

    public function checkOrder($cmrId){

        $query = "SELECT * FROM tbl_order WHERE  cmrId = '$cmrId'";
        $result = $this->db->select($query);
        return $result;
    }

    public function getAllOrderProduct(){

       $query = "SELECT * FROM tbl_order ORDER BY date DESC";
        $result = $this->db->select($query);
        return $result;
    }

     public function getReport(){

        $sql = "SELECT  top 5 productName, sum(quantity) FROM tbl_order GROUP BY productName ORDER BY sum(quantity) desc";
$result = $this->db->select($sql);
        return $result;
    }

   

  public function delProductShifted($id, $time, $price){
   $id = mysqli_real_escape_string($this->db->link, $id);
        $date = mysqli_real_escape_string($this->db->link, $time);
         $price = mysqli_real_escape_string($this->db->link, $price);

         $query = "DELETE FROM tbl_order WHERE cmrId = '$id' AND date='$date' AND price = '$price'";
  $deldata = $this->db->delete($query);
  if ($deldata) {
    $msg = "<span class='success'>Data Deleted Successfully.</span>";
        return $msg;
  } else{
    $msg ="<span class='error'>Data  not deleted.</span>";
        return $msg;
  }
 }


  public function productShifted($id, $date, $price){

       $id = mysqli_real_escape_string($this->db->link, $id);
        $date = mysqli_real_escape_string($this->db->link, $date);
         $price = mysqli_real_escape_string($this->db->link, $price);

          $query =  "UPDATE tbl_order
       SET
       status = '1'
       WHERE cmrId = '$id' AND date='$date' AND price = '$price'";
       $updated_row = $this->db->update($query);
       if($updated_row)
       {
        $msg ="<span class='success'> Updated Successfully.</span>";
        return $msg;
      } else {
        $msg ="<span class='error'> Not Updated .</span>";
        return $msg;
    }
 }
 
 public function productShiftConfirm($id, $time, $price){
   $id = mysqli_real_escape_string($this->db->link, $id);
        $date = mysqli_real_escape_string($this->db->link, $time);
         $price = mysqli_real_escape_string($this->db->link, $price);

          $query =  "UPDATE tbl_order
       SET
       status = '2'
       WHERE cmrId = '$id' AND date='$date' AND price = '$price'";
       $updated_row = $this->db->update($query);
       if($updated_row)
       {
        $msg ="<span class='success'> Updated Successfully.</span>";
        return $msg;
      } else {
        $msg ="<span class='error'> Not Updated .</span>";
        return $msg;
    }
 }




 public function productShiftConfirmwaiter($id, $time, $price){
   $id = mysqli_real_escape_string($this->db->link, $id);
        $date = mysqli_real_escape_string($this->db->link, $time);
         $price = mysqli_real_escape_string($this->db->link, $price);

          $query =  "UPDATE tbl_order
       SET
       status = '3'
       WHERE cmrId = '$id' AND date='$date' AND price = '$price'";
       $updated_row = $this->db->update($query);
       if($updated_row)
       {
        $msg ="<span class='success'> Updated Successfully.</span>";
        return $msg;
      } else {
        $msg ="<span class='error'> Not Updated .</span>";
        return $msg;
    }
 }
}
?>