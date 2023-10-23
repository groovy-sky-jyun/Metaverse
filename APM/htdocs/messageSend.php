<?php
	$servername = "localhost";
	$server_username ="root";
	$server_password = "0000";
	$dbname = "metaverse";
	
	//db컬럼
	$user_id=$_POST["userIdPost"];
	$friend_id = $_POST["friendIdPost"];
	$message_text=$_POST["textPost"];
	$send_time=$_POST["timePost"];


	//db연결
	$conn = new mysqli($servername, $server_username, $server_password, $dbname);
	$timestamp = strtotime("Now");

	if(!$conn)
	{
	  die("Connection Failed.". mysqli_connect_error());
	}

	//1.messagelist에 둘의 관계가 있는지 확인한다.
    //2-1.있다면 해당 table number를 가져와서 messagerecord에 추가
    //2-2.없다면 message list에 먼저 추가한 후 생성된 number를 가져와서 messagerecord에 추가


	//sql문으로 messagelist에 있는지 확인
	if(strcasecmp($user_id, $friend_id) >0){//user1_id = $user_id 
		$check_list_sql = "SELECT * FROM messagelist WHERE user1_id = '".$user_id."' and user2_id = '".$friend_id."'";
		$chech_list_result = mysqli_query($conn, $check_list_sql);
		if(mysqli_num_rows($chech_list_result)<=0) //message_list에 없다는 뜻 -> messagelist table insert
		{
			//messagelist에 새로 추가
			$add_list_sql = "INSERT INTO messagelist(user1_id, user2_id)VALUES('".$user_id."','".$friend_id."')";
			$add_list_result = mysqli_query($conn, $add_list_sql);
			if($add_list_result!=1) 
				echo "insert messagelist fail";
		}

		$check_list_sql = "SELECT * FROM messagelist WHERE user1_id = '".$user_id."' and user2_id = '".$friend_id."'";
		$chech_list_result = mysqli_query($conn, $check_list_sql);	
		//message_Record 추가
		if(mysqli_num_rows($chech_list_result)>0){
			$row = mysqli_fetch_assoc($chech_list_result);

			//message count 증가 + UPDATE
			$number = $row['number'];
			$message_count = (int)$row['message_count']+1; //메세지 count default = 0 

			//messagelist DB에 message_count 값 변경
			$update_list_sql="UPDATE messagelist SET message_count='".$message_count."' WHERE number=$number "; 
			$update_list_result = mysqli_query($conn, $update_list_sql);

			if($update_list_result==1) {//update 성공하면 messagerecord 추가//date( 'Y-m-d H:i:s' )
				$insert_record_sql = "INSERT INTO messagerecord(list_number, sender_id, receiver_id, message_txt, message_time, message_order)VALUES('".$number."','".$user_id."','".$friend_id."','".$message_text."','".$send_time."','".$message_count."')";
				$insert_record_result = mysqli_query($conn, $insert_record_sql);
				if($insert_record_result==1) {
					echo "insert messagerecord success";
				}
				else
					echo "insert messagerecord fail";
			}
			else
				echo "update messagelist fail";
		}
	}


	else{//user1_id = $friend_id
		$check_list_sql = "SELECT * FROM messagelist WHERE user1_id = '".$friend_id."' and user2_id = '".$user_id."'";
		$chech_list_result = mysqli_query($conn, $check_list_sql);
		if(mysqli_num_rows($chech_list_result)<=0) //message_list에 없다는 뜻 -> messagelist table insert
		{
			//messagelist에 새로 추가
			$add_list_sql = "INSERT INTO messagelist(user1_id, user2_id)VALUES('".$friend_id."','".$user_id."')";
			$add_list_result = mysqli_query($conn, $add_list_sql);
			if($add_list_result!=1) 
				echo "insert messagelist fail";
		}

		$check_list_sql = "SELECT * FROM messagelist WHERE user1_id = '".$friend_id."' and user2_id = '".$user_id."'";
		$chech_list_result = mysqli_query($conn, $check_list_sql);	
		//message_Record 추가
		if(mysqli_num_rows($chech_list_result)>0){
			$row = mysqli_fetch_assoc($chech_list_result);

			//message count 증가 + UPDATE
			$number = $row['number'];
			$message_count = (int)$row['message_count']+1; //메세지 count default = 0 

			//messagelist DB에 message_count 값 변경
			$update_list_sql="UPDATE messagelist SET message_count='".$message_count."' WHERE number=$number "; 
			$update_list_result = mysqli_query($conn, $update_list_sql);

			if($update_list_result==1) {//update 성공하면 messagerecord 추가//date( 'Y-m-d H:i:s' )
				$insert_record_sql = "INSERT INTO messagerecord(list_number, sender_id, receiver_id, message_txt, message_time, message_order)VALUES('".$number."','".$user_id."','".$friend_id."','".$message_text."','".$send_time."','".$message_count."')";
				$insert_record_result = mysqli_query($conn, $insert_record_sql);
				if($insert_record_result==1) {
					echo "insert messagerecord success";
				}
				else
					echo "insert messagerecord fail";
			}
			else
				echo "update messagelist fail";
		}
	}

		
		

?>
