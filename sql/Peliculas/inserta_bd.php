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
    <title></title>
</head>
<body>
   <div>
    <?php if (!isset($_POST["val2"])) : ?>
		<h2>Añadir Pelicula</h2>
                    <?php
							echo "<form method='post' action='#'>";
								//echo "<h3>id_pelicula:</h3>";
								echo "<input required value='NULL' type='hidden' placeholder='NULL' name='val1' readonly='readonly'>"."</br>";
								echo "<h3>titulo:</h3>";
								echo "<input required type='text' name='val2'>"."</br>";
								echo "<h3>duracion:</h3>";
								echo "<input required type='text' name='val3'>"."</br>";
								echo "<h3>anio:</h3>";
								echo "<input required type='text' name='val4'>"."</br>";
								//echo "<h3>nota_media:</h3>";
								echo "<input type='hidden' value='0' placeholder='NULL' name='val5'>"."</br>";
								echo "<h3>imagen:</h3>";
								echo "<input required type='file' name='val6'>"."</br>";
							echo "</br>"."<input type='submit' value='Enviar'>";
							echo "</form>";
                    ?>
					<?php else: ?>
					<?php
							$id=$_POST['val1'];
							$tit=$_POST['val2'];
							$dur=$_POST['val3']." min";
							$ani=$_POST['val4'];
							$not=$_POST['val5'];
							$img= '"'."<img width='150' height='200' src='/Proyecto/img/".$_POST['val6']."'>".'"';
							
							//echo $id."</br>";
							//echo $tit."</br>";
							//echo $dur."</br>";
							//echo $ani."</br>";
							//echo $not."</br>";
							//echo $img."</br>";
							$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
                        if($connection->connect_errno){
                            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
								} 
								$consulta="insert into peliculas(id_pelicula,titulo,duracion,anio,nota_media,imagen) VALUES($id,'$tit','$dur',$ani,$not,$img);";
								echo "</br>";
								if($connection->query($consulta)==true){
									echo "<h2>Inserción realizada correctamente, Redireccionando...</h2>";
								}else{
									echo $connection->error;   
								}
								unset($connection);

								header('Refresh:3; url=/Proyecto/sql/Peliculas/resultado.php',True,303)
						?>
					<?php endif ?>
    </div>
</body>
</html>