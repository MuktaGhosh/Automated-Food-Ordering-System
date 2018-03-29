<?php 
$filepath = realpath(dirname(__FILE__));
require_once ($filepath.'/../lib/Database.php');
require_once ($filepath.'/../helpers/Format.php');
?>
<?php
ob_start();
 class Customer
 {
 	private $db;
	private $fm;

  public function __construct() {
     $this->db = new Database();
     $this->fm = new Format(); 
      }
      public function customerRegistration($data){

     	 $name = mysqli_real_escape_string($this->db->link, $data['name']);
       $address = mysqli_real_escape_string($this->db->link, $data['address']);
     	 $city = mysqli_real_escape_string($this->db->link, $data['city']);
     	 $country = mysqli_real_escape_string($this->db->link, $data['country']);
     	 $zip = mysqli_real_escape_string($this->db->link, $data['zip']);
      $pass = mysqli_real_escape_string($this->db->link, $data['pass']);
     	 $email = mysqli_real_escape_string($this->db->link, $data['email']);
     	 $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
     	

     	  if($name =="" || $address =="" || $city =="" || $country =="" || $zip == "" || $pass =="" || $email =="" || $phone =="" ) {

  		$msg ="<span class='error'>Fields must not be empty!.</span>";
  		return $msg; 
    }
    $mailquery = "SELECT *FROM tbl_customer WHERE email='$email' LIMIT 1";
    $mailchk = $this->db->select($mailquery);
    if($mailchk != false)
    {
    	$msg ="<span class='error'>Mail already exist!.</span>";
  		return $msg; 
    }
    else{
    	 
    	 $query = "INSERT INTO tbl_customer(name,address,city,country,zip,pass,email,phone) VALUES('$name' ,'$address' ,'$city' ,'$country' , '$zip' , '$pass', '$email', '$phone')";
    

    $inserted_row = $this->db->insert($query);
  		if($inserted_row){
  			$msg ="<span class='success'>Customer data Inserted Successfully </span>";
  			return $msg;
  		}else{
$msg ="<span class='error'>Customer data Not Inserted Successfully.</span>";
  			return $msg;
  		}
    }
      }

      public function customerLogin($data){

          $email = $this->fm->validation($email);
    $pass = $this->fm->validation($pass);

      $email = mysqli_real_escape_string($this->db->link, $data['email']);
     	 $pass = mysqli_real_escape_string($this->db->link, $data['pass']);

     	 if (empty($email) || empty($pass)) {
     	 	$msg ="<span class='error'>Fields must not be empty!</span>";
  		return $msg; 
     	 }else{$query = "SELECT * FROM tbl_customer WHERE email = '$email' AND pass='$pass'";
     	 $result = $this->db->select($query);
     	 if ($result != false) {$value = $result->fetch_assoc();
       Session::set("cuslogin", true);
       Session::set("cmrId", $value['id']);
       Session::set("cmrName", $value['name']); Session::set("cmrEmail", $value['email']);
       Session::set("cmrPass", $value['pass']);
       header("Location: cart.php");
       
      $msg ="<span class='error'>Email or password  matched!.</span>";
      return $msg;
      }
     
        
     	 else{
     	 	$msg ="<span class='error'>Email or password not matched!.</span>";
  		return $msg;
     	 }
      }
      }
   public function getCustomerData($id){

    $query = "SELECT * FROM tbl_customer WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;
   }

   public function customerUpdate($data, $cmrId){
       $name = mysqli_real_escape_string($this->db->link, $data['name']);
       $address = mysqli_real_escape_string($this->db->link, $data['address']);
       $city = mysqli_real_escape_string($this->db->link, $data['city']);
       $country = mysqli_real_escape_string($this->db->link, $data['country']);
       $zip = mysqli_real_escape_string($this->db->link, $data['zip']);
      
       $email = mysqli_real_escape_string($this->db->link, $data['email']);
       $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
      

        if($name =="" || $address =="" || $city =="" || $country =="" || $zip == "" || $email =="" || $phone =="" ) {

      $msg ="<span class='error'>Fields must not be empty!.</span>";
      return $msg; 
    }
   
    else{
       
       $query =  "UPDATE tbl_customer
       SET
       name = '$name',
       address = '$address',
       city = '$city',
       country = '$country',
       zip = '$zip',
      
       email = '$email',
       phone = '$phone'
       WHERE id = '$cmrId'";
       $updated_row = $this->db->update($query);
       if($updated_row)
       {
        $msg ="<span class='success'>Customer data Updated Successfully.</span>";
        return $msg;
      } else {
        $msg ="<span class='error'>Customer data Not Updated .</span>";
        return $msg;
      }

       

    }

 }
   }

    
 

?>