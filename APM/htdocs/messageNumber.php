<?php
	$servername = "localhost";
	$server_username ="root";
	$server_password = "0000";
	$dbname = "metaverse";
	
	//db컬럼
	$user_id=$_POST["userIDPost"];
	$friend_id=$_POST["friendIDPost"];

	//db연결
	$conn = new mysqli($servername, $server_username, $server_password, $dbname);
	
	if(!$conn)
	{
	  die("Connection Failed.". mysqli_connect_error());
	}

	//sql문으로 messagelist에 있는지 확인
	if(strcasecmp($user_id, $friend_id) >0){//user1_id = $user_id 
		$check_list_sql = "SELECT * FROM messagelist WHERE user1_id = '".$user_id."' and user2_id = '".$friend_id."'";
		$chech_list_result = mysqli_query($conn, $check_list_sql);
		if(mysqli_num_rows($chech_list_result)>0) //message_list에 존재(이전에 채팅한 기록이 있다.)
		{
			$row = mysqli_fetch_assoc($chech_list_result);
			//messagelistDB의 해당 친구와의 messagetable number와 몇개의 메시지를 주고받았는지에 대한 message_count를 가져온다.
			echo $row['number'].",".$row['message_count'];
		}
		else echo "fail";

	}
	else{//user1_id = $friend_id
		$check_list_sql = "SELECT * FROM messagelist WHERE user1_id = '".$friend_id."' and user2_id = '".$user_id."'";
		$chech_list_result = mysqli_query($conn, $check_list_sql);
		if(mysqli_num_rows($chech_list_result)>0) //message_list에 존재(이전에 채팅한 기록이 있다.)
		{
			$row = mysqli_fetch_assoc($chech_list_result);
			//messagelistDB의 해당 친구와의 messagetable number와 몇개의 메시지를 주고받았는지에 대한 message_count를 가져온다.
			echo $row['number'].",".$row['message_count'];
		}
		else echo "fail";
	}
?>
