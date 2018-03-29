<?php 
 $filepath = realpath(dirname(__FILE__));
 require_once ($filepath.'/../lib/Session.php');
Session::checkLogin();
require_once ($filepath.'/../lib/Database.php');
require_once ($filepath.'/../helpers/Format.php');
?>
<?php
Class Adminlogin{
  private $db;
	private $fm;

  public function __construct() {
     $this->db = new Database();
     $this->fm = new Format(); 
      }

    public function adminLogin($adminUser,$adminName){

  	$adminUser = $this->fm->validation($adminUser);
  	$adminName = $this->fm->validation($adminName);

  	$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
  	$adminName = mysqli_real_escape_string($this->db->link, $adminName);

  	if(empty($adminUser) || empty($adminName)) {

  		$loginmsg = "Username or Password must not empty !";
  		return $loginmsg; 
  	} else {

           $query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminName = '$adminName'";
           $result = $this->db->select($query);
           
           if($result != false ) { $value = $result->fetch_assoc();

                  Session::set("adminlogin", true);
                  Session::set("adminId", $value['adminId']);
                  Session::set("adminUser", $value['adminUser']);Session::set("adminName", $value['adminName']);
                  Session::set("adminPass", $value['adminPass']);header("Location: dashbord.php");
                 
                  $loginmsg = "Username or Password   match ";
      return $loginmsg;
                  } 
           else{
            $loginmsg = "Username or Password  not match ";
      return $loginmsg;


           }  
       }

}

}


?>