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
		<h2>Añadir registro a 'Tienen'</h2>
                    <?php
					$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
					if($connection->connect_errno){
						echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
					}
					$result=$connection->query("SELECT comentarios.id_comentario,comentarios.contenido,usuarios.nombre FROM comentarios join usuarios
					on comentarios.id_usuario=usuarios.id_usuario;");
					$result2=$connection->query("SELECT * FROM peliculas;");
							echo "<form method='post' action='#'>";
								echo "<h3>Pelicula:</h3>";
								echo "<select required multiple name='val1'>";
								while($obj=$result2->fetch_object()){
									echo "<option value=".$obj->id_pelicula .">".$obj->titulo ."</option>";
								}
								echo " </select></br>";
								
								echo "<h3>Comentario:</h3>";
								echo "<select required multiple name='val2'>";
								while($obj2=$result->fetch_object()){
									echo "<option value=".$obj2->id_comentario .">"." -- nombre: ".$obj2->nombre ." -- contenido: ".$obj2->contenido ." -- id_comentario: ".$obj2->id_comentario ."</option>";
								}
								echo " </select></br>";
								echo "</br>"."<input type='submit' value='Enviar'>";
							echo "</form>";
                    ?>
					<?php else: ?>
					<?php
							$idpeliculaso=$_POST['val1'];
							$idcomentariaso=$_POST['val2'];
							$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
                        if($connection->connect_errno){
                            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
								} 
								$consulta="insert into tienen(id_pelicula,id_comentario) VALUES($idpeliculaso,$idcomentariaso);";
								echo "</br>";
								if($connection->query($consulta)==true){
									echo "<h2>Inserción realizada correctamente, Redireccionando...</h2>";
								}else{
									echo $connection->error;   
								}
								unset($connection);

								header('Refresh:3; url=/Proyecto/sql/Tienen/resultado.php',True,303)
						?>
					<?php endif ?>
    </div>
</body>
</html>