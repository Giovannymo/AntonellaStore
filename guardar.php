<?php
 include('conexion.php');
 //localhost,nombre de usuario, contraseña, nombre base de datos
$mysqli= new mysqli('localhost','zorjrizm_sistemas','contraseña','zorjrizm_Clientes');

$miconexion= new conexionMysql();
$miconexion->crearConexion(); 

  
 $Nombres  = $_POST['nombre'];
 $Emails  = $_POST['email'];
 $Titulos = $_POST['celular'];
 $Mensajes = $_POST['mensaje'];

/*$insertar= "INSERT INTO cliente (nombre,email,titulo,descripcion) VALUES ('$nombre','$email','$titulo','$mensaje') ";
var_dump($Nombres);*/


if($_POST['register']){
	$sql = "insert into cliente(nombre,email,titulo,descripcion) values('".$Nombres."','".$Emails."','".$Titulos."','".$Mensajes."')";
	$result = $miconexion->ejecutarSql($sql);
	
	if($result){
		$numfila = $miconexion->obtenercolumna();
		if($numfila>0){
			 echo "<script>
                alert('mensaje enviado con exito');
                window.location= 'index.html'
    			</script>";
			
		}
	}else{
	echo "Error";
	}
}