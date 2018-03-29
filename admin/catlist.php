<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php';?>
<?php
$cat = new Category();
if (isset($_GET['delcat'])) {
$id = $_GET['delcat'];

$delcat = $cat->delCatById($id);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">   
                <?php
                if(isset($delCat))
                {
                	echo $delCat;
                }
                ?>     
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
                         $getCat = $cat->getAllCat();
                         if($getCat) {
                         	$i = 0;
                         	while ($result = $getCat->fetch_assoc()){
                         		$i++;
                         	

						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['catName']; ?></td>
							<td><a href="catedit.php?catid=<?php echo $result['catId'];?>">Edit</a> || <a  onclick="return confirm('Are you sure to delete? ')" href="?delcat=<?php echo $result['catId'];?>">Delete</a></td>
						</tr>

						<?php } }?>
						</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

