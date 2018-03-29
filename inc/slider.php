<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
<?php 
$getCake = $pd->latestFromCake();
if ($getCake) {
	while ($result = $getCake->fetch_assoc()) {

?>

				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $result['productId']; ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Cookies</h2>
						<p><?php echo $result['productName']; ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>		
             <?php } } ?>



<?php 
$getIce = $pd->latestFromIce();
if ($getIce) {
	while ($result = $getIce->fetch_assoc()) {

?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $result['productId']; ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Ice-Cream</h2>
						<p><?php echo $result['productName']; ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>">Add to cart</a></span></div>
				   </div>
				</div>
			</div>
			<div class="section group">
<?php } } ?>




<?php 
$getJuice = $pd->latestFromJuice();
if ($getJuice) {
	while ($result = $getJuice->fetch_assoc()) {

?>		
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $result['productId']; ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Juice</h2>
						<p><?php echo $result['productName']; ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>	
<?php } } ?>





<?php 
$getFruit = $pd->latestFromFruit();
if ($getFruit) {
	while ($result = $getFruit->fetch_assoc()) {

?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $result['productId']; ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Fruites</h2>
						<p><?php echo $result['productName']; ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>">Add to cart</a></span></div>
				   </div>
				</div>
			</div>
			<?php } } ?>


		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	