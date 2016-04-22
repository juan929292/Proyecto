<?php 
session_start();
include_once("../../db_configuration.php");
?>
<?php
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
                        if($connection->connect_errno){
                            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
								}
								$idpeli=$_GET['idd'];
								$consulta="DELETE FROM peliculas WHERE id_pelicula=$idpeli;";
								echo "</br>";
								if($connection->query($consulta)==true){
									echo "<h2>Borrado realizado correctamente, Redireccionando...</h2>";
								}else{
									echo $connection->error;   
								}
								unset($connection);

								header('Refresh:3; url=/Proyecto/sql/Peliculas/borra_bd_2.php',True,303);
					?>