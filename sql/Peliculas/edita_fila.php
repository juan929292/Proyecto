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
								$titu=$_POST['val2'];
								$dura=$_POST['val3']." min";
								$ani=$_POST['val4'];
								$not=$_POST['val5'];
								$img= '"'."<img width='150' height='200' src='/Proyecto/img/".$_POST['val6']."'>".'"';

								$consulta="update Peliculas set titulo='$titu',duracion='$dura',anio=$ani,nota_media=$not WHERE id_pelicula=$idpel;";
								echo "</br>";
								if($connection->query($consulta)==true){
									echo "<h2>Actualizacion realizada correctamente, Redireccionando...</h2>";
								}else{
									echo $connection->error;   
								}
								unset($connection);

								header('Refresh:5; url=/Proyecto/sql/Peliculas/resultado.php',True,303);
					?>
								
</body>
</html>
