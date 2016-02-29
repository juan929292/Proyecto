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
		<h2>Añadir Valoracion</h2>
                    <?php
					$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
					if($connection->connect_errno){
						echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
					}
					$result=$connection->query("SELECT * FROM usuarios");
							echo "<form method='post' action='#'>";
								echo "<input required value='NULL' type='hidden' placeholder='NULL' name='val1' readonly='readonly'>"."</br>";
								echo "<h3>nota:</h3>";
								echo "<select required multiple name='val2'>";
								echo "<option value='0'>0</option>";
								echo "<option value='1'>1</option>";
								echo "<option value='2'>2</option>";
								echo "<option value='3'>3</option>";
								echo "<option value='3'>3</option>";
								echo "<option value='4'>4</option>";
								echo "<option value='5'>5</option>";
								echo "<option value='6'>6</option>";
								echo "<option value='7'>7</option>";
								echo "<option value='8'>8</option>";
								echo "<option value='9'>9</option>";
								echo "<option value='10'>10</option>";
								echo " </select></br>";
								echo "<h3>Usuario(id_usuario):</h3>";
								echo "<select required multiple name='val3'>";
								while($obj=$result->fetch_object()){
								echo "<option value=".$obj->id_usuario .">".$obj->nombre ."</option>";
								}
								echo " </select></br>";
							echo "</br>"."<input type='submit' value='Enviar'>";
							echo "</form>";
                    ?>
					<?php else: ?>
					<?php
							$id=$_POST['val1'];
							$not=$_POST['val2'];
							$usu=$_POST['val3'];
							$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
                        if($connection->connect_errno){
                            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
								} 
								$consulta="insert into valoraciones(id_valoracion,nota,id_usuario) VALUES($id,$not,$usu);";
								echo "</br>";
								if($connection->query($consulta)==true){
									echo "<h2>Inserción realizada correctamente, Redireccionando...</h2>";
								}else{
									echo $connection->error;   
								}
								unset($connection);

								header('Refresh:3; url=/Proyecto/sql/Valoraciones/resultado.php',True,303)
						?>
					<?php endif ?>
    </div>
</body>
</html>