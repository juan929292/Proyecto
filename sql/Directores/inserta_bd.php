<?php 
session_start();
include_once("../../db_configuration.php");
?>
<html>
<head>
    <title></title>
</head>
<body>
   <div>
    <?php if (!isset($_POST["val2"])) : ?>
		<h2>Añadir Director</h2>
                    <?php
							echo "<form method='post' action='#'>";
								echo "<input required value='NULL' type='hidden' placeholder='NULL' name='val1' readonly='readonly'>"."</br>";
								echo "<h3>Nombre:</h3>";
								echo "<input required type='text' name='val2'>"."</br>";
								echo "<h3>País:</h3>";
								echo "<input required type='text' name='val3'>"."</br>";
							echo "</br>"."<input type='submit' value='Enviar'>";
							echo "</form>";
                    ?>
					<?php else: ?>
					<?php
							$iddir=$_POST['val1'];
							$nomb=$_POST['val2'];
							$pai=$_POST['val3'];
							$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
                        if($connection->connect_errno){
                            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
								} 
								$consulta="insert into directores(id_director,nombre,pais) VALUES($iddir,'$nomb','$pai');";
								echo "</br>";
								if($connection->query($consulta)==true){
									echo "<h2>Inserción realizada correctamente, Redireccionando...</h2>";
								}else{
									echo $connection->error;   
								}
								unset($connection);

								header('Refresh:3; url=/Proyecto/sql/Directores/resultado.php',True,303)
						?>
					<?php endif ?>
    </div>
</body>
</html>