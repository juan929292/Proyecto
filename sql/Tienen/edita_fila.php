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
								$idpel=$_POST['val1'];
								$idcom=$_POST['val2'];
								$idpa=$_POST['val3'];
								$idco=$_POST['val4'];
								$consulta="update tienen set id_pelicula=$idpel,id_comentario=$idcom WHERE (id_pelicula=$idpa) and (id_comentario=$idco);";
								echo "</br>";
								if($connection->query($consulta)==true){
									echo "<h2>Actualizacion realizada correctamente, Redireccionando...</h2>";
								}else{
									echo $connection->error;   
								}
								unset($connection);

								header('Refresh:5; url=/Proyecto/sql/Tienen/resultado.php',True,303);
					?>
								
</body>
</html>
