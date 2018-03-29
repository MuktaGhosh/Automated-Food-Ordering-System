<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
$filepath = realpath(dirname(__FILE__));
require_once ($filepath.'/../classes/Cart.php');
 $ct =  new Cart();
 $fm = new Format();
?>
<?php
if (isset($_GET['customrId'])) {
    $id = $_GET['customrId'];
    $time = $_GET['time'];
    $price = $_GET['price'];
    $confirm = $ct->productShiftConfirm($id, $time, $price);
 } 

 if (isset($_GET['delproid'])) {
 	$id = $_GET['delproid'];
 	$time = $_GET['time'];
 	$price = $_GET['price'];
 	$delOrder = $ct->delProductShifted($id, $time, $price);
 } 
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>

                <?php 
                  if (isset($confirm)) {
                    echo $confirm;
                  }

                   if (isset($delOrder)) {
                    echo $delOrder;
                  }
                ?>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						

						<tr>
							
							<th>ID.</th>
							<th>Order Time</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Customer Id</th>
							<th>Address</th>
                            <th>Serving Option</th>
                            <th>Status</th>
                            
							<th>Action</th>
                           
						</tr>
					</thead>
					
					<tbody>
						<?php 
                            
                             $getOrder = $ct->getAllOrderProduct();
                             if ($getOrder) {
                             	while ($result = $getOrder->fetch_assoc()) {
                            
						?>
						<tr class="odd gradeX">
							<td><?php echo $result['id']; ?></td>
							<td><?php echo $fm->formatDate($result['date']); ?></td>
							<td><?php echo $result['productName']; ?></td>
							<td><?php echo $result['quantity']; ?></td>
							<td><?php echo $result['price']; ?></td>
							<td><?php echo $result['cmrId']; ?></td>
                            
							<td><a href="customer.php?custId=<?php echo $result['cmrId']; ?>">View Details</a></td>
                            <td><?php echo $result['Delivery']; ?></td>
							     <td>
                                        <?php 

                                    if ($result['status'] == '0' ) {
                                        echo "Pending";
                                    }
                                    elseif($result['status'] == '1'){ 
                                            echo "Plz cook !";
                                     }elseif($result['status'] == '2')
                                    {
                                        echo "In Process";
                                    }else
                                    {
                                        echo "Successfully Done!!";}
                                   ?>

                                    </td>
                                  <?php 
                            if ($result['status'] == '0') { ?>
                                <td>N/A</td>
                    <?php } elseif(($result['status'] == '1' )&& ($result['Delivery'] == "In Restaurant")){  ?>
  
   

                            <td><a style = "color:red;" href="?customrId=<?php echo $result['cmrId']; ?>&price=<?php echo $result['price']; ?>&time=<?php echo $result['date']; ?>">Call Waiter after cooking!</a></td>
                            <?php } elseif(($result['status'] == '1' )&& ($result['Delivery'] == "Home Delivery")){  ?>
  
   

                            <td><a style = "color:red;" href="?customrId=<?php echo $result['cmrId']; ?>&price=<?php echo $result['price']; ?>&time=<?php echo $result['date']; ?>">Confirm after cook!</a></td>
                          
                            <?php }elseif(($result['status'] == '2' )&& ($result['Delivery'] == "In Restaurant")){ ?> 
                                <td>N/A</td>
                                <?php }elseif(($result['status'] == '2' )&& ($result['Delivery'] == "Home Delivery")){ ?> 
                                <td>Ready to delivery</td>
                            <?php }else{ ?> 
                                <td>N/A</td>
                        
                        <?php }  ?>        
                          </tr>
                              <?php } } ?>           
					</tbody>
					<tfooter>
            <tr>
                <th colspan="4" style="text-align:right">Total:</th>
                <th></th>
                

            </tr>
            <script type="text/javascript">
$(document).ready(function() {
        $('#example').dataTable( {
    "footerCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;
 
        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
            return typeof i === 'string' ?
                i.replace(/[\$,]/g, '')*1 :
                typeof i === 'number' ?
                    i : 0;
        };
 
        // Total over all pages
        total = api
            .column( 4 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            } );
 
        // Total over this page
        pageTotal = api
            .column( 4, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
 
        // Update footer
        $( api.column( 4 ).footer() ).html(
            pageTotal +' ('+ total +' total)'
        );
    },             
</script>
        </tfooter>

				</table>


				




				
               </div>
            </div>
        </div>


<?php include 'inc/footer.php';?>
