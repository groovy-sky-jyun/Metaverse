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

	
	$check_list_sql = "SELECT * FROM messagelist WHERE user1_id = '".$user_id."' OR user2_id = '".$user_id."'";
	$chech_list_result = mysqli_query($conn, $check_list_sql);
	if(mysqli_num_rows($chech_list_result)>0) //message_list에 존재(이전에 채팅한 기록이 있다.)
	{
		while($row = mysqli_fetch_assoc($chech_list_result)){
			echo $row['number'].",".$row['user1_id'].",".$row['user2_id'].",".$row['message_count'].'/';
		}
	}
	else echo "fail";
?>
