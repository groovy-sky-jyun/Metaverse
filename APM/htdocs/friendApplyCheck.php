<?php
	$servername = "localhost";
	$server_username ="root";
	$server_password = "0000";
	$dbname = "metaverse";
	
	//db컬럼
	$user_id=$_POST["idPost"];
	
	//db연결
	$conn = new mysqli($servername, $server_username, $server_password, $dbname);
	if(!$conn)
	{
	  die("Connection Failed.". mysqli_connect_error());
	}

	$sql = "SELECT to_user_id, are_we_friend FROM applyfriend WHERE from_user_id = '".$user_id."' ";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result)>0)//나한테 온 친구 신청이 있다는 뜻
	{
		$row = mysqli_fetch_assoc($result);

		$sql = "SELECT nickname, gender FROM userinfo WHERE id='".$row['to_user_id']."'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)>0)//나한테 온 친구 신청이 있다는 뜻
		{
			$row2 = mysqli_fetch_assoc($result);
			echo $row2['nickname'].','.$row2['gender'].','.$row['are_we_friend'].','.$row['to_user_id'];
		}
	} 
	else
		echo "null";
	

?>
