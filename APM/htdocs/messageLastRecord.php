
<?php
	$servername = "localhost";
	$server_username ="root";
	$server_password = "0000";
	$dbname = "metaverse";
	
	//db컬럼
	$tableNumber=$_POST["table_numberPost"];
	$lastMessageNum=$_POST["lastMessage_numberPost"];

	//db연결
	$conn = new mysqli($servername, $server_username, $server_password, $dbname);
	$timestamp = strtotime("Now");

	if(!$conn)
	{
	  die("Connection Failed.". mysqli_connect_error());
	}

	
	$record_sql = "SELECT * FROM messagerecord WHERE list_number = '".$tableNumber."' AND message_order='".$lastMessageNum."'";
	$record_result = mysqli_query($conn, $record_sql);	
		
	if(mysqli_num_rows($record_result)>0){
		$row = mysqli_fetch_assoc($record_result);
		echo $row['sender_id'].",".$row['receiver_id'].",".$row['message_txt'].",".$row['message_time'].",".$row['read_check'];
	}
	else echo "fail";		
?>
