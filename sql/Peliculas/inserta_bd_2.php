<?php 
session_start();
include_once("../../db_configuration.php");
?>
<?php
	if (isset($_SESSION['tiposesion'])&&($_SESSION['tiposesion']=='admin')){
		echo "";
	}
	else {
		echo "<h2>Acceso denegado, redireccionando...</h2>";
		echo "<style>div {display:none;}<style>";
	header('Refresh:1; url=/Proyecto/login.php',True,303);
}
?>
<?php
	//$ruta="Location: inserta_bd_2.php?tit=$tit&dir=$director&gen=$genero";
	$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
                        if($connection->connect_errno){
                            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
								} 
									$result5=$connection->query("SELECT * FROM peliculas where peliculas.titulo="."'".$_GET['tit']."'".";");
									while($obj4=$result5->fetch_object()){
								$idpeliculaso=$obj4->id_pelicula;
									}
								$dire=$_GET['dir'];
								$gene=$_GET['gen'];
								//$idep=$_GET['idp'];
								$result0=$connection->query("insert into es (id_pelicula,id_genero) VALUES($idpeliculaso,$gene)".";");
								$result0=$connection->query("insert into dirigida_por (id_director,id_pelicula) VALUES($dire,$idpeliculaso)".";");
								echo "<h2>(inserta_bd_2) Pelicula insertada correctamente, Redireccionando...</h2>";
								print_r($_FILES);
								header('Refresh:3; url=resultado.php',True,303);

?>
