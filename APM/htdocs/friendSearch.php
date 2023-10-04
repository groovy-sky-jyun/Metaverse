<?php
	$servername = "localhost";
	$server_username ="root";
	$server_password = "0000";
	$dbname = "metaverse";
	
	//db컬럼
	$nickname=$_POST["nicknamePost"];
	
	//db연결
	$conn = new mysqli($servername, $server_username, $server_password, $dbname);
	
	if(!$conn)
	{
	  die("Connection Failed.". mysqli_connect_error());
	}
	$sql = "SELECT gender,id FROM userinfo WHERE nickname = '".$nickname."' ";
	$result = mysqli_query($conn, $sql);


	
	if(mysqli_num_rows($result)>0)
	{
		$row = mysqli_fetch_assoc($result);
		echo $row['gender'].','.$row['id'];
		
		
	} else {
		  echo "no user";
		}

?>
