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
					$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
							echo "<form method='post' enctype='multipart/form-data' action='inserta_bd.php'>";
								//echo "<h3>id_pelicula:</h3>";
								echo "<input required value='NULL' type='hidden' placeholder='NULL' name='val1'>"."</br>";
								echo "<h3>titulo:</h3>";
								echo "<input required type='text' name='val2'>"."</br>";
								echo "<h3>duracion:</h3>";
								echo "<input required type='text' name='val3'>"."</br>";
								echo "<h3>anio:</h3>";
								echo "<input required type='text' name='val4'>"."</br>";
								//echo "<h3>nota_media:</h3>";
								echo "<input type='hidden' value='0' placeholder='NULL' name='val5'>"."</br>";
								echo "<h3>imagen:</h3>";
								echo "<input type='hidden' name='MAX_FILE_SIZE' value='3000000' />";
								echo "<input required type='file' name='val6'>"."</br>";
								echo "<h3>Director:</h3>";
								echo "<select required name='val7'>";
								$result3=$connection->query("SELECT * FROM directores;");
								$result4=$connection->query("SELECT * FROM generos;");
								while($obj=$result3->fetch_object()){
									echo "<option value=".$obj->id_director .">".$obj->id_director ." ".$obj->nombre ."</option>";
								}
								echo "</select>";
								echo "<h3>Genero:</h3>";
								echo "<select required name='val8'>";
								while($obj2=$result4->fetch_object()){
									echo "<option value=".$obj2->id_genero .">".$obj2->id_genero ." ".$obj2->nombre ."</option>";
								}
								echo "</select>"."</br>";
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
							
							$dir_subida = '/Proyecto/img/';
							$fichero_subido = $dir_subida . basename($_FILES['val6']['name']);
							
							var_dump($fichero_subido);
							var_dump($_FILES);
							echo '<pre>';
							if (move_uploaded_file($_FILES['val6']['tmp_name'], $fichero_subido)) {
								echo "El fichero es válido y se subió con éxito.\n";
							} else {
								echo "¡Posible ataque de subida de ficheros!\n";
							}

							echo 'Más información de depuración:';
							print_r($_FILES);

							print "</pre>";


							$img= '"'."<img width='150' height='200' src='".$fichero_subido."'>".'"';
							$director=$_POST['val7'];
							$genero=$_POST['val8'];
							
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
								$ruta="Refresh:3; Location: inserta_bd_2.php?tit=$tit&dir=$director&gen=$genero,True,303";
								if($connection->query($consulta)==true){
									echo "<h2>Inserción pelicula parte1, Redireccionando...</h2>";
									header("$ruta");
								}else{
									echo $connection->error;   
								}
								$result5=$connection->query("SELECT * FROM peliculas where peliculas.titulo=$tit".";");
								
								//$ruta='Refresh:3; url=resultado.php',True,303;
								
						?>
					<?php endif ?>
    </div>
</body>
</html>