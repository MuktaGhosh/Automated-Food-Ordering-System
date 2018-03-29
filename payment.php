<?php include 'inc/header.php';?>
<?php
$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypal_id = 'abcrestaurant@gmail.com'; //Business Email
$login = Session::get("cuslogin");
if ($login == false) {
 	header("Location:login.php");
 } 
?>
<style>
.payment{width:500px;min-height:200px;text-align:center;border:1px solid #ddd;margin:0 auto;padding: 50px;}
.payment h2{border-bottom:1px solid #ddd;margin-bottom:40px;padding-bottom:10px;}
.payment a{background: #ff0000 none repeat scroll 0 0;border-radius: 4px;color: #fff;font-size:25px;padding: 5px 30px}
.back a{width: 160px;margin: 5px auto 0;padding: 7px;text-align: center;display: block;background: #555;border:1px solid #333;color: #fff;border-radius: 3px;font-size: 25px }
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
        <div class="payment">
          <form action="<?php echo $paypal_url; ?>" method="post">  

                            <!-- Identify your business so that you can collect the payments. -->
                            <input type="hidden" name="business" value="<?php echo $paypal_id; ?>"> 
                             <!-- Specify a Buy Now button. -->
                            <input type="hidden" name="cmd" value="_xclick">    
                             <!-- Specify details about the item that buyers will purchase. -->
                            <input type="hidden" name="item_name" value="<?php echo $row['name']; ?>">
                            
                            
    <?php   $cmrId = Session::get("cmrId");
            $amount = $ct->payableAmount($cmrId);
            
            if ($amount) {
               $sum = 0;
             while ($result = $amount->fetch_assoc()) {
               $price = $result['price'];
               $sum = $sum+$price;
              // echo $sum;

             }
             
            }
          ?>
          <?php   $cmrId = Session::get("cmrId");
$quan = $ct->totalquantity($cmrId);
if($quan){
          while ($resul = $quan->fetch_assoc()) {
               $price = $resul['quantity'];
               $quantsum = $sum+$price;
              // echo $sum;
}
             }
              ?>
          <input type="hidden" name="item_number" value="<?php echo $quantsum; ?>">
           <input type="hidden" name="amount" value="<?php 
         
         
           $vat = $sum * 0.05;
           $total = $sum + $vat;
           echo $total;  
          ?>">
                            <input type="hidden" name="currency_code" value="USD">

                            <!-- Specify URLs -->                        
                            <input type='hidden' name='return' value='http://localhost/shop/successpaypal.php'>
                            <?php 
if (isset($_GET['orderid']) && $_GET['orderid'] == '_xclick') {
 $cmrId = Session::get("cmrId");
 $insertOrder = $ct->orderProduct($cmrId);
 $delData = $ct->delCustomerCart();
 //header("Location:success.php");
}
?>

 <div class="login_panel">
<form>
          <h2>Choose payment option</h2>
          <div>
          <a href="paymentoffline.php">Offline Payment</a>
           </div>
             <!-- Display the payment button. -->
             <div>
            <input type="submit" class="buynow" value="Online Payment" name="submit" border="0" >
</div>
</form>
</div>
        </div>
    		<div class="back">
             <a href="cart.php">Previous</a>
        </div>
 		</div>
 	</div>
	</div>
    <?php include 'inc/footer.php';?>