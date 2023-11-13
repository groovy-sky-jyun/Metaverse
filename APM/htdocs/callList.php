<?php
	$servername = "localhost";
	$server_username ="root";
	$server_password = "0000";
	$dbname = "metaverse";
	
	//db컬럼
	$user_id=$_POST["userIDPost"];

	//db연결
	$conn = new mysqli($servername, $server_username, $server_password, $dbname);
	
	if(!$conn)
	{
	  die("Connection Failed.". mysqli_connect_error());
	}

	
	$check_list_sql = "SELECT * FROM calllist WHERE sender_id = '".$user_id."' OR receiver_id = '".$user_id."'";
	$chech_list_result = mysqli_query($conn, $check_list_sql);
	if(mysqli_num_rows($chech_list_result)>0) //call_list에 존재(이전에 전화한 기록이 있다.)
	{
		while($row = mysqli_fetch_assoc($chech_list_result)){
			echo $row['number'].",".$row['sender_id'].",".$row['receiver_id'].",".$row['accept'].",".$row['calltime'].'/';
		}
	}
	else echo "fail";
?>
