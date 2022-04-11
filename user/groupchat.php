<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.php">
					</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li class="active"><a href="index.php">Home</a></li>
					<li class="active"><a href="../index.php">Logout</a></li>
                </ul>
            </div>
</div>

</div>

<header id="head" class="secondary">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h1>Class Group Chat</h1>
				</div>
			</div>
		</div>
	</header>
<br>
<div class = "container">
<div class="row">
<div class="col-sm-8">

</div>
</div>

</div>

<center>

<div id="limit">
<center >
<form action="chatinsert.php" method="GET" class="chatinput" >
  
    <input type="text" name="msg" id="msg" placeholder="                                                                type your message here"><br><br>
  

    <button type="submit" class="btn btn-lg btn-success" style="border-radius:50%;"><span class="glyphicon glyphicon-send"></span></button>
</form>
<style>
    .chatmsg
    {
        background-color: #075bff;
        border: 1px solid #075bff;
        border-radius: 10px;
        height:auto;
        width:20%;
        padding: 8px;
        color: red;
        
    }
     .adchatmsg
    {
        background-color: #5FCF80;
        border: 1px solid #5FCF80;
        border-radius: 10px;
        height:auto;
        width:20%;
        padding: 8px;
        color: white;
        
    }
    #chats
    {
        text-align: center;
        width:50%;
        height: auto;
        border-radius: 30px;
        background: url('wall.png');
        padding-top: 10px;
        min-height: 80%;
        
    }
    #msg
    {
        height:80px;
        width:700px;
        border:1px solid green;
        border-radius: 50px;
        background-color: lightyellow;
        
    }
 #limit
    {
        background-image:url('wall.jpg');
    }
</style>
<script>
    function displaychat() 
    {
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("chats").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "chatdisplay.php", true);
        xmlhttp.send();
    }
   setInterval(displaychat,100);
</script>

    <div id="chats"></div></center>


<?php

     
     if($_SERVER['REQUEST_METHOD']=="GET"){
       $localhost = "localhost";
       $usernamew = "root";
       $passwordw = "";
          $db = "expdb";
      $conn = mysqli_connect($localhost,$usernamew,$passwordw,$db);
      if(!$conn){
       echo "Connection error";
       }
         else{
     
     $sql = "UPDATE counter SET visit=visit+1 WHERE id = 3";
    $result = mysqli_query($conn,$sql);
 }

}

?>
