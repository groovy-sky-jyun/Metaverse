<?php
	$servername = "localhost";
	$server_username ="root";
	$server_password = "0000";
	$dbname = "metaverse";
	
	//db컬럼
	$to_user_id=$_POST["userIdPost"];
	$from_user_id = $_POST["fromUserIdPost"];


	//db연결
	$conn = new mysqli($servername, $server_username, $server_password, $dbname);
	
	if(!$conn)
	{
	  die("Connection Failed.". mysqli_connect_error());
	}
	$sql = "INSERT INTO applyfriend (to_user_id,from_user_id) VALUES ('".$to_user_id."','".$from_user_id."')";
	$result = mysqli_query($conn, $sql);
	
	if($result==1)
	{
	  echo "저장성공";
	}else{
	  echo "저장실패";
	}
?>
