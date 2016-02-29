<?php 
session_start();
include_once("../../db_configuration.php");
?>
<html>
<head>
    <title></title>
</head>
<body>
				<?php
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
                        if($connection->connect_errno){
                            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
								}
								$idpeli=$_POST['val1'];
								$idval=$_POST['val2'];
								$pel=$_POST['val3'];
								$val=$_POST['val4'];
								$consulta="update Posee set id_pelicula=$idpeli, id_valoracion=$idval WHERE (id_pelicula=$pel) and (id_valoracion=$val);";
								echo "</br>";
								if($connection->query($consulta)==true){
									echo "<h2>Actualizacion realizada correctamente, Redireccionando...</h2>";
								}else{
									echo $connection->error;   
								}
								unset($connection);

								header('Refresh:5; url=/Proyecto/sql/Posee/resultado.php',True,303);
					?>
								
</body>
</html>
