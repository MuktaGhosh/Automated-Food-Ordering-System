<?php include 'inc/header.php';?>
<?php 
if(isset($_GET['proid'])){

	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
}



if($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit']))
{
$quantity = $_POST['quantity'];
$Delivery = $_POST['Delivery'];

$addCart = $ct->addToCart($quantity,$Delivery, $id);
}

?>
<?php 
$cmrId = Session::get("cmrId");
$cmr = new Customer();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])){
	$productId = $_POST['productId'];

$insertCom = $pd->insertCompareData($productId, $cmrId);
}
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">	
				<?php 
                   $getPd = $pd->getSingleProduct($id);
                   if ($getPd) {
                   while ($result = $getPd->fetch_assoc()) {
                  
				?>			
					<div class="grid images_3_of_2">
						<img src="admin/<?php echo $result['image']; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['productName']; ?></h2>
					
					<div class="price">
						<p>Price: <span><?php echo $result['price']; ?></span></p>
						<p>Category: <span><?php echo $result['catName']; ?></span></p>
						
					</div>







				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<select name="Delivery">
<option value="">Select...</option>
<option value="In Restaurant">In Restaurant</option> 
 <option value="Home Delivery">Home delivery</option>
 
</select>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
				<span style = "color:red; font_size:18px;">
				<?php
				if (isset($addCart)) {
					echo $addCart;
				}
				?>
				</span>
				<?php
				if (isset($insertCom)) {
					echo $insertCom;
				}
				?>
	         
	        
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<?php echo $result['body']; ?>
	    </div>
			<?php } } ?>	
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
						<?php
						$getCat = $cat->getAllCat();
						if ($getCat) {
						 	while ($result = $getCat->fetch_assoc()) {
						  
						?>
				      <li><a href="productbycat.php?catId=<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></a></li>
				   <?php } } ?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	</div>
	</div>
	</div>

    <?php include 'inc/footer.php';?>