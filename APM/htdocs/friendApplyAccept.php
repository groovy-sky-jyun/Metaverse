<?php
	$servername = "localhost";
	$server_username ="root";
	$server_password = "0000";
	$dbname = "metaverse";
	
	//db컬럼
	$to_user_id=$_POST["to_user_idPost"];
	$from_user_id=$_POST["from_user_idPost"];
	$are_we_friend=$_POST["are_we_friendPost"];
	//db연결
	$conn = new mysqli($servername, $server_username, $server_password, $dbname);
	if(!$conn)
	{
	  die("Connection Failed.". mysqli_connect_error());
	}

	if($are_we_friend=="true"){
		$sql = "UPDATE applyfriend SET are_we_friend=1 WHERE to_user_id='".$to_user_id."' AND from_user_id='".$from_user_id."'";
		$result = mysqli_query($conn, $sql);
		if($result==1){
			//friendlist DB에 추가
			$sql = "INSERT INTO friendlist(user_id, friend_id) VALUES ('".$to_user_id."','".$from_user_id."')";
			$result = mysqli_query($conn, $sql);
			$sql = "INSERT INTO friendlist(user_id, friend_id) VALUES ('".$from_user_id."','".$to_user_id."')";
			$result = mysqli_query($conn, $sql);
			echo "1";
		}
			
		else
			echo "update 실패";
	}
	else 
	echo"arewofriend 잘못받음";
	
	
	

?>
