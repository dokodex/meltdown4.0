<?php
include 'php/connection.php';

class dataAccess{


	public function getcomingshows(){

		$c = new connection();

		// Create connection
		$conn = new mysqli($c::servername, $c::username, $c::password,$c::dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT fecha as fecha1, date_format(fecha,'%d/%m/%Y') as fecha, lugar, con, evento FROM comming_shows ORDER BY fecha1";
		$result = $conn->query($sql);

		if ($result->num_rows > 0){
			return $result;
		}
		else{
			return 0;
		}

		$conn->close();

	}

	public function getpastshows(){

		$c = new connection();

		// Create connection
		$conn = new mysqli($c::servername, $c::username, $c::password,$c::dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT fecha as fecha1, date_format(fecha,'%d/%m/%Y') as fecha, lugar, con FROM past_shows ORDER BY fecha1 desc";
		$result = $conn->query($sql);

		if ($result->num_rows > 0){
			return $result;
		}
		else{
			return 0;
		}

		$conn->close();
	}

	public function login($usuario,$pass){
		$c = new connection();

		// Create connection
		$conn = new mysqli($c::servername, $c::username, $c::password,$c::dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT usuario FROM admin WHERE usuario='$usuario' AND pass='$pass'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0){
			return $result;
		}
		else{
			return '0';
		}

		$conn->close();

	}
}
?>