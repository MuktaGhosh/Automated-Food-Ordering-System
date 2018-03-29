<?php include 'inc/header.php';?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>All Food Items</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
                $getFpd = $pd->getAllProduct();
                if ($getFpd) {
                	while ($result = $getFpd->fetch_assoc()) {
                		
                	
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?></h2>
					 <p><?php echo $fm->textShorten($result['body'], 60); ?></p>
					 <p><span class="price"><?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
			<?php } } ?>


			</div>


			
   <?php include 'inc/footer.php';?>