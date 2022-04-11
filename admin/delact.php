<?php
include "nav.php";
		$strconn=mysqli_connect("localhost","root","","project");
		if(!$strconn)
			echo "Connection failed".mysqli_connect_error();
		else{
				echo "Connection Done".mysqli_connect_error();
		}
		session_start();
		if(isset($_SESSION["username"]))
		{
			$username=$_SESSION["username"];
		}
		else{ echo 'session not started';}

$id = $_GET['name']; // $id is now defined


$query="DELETE FROM subject WHERE Title='".$id."'";
$result = mysqli_query($strconn,$query);
if($result)
								{
									echo "Activity Deleted Successfully";
								
								}
								else
								{
									echo $result;
								}
mysqli_close($strconn);
header("Location: deleteactivity.php");

?> 	