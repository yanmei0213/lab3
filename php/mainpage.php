<?php 
session_start();
?>

<html>
<head>
	<title>Main Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css">
	
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
</head>

<body>
	<div class="header"> <!--Header-->
		<h1>Interocean Motor</h1>
	</div>
	<div class="topnavbar"> <!--Top navigation bar-->
	    <a href="search.php" class="left">Search</a>
		<a href="../html/index.html" class="right">Logout</a>
        <a href="newproduct.php" class="right">Add Product</a>
	</div>
	<div class="card-header">
		<h4>Product List</h4>
	</div>
	<div class="card-body">
		<?php
		include 'dbconnect.php';
		
		$add = "SELECT * from tbl_products ORDER BY prid DESC"; 
		$add_run = mysqli_query($con, $add);
		
		if(mysqli_num_rows($add_run) > 0)
		{
			?> 
			<form action=""  method="post" enctype="multipart/form-data">
				<table class="table table-bordered"> <!--Table List-->
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Product Image</th>
							<th scope="col">Product Name</th>
							<th scope="col">Product Type</th>
							<th scope="col">Product Price(RM)</th>
							<th scope="col">Product Quantity</th>
						</tr>
					</thead>
					<tbody> <!--Fetch Data From Database into Table List-->
						<?php
						while($add_row = mysqli_fetch_array($add_run))
						{
							?>
							<tr>
								<th> <?php echo $add_row['prid']; ?></th>
								<th> <?php echo "<img src='../images/" . $add_row['image'] . "' height='130' width='150'> "; ?></th>
								<th> <?php echo $add_row['prname']; ?></th>
								<th> <?php echo $add_row['prtype']; ?></th>
								<th> <?php echo $add_row['prprice']; ?></th>
								<th> <?php echo $add_row['prqty']; ?></th>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<?php
				}
				else
				{
					echo "No Records Found";
				}
				?>
			</div>
</body>
</html>
