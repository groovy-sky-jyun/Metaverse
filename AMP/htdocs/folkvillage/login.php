<?php
	$servername = "localhost";
	$server_username ="root";
	$server_password = "1234";
	$dbname = "folkvillage";
	$port = 3308;
	
	//db컬럼
	$id=$_POST["idPost"];
	$password = $_POST["passwordPost"];
	

	//db연결
	$conn = new mysqli($servername, $server_username, $server_password, $dbname, $port);
	
	if(!$conn)
	{
	  die("Connection Failed.". mysqli_connect_error());
	}
	$sql = "SELECT * FROM userinfo WHERE id = '".$id."' ";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result)>0)
	{
		while ($row = mysqli_fetch_assoc($result)) {
		  if($row['pw'] == $password)
		  {
			echo $row['nickname'];
		  }else {
			echo "login fail";
		  }
		}
	} else {
		  echo "login fail";
		}

?>
