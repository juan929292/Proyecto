<?php 
session_start();
include_once("../../db_configuration.php");
?>
<?php
	if (isset($_SESSION['tiposesion'])&&($_SESSION['tiposesion']=='admin')){
		echo "";
	}
	else {
		echo "<h2>Acceso denegado, redireccionando...</h2>";
		echo "<style>div {display:none;}<style>";
	header('Refresh:1; url=/Proyecto/login.php',True,303);
}
?>

<html>
<head> 
    <title>Film Review</title>
	<link href="../../css/general_admin_bd.css" rel="stylesheet" type="text/css" />
	<meta charset="utf-8"/>
</head>
<body>
<div id="page">
<div id="header"></div>
<?php
	if (isset($_SESSION['tiposesion'])&&($_SESSION['tiposesion']=='admin')){
		echo "";
	}
	else {
		echo "<h2>Acceso denegado, redireccionando...</h2>";
		echo "<style>page {display:none;}<style>";
	header('Refresh:1; url=login.php',True,303);
}
?>

   
	<div id="main">
		<div id="contenido" style="float:right;">
   <div>
    <?php if (!isset($_POST["val1"])) : ?>
		<h2>Añadir Comentario</h2>
							    <?php
					//conexion a la base de datos-peliculas
					$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
					if($connection->connect_errno){
						echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
					}
					$result=$connection->query("SELECT * FROM usuarios");
					$result2=$connection->query("SELECT * FROM peliculas");
							echo "<form method='post' action='#'>";
								echo "<input required value='NULL' type='hidden' placeholder='NULL' name='val1' readonly='readonly'>"."</br>";
								echo "<h3>contenido:</h3>";
								echo "<textarea required name='val2' size=32 style='width:400px;height:100px' cols='60' rows='8'></textarea>"."</br>";

								echo "<input required type='hidden' value='NULL' name='val3'>"."</br>";
								echo "<h3>usuario:</h3>"."</br>";
								echo "<select required multiple name='val4'>";
								while($obj=$result->fetch_object()){
								echo "<option value=".$obj->id_usuario .">".$obj->nombre ."</option>";
								}
								echo " </select></br>";
								echo "<h3>Pelicula:</h3>"."</br>";
								echo "<select required multiple name='val5'>";
								while($obj=$result2->fetch_object()){
								echo "<option value=".$obj->id_pelicula .">".$obj->titulo ."</option>";
								}
								echo " </select></br>";
							echo "</br>"."<input type='submit' value='Enviar'>";
							echo "</form>";
                    ?>
					<?php else: ?>
					<?php
							$id=$_POST['val1'];
							$con=$_POST['val2'];
							$fec=$_POST['val3'];
							$usu=$_POST['val4'];
							$peli=$_POST['val5'];
							$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
                        if($connection->connect_errno){
                            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
								} 
								$consulta="insert into comentarios(id_comentario,contenido,fecha,id_usuario,id_pelicula) VALUES($id,'$con',$fec,$usu,$peli);";
								echo "</br>";
								if($connection->query($consulta)==true){
									echo "<h2>Inserción realizada correctamente, Redireccionando...</h2>";
								}else{
									echo $connection->error;   
								}
								unset($connection);

								header('Refresh:3; url=/Proyecto/sql/Comentarios/resultado.php',True,303)
						?>
					<?php endif ?>
					</div>
	</div>
	</div>
    </div>
</body>
</html>