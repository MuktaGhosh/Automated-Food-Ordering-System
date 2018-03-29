<?php
session_start();

$_SESSION['uid'] = '1';

$_SESSION['username'] = 'yourname';

$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr';

$paypal_id='your_seller_id';  // sriniv_1293527277_biz@inbox.com

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
09
<html>
10
    <head>
11
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
12
        <title>My Demo | Products</title>
13
        <style type="text/css">
14
            body{
15
                width: 80%;
16
                margin: 0 auto;
17
                margin-top: 50px;
18
                font:bold 14px arial;
19
            }
20
            .product{
21
                float: left;
22
                margin-right: 10px;
23
                border: 1px solid #cecece;
24
                padding: 10px;
25
                margin-right: 20px;
26
            }
27
            .price{
28
                text-align: right;
29
            }
30
            .btn{
31
                text-align: center;
32
}
33
        </style>

    </head>

    <body>

        <h2>Hello, <?php echo $_SESSION['username'];?></h2>

        <?php

        require 'db_config.php';

        $result = mysql_query("SELECT * from my_products");

        while($row = mysql_fetch_array($result)) {

            ?>

        <div class="product">           

            <div class="image">
44
                <img src="images/<?php echo $row['product_img'];?>" alt=""  width="197px" height="210px"/>
45
            </div>
46
            <div class="name">
47
                    <?php echo $row['product'];?>
48
            </div>
49
            <div class="price">
50
                Price: <?php echo $row['price'];?>$
51
            </div>
52
            <div class="btn">
53
                <form action='<?php echo $paypal_url; ?>' method='post' name='frmPayPal1'>
54
                    <input type='hidden' name='business' value='<?php echo $paypal_id;?>'>
55
                    <input type='hidden' name='cmd' value='_xclick'>
56
 
57
                    <input type='hidden' name='item_name' value='<?php echo $row['product'];?>'>
58
                    <input type='hidden' name='item_number' value='<?php echo $row['product_id'];?>'>
59
                        <input type='hidden' name='amount' value='<?php echo $row['price'];?>'>
60
                    <input type='hidden' name='no_shipping' value='1'>
61
                    <input type='hidden' name='currency_code' value='USD'>
62
                    <input type='hidden' name='handling' value='0'>
63
                    <input type='hidden' name='cancel_return' value='http://localhost/paypal/cancel.php'>
64
                    <input type='hidden' name='return' value='http://localhost/paypal/success.php'>
65
 
66
                    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
67
                    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
68
                </form>
69
            </div>
70
        </div>
71
 
72
            <?php

        }

        ?>

    </body>

</html>
