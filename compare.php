<?php include 'inc/header.php';?>

<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Compare</h2>
			    	<?php
			    	if (isset($updateCart)) {
			    		echo $updateCart;
			    	}
			    	if (isset($delProduct)) {
			    		echo $delProduct;
			    	}
			    	?>
						<table class="tblone">
							<tr>
								<th>SL</th>
								<th>Product Name</th>
								
								<th>Price</th>
								<th>Image</th>
								
								<th>Action</th>
							</tr>

						<?php 
                            $getPro = $ct->getCartProduct();
                            if ($getPro) {
                            	$i = 0;
                            
                            	while ($result = $getPro->fetch_assoc()) {
                            		$i++;
                            	
						 ?>
							<tr>
								<td><?php echo $i; ?> </td>
								<td><?php echo $result['productName']; ?></td>

								<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
								<td><a href="details.php?proid=<?php echo $result['productId']; ?>">View</a></td>
							</tr>
							
							<?php } } ?>
							</table>
							
						
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
<?php include 'inc/footer.php';?>