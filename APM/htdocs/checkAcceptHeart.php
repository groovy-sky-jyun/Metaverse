
<?php
	$servername = "localhost";
	$server_username ="root";
	$server_password = "0000";
	$dbname = "metaverse";
	
	//db컬럼
	$user_id=$_POST["user_idPost"];
	$friend_id=$_POST["friend_idPost"];
	
	
	//db연결
	$conn = new mysqli($servername, $server_username, $server_password, $dbname);
	
	if(!$conn)
	{
	  die("Connection Failed.". mysqli_connect_error());
	}
	$sql = "SELECT * FROM friendlist WHERE user_id= '".$friend_id."' and  friend_id= '".$user_id."'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0)
	{
		$row = mysqli_fetch_assoc($result);
		echo $row['accept_gift'];
	}
	else
		echo"fail";
	

?>
