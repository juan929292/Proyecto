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
								$iddir=$_POST['val1'];
								$idpel=$_POST['val2'];
								$idedir=$_POST['val4'];
								$idepel=$_POST['val3'];
								echo $iddir."</br>";
								echo $idpel."</br>";
								$consulta="update Dirigida_por set id_director=$iddir, id_pelicula=$idpel WHERE (id_director=$idedir) and (id_pelicula=$idepel);";
								echo $consulta;
								echo "</br>";
								if($connection->query($consulta)==true){
									echo "<h2>Actualizacion realizada correctamente, Redireccionando...</h2>";
								}else{
									echo $connection->error;   
								}
								unset($connection);

								header('Refresh:5; url=/Proyecto/sql/Dirigida_por/resultado.php',True,303);
					?>
								
</body>
</html>
