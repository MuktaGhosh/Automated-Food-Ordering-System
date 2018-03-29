<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>No.</th>
					<th>Slider Title</th>
					<th>Slider Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

				<tr class="odd gradeX">
					<td>01</td>
					<td>Title of Slider</td>
					<td><img src="" height="40px" width="60px"/></td>				
				<td>
					<a href="">Edit</a> || 
					<a onclick="return confirm('Are you sure to Delete!');" >Delete</a> 
				</td>
					</tr>	
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
