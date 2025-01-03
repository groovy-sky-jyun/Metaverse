<?php
	$servername = "localhost";
	$server_username ="root";
	$server_password = "1234";
	$dbname = "folkvillage";
	$port = 3308;
	
	//db컬럼
	$user_id=$_POST["user_idPost"];
	
	//db연결
	$conn = new mysqli($servername, $server_username, $server_password, $dbname, $port);
	
	if(!$conn)
	{
	  die("Connection Failed.". mysqli_connect_error());
	}
	$sql = "SELECT coin FROM userinfo WHERE  id= '".$user_id."' ";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0)
	{
		$row = mysqli_fetch_assoc($result);
		echo $row['coin'];
	}
	else
		echo"fail"
	

?>
