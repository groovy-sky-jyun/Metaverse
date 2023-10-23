
<?php
	$servername = "localhost";
	$server_username ="root";
	$server_password = "0000";
	$dbname = "metaverse";
	
	//db컬럼
	$number=$_POST["numberPost"];

	//db연결
	$conn = new mysqli($servername, $server_username, $server_password, $dbname);
	$timestamp = strtotime("Now");

	if(!$conn)
	{
	  die("Connection Failed.". mysqli_connect_error());
	}

	
	$record_sql = "SELECT * FROM messagerecord WHERE list_number = '".$number."' ";
	$record_result = mysqli_query($conn, $record_sql);	
		
	if(mysqli_num_rows($record_result)>0){
		while($row = mysqli_fetch_assoc($record_result)){
			echo $row['sender_id'].",".$row['message_txt'].",".$row['message_time'].",".$row['message_order'].",".$row['read_check'].'/';
		}
	}
	else echo "fail";

	$update_sql = "UPDATE messagerecord SET read_check=1 WHERE list_number = '".$number."' ";
	$update_result = mysqli_query($conn, $update_sql);	
	if(mysqli_fetch_assoc($update_result)!=1){
		echo "fail";
	}
		
?>
