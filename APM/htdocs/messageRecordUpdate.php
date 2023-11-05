
<?php
	$servername = "localhost";
	$server_username ="root";
	$server_password = "0000";
	$dbname = "metaverse";
	
	//db컬럼
	$number=$_POST["numberPost"];
	$user_id=$_POST["userIDPost"];

	//db연결
	$conn = new mysqli($servername, $server_username, $server_password, $dbname);
	$timestamp = strtotime("Now");

	if(!$conn)
	{
	  die("Connection Failed.". mysqli_connect_error());
	}

	#대화창에서 기본으로 세팅된 메시지 이후로 상대방이 나한테 보낸 경우 실시간으로 메시지 업데이트 해줌
	$record_sql = "SELECT * FROM messagerecord WHERE read_check = 0 AND list_number = '".$number."'AND receiver_id='".$user_id."'";
	$record_result = mysqli_query($conn, $record_sql);	
	if(mysqli_num_rows($record_result)>0){
		while($row = mysqli_fetch_assoc($record_result)){
			$update_sql = "UPDATE messagerecord SET read_check=1 WHERE message_order = '".$row['message_order']."' AND list_number = '".$number."'";
			$update_result = mysqli_query($conn, $update_sql);	
			if($update_result!=1){
				echo "fail";
			}
			echo $row['sender_id'].",".$row['message_txt'].",".$row['message_time'].",".$row['message_order'].",".$row['read_check'].'/';
		}
	}
	else echo "fail";

	
?>
