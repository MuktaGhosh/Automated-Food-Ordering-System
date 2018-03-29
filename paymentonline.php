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
                $getFpd = $ct->getAllOrderProduct();
                if ($getFpd) {
                  while ($result = $getFpd->fetch_assoc()) {
                    
                  
          ?>

         <table class="tblone">
         
          <tr>
           <td><?php echo $result['productName']; ?></td>
           <td><?php echo $result['quantity']; ?></td>

         </tr>
          <?php } } ?>
         </table>
         <br />
    <form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
              </div> 
              </div>  
               </div>  