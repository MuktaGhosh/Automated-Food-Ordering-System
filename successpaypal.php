<?php include 'inc/header.php';?>
<?php
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
 } 
    // information from PayPal
    $item_number = $_GET['item_number'];
    
    $txn_id = $_GET['tx'];
    $payment_gross = $_GET['amt'];
    $currency_code = $_GET['cc'];
    $payment_status = $_GET['st'];
 $insertOrder = $ct->orderProduct($cmrId);
 $delData = $ct->delCustomerCart();
?>
 <?php 
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
 $cmrId = Session::get("cmrId");
 $insertOrder = $ct->orderProduct($cmrId);
 $delData = $ct->delCustomerCart();
 header("Location:success.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Paypal informations</title>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style type="text/css">
        body{
            padding-top: 70px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Informations from paypal</h2>           
        <table class="table">
        <thead>
          <tr>
            <th>Payment ID</th>
            <th>Item number</th>
            <th>Tax number</th>
            <th>Paid amount</th>
            <th>Currency</th>
          
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td><?php echo $item_number; ?></td>
            <td><?php echo $txn_id; ?></td>
            <td><?php echo $payment_gross; ?></td>
            <td><?php echo $currency_code; ?></td>
            <td><?php echo $payment_status; ?></td>
          </tr>   
        </tbody>
        </table>
    </div>
</body>
</html>
