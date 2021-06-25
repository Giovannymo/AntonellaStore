<?php
class conexionMysql{
	private $host;
	private $user;
	private $password;
	private $database;
	private $conn;


		public function __construct(){
			require_once "configBd.php";
			$this->host = HOST;
			$this->user = USER;
			$this->password = PASSWORD;
			$this->database = DATABASE;
		}
		public function crearConexion(){
			$this->conn = new mysqli ($this->host,$this->user,$this->password,$this->database);
			if ($this->conn->connect_errno){
				die("error al conectarce a MYSQL: (".$this->conn->connect_errno.")".$this->connect_error);
			}else{
				return true;	
			}
		}
		public function cerrarConexion(){
			$this->conn->close();
		}
		public function ejecutarSql($sql){
			$result = $this->conn->query($sql);
			return $result;
		}
		public function obtenercolumna(){
			return $this->conn->affected_rows;
		}
		public function obtenerfilas($result){
			return $result->fetch_array();
		}
		public function obtenerdatos($result){
			return $result->fetch_row();
		}
}
?>