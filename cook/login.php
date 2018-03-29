<?php include '../classes/Adminlogin.php';?>
<?php
 $al = new Adminlogin();
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$adminUser = $_POST['adminUser'];
     $adminName = $_POST['adminName'] ;

      $loginChk = $al->adminLogin($adminUser,$adminName);
}

?>


<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<span style="color:red;font-size:18px;">
				<?php
				  if(isset($loginChk)) {
					echo $loginChk;
				}

				?>
			</span> 
			<div>
				<input type="text" placeholder="adminUser"  name="adminUser"/>
			</div>
			<div>
				<input type="text" placeholder="adminName"  name="adminName"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
</body>
</html>