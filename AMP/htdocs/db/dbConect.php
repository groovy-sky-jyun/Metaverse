class DB{
	private static $instance = null;
	private $conn;	

	private function __construct() {
		$servername = "localhost";
		$server_username ="root";
		$server_password = "1234";
		$dbname = "folkvillage";
		$port = 3308;

		$this->conn = new mysqli($servername, $server_username, $server_password, $dbname, $port);
	
		if($this->conn->connect_error){
			die("Connection Failed.". mysqli_connect_error());
		}
	}
	
	public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new DB();
        }
        return self::$instance->conn;
    }
}

