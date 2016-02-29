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
								$idgen=$_POST['val1'];
								$nomb=$_POST['val2'];
								$consulta="update generos set id_genero=$idgen,nombre='$nomb' WHERE id_genero=$idgen;";
								echo "</br>";
								if($connection->query($consulta)==true){
									echo "<h2>Actualizacion realizada correctamente, Redireccionando...</h2>";
								}else{
									echo $connection->error;   
								}
								unset($connection);

								header('Refresh:5; url=/Proyecto/sql/Generos/resultado.php',True,303);
					?>
								
</body>
</html>
