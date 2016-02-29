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
								$idcom=$_POST['val1'];
								$cont=$_POST['val2'];
								$consulta="update Comentarios set contenido='$cont' WHERE id_comentario=$idcom;";
								echo "</br>";
								if($connection->query($consulta)==true){
									echo "<h2>Actualizacion realizada correctamente, Redireccionando...</h2>";
								}else{
									echo $connection->error;   
								}
								unset($connection);

								header('Refresh:5; url=/Proyecto/sql/Comentarios/resultado.php',True,303);
					?>
								
</body>
</html>
