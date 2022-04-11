<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="eLearning is a modern and fully responsive Template by WebThemez.">
	<meta name="author" content="webThemez.com">
	<title>About - Techro Bootstrap template</title>
	<link rel="favicon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<?php
		include "nav.php";
		$strconn=mysqli_connect("localhost","root","","project");
		if(!$strconn)
			echo "Connection failed".mysqli_connect_error();
		else{}
	?>
	<?php
		$query = "SELECT * FROM subject LIMIT 1";
		$result = mysqli_query($strconn,$query);
		/*if($result)
		{
			echo "Sucess";
		}
		else{
			echo "failed";
		}*/
	?>
	<header id="head" class="secondary">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h1>Activities</h1>
				</div>
			</div>
		</div>
	</header>
	<div id="courses">
		<section class="container">
			<h2>Available Activities</h2>
			
		<div class="row">
			<div class="col-sm-8">
				<form method="POST" action="">
				<table class="table table-bordered">
					<tr>
		
						<th>Activity Name</th>
						<th>Teacher Name</th>
						<th>Start Activity</th>
						<th>#</th>
						
						
					</tr>
					<?php
						$query = "SELECT Title,Info,Dinfo FROM subject";
						$result = mysqli_query($strconn,$query);
						
						while($row = mysqli_fetch_array($result))
						{
						
							$fname = $row[0];
							$lname = $row[1];
							$gender = $row[2];
							
							echo '<tr>';
					
							echo '<td>'.$fname.'</td>';
							echo '<td>'.$lname.'</td>';
							echo '<td>'.$gender.'</td>';
							echo "<td><a class='btn' href= balloon-pop-maths/index.php> Open Activity </a> </td>";
						

							echo '</tr>';
						}
					?>
				</table>
				</form>
			</div>
		</div>
	</div>




				<?php
				while($row = mysqli_fetch_array($result))
				{
					echo '<div class="col-md-4">';
					echo '<div class="featured-box">';
					echo '<a href="new.php">';
					echo '<i class="fa fa-leaf fa-2x"></i>';
					echo '<div class="text">';
					echo '<h3>'.$row[0].'</h3>';
					echo $row[1];
					echo '</div>';
					echo '</a>';
					echo '</div>';
					echo '</div>';
				}
				?>
			
		</section>
	</div>
	<?php
		include "footer.php";
	?>
	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>

</html>
