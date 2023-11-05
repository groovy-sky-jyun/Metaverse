
<?php
	$servername = "localhost";
	$server_username ="root";
	$server_password = "0000";
	$dbname = "metaverse";
	
	//db컬럼
	$user_id=$_POST["user_idPost"];
	$friend_id=$_POST["friend_idPost"];
	$send_time=$_POST["timePost"];
	$message_text=$_POST["textPost"];
	
	
	//db연결
	$conn = new mysqli($servername, $server_username, $server_password, $dbname);
	
	if(!$conn)
	{
	  die("Connection Failed.". mysqli_connect_error());
	}
	$sql = "UPDATE friendlist SET send_gift=1 WHERE user_id= '".$user_id."' and  friend_id= '".$friend_id."'";
	$result = mysqli_query($conn, $sql);
	if($result==1)
	{
		if($user_id>$friend_id){
			$sql_messagelist="SELECT * FROM messagelist WHERE user1_id='".$user_id."' and user2_id='".$friend_id."'";
		}
		else{
			$sql_messagelist="SELECT * FROM messagelist WHERE user1_id='".$friend_id."' and user2_id='".$user_id."'";
		}
		$result_messagelist=mysqli_query($conn, $sql_messagelist);
		if(mysqli_num_rows($result_messagelist)> 0){
			$row=mysqli_fetch_array($result_messagelist);
			$number = $row["number"];
			$message_count=(int)$row['message_count']+1;
			//messagerecord DB INSERT text"sendheart_gift"
			$sql_messagerecord="INSERT INTO messagerecord(list_number, sender_id, receiver_id, message_txt, message_time, message_order)VALUES('".$number."','".$user_id."','".$friend_id."','".$message_text."','".$send_time."','".$message_count."')";
			$result_messagerecord = mysqli_query($conn, $sql_messagerecord);
			if($result_messagerecord==1){
				//messagelist DB UPDATE message_count
				if($user_id>$friend_id){
					$sql_messagelist="UPDATE messagelist SET message_count=$message_count WHERE  user1_id= '".$user_id."' and  user2_id= '".$friend_id."'";
				}
				else{
					$sql_messagelist="UPDATE messagelist SET message_count=$message_count WHERE  user1_id= '".$friend_id."' and  user2_id= '".$user_id."'";
				}
				$result_messagelist=mysqli_query($conn, $sql_messagelist);
				if($result_messagelist==1)
					echo "heart send success";
				else echo "fail";
			}
			else echo"fail";
			
		}else echo"fail";	
	}
	else
		echo"fail";
	

?>
