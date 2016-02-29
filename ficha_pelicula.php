<?php 
session_start();
include_once("db_configuration.php");
?>
<html>
<head> 
    <title>Film Review</title>
    <link href="css/general.css" rel="stylesheet" type="text/css" />
</head>
<body>

   <div id="page">
        <div id="header">  
			<div id="login">
				<h4>Bienvenido </h4>
				</br>
				<h3><p><a href="login.php">Inicia Sesi&oacute;n</a> ó <a href="registro.php">reg&iacute;strate</a></p></h3>
			</div>
		</div>
        <div id="main">
		<div id="sidebaraso">
            <div id="sidebar">
                <h2>Men&uacute;</h2>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
					<li><a href="administracion_bd.php">Panel Administraci&oacute;n</a></li>
					
                </ul>
                <h2>G&eacute;neros</h2>
				<?php
                echo "<ul>";
					echo "<li><a href='peliculas_genero.php?id=Accion'>Acci&oacute;n</a></li>";
                    echo "<li><a href='peliculas_genero.php?id=Aventura'>Aventura</a></li>";
                    echo "<li><a href='peliculas_genero.php?id=Belico'>B&eacute;lico</a></li>";   
                    echo "<li><a href='peliculas_genero.php?id=Comedia'>Comedia</a></li>";
                    echo "<li><a href='peliculas_genero.php?id=Thriller'>Thriller</a></li>";
				echo "</ul>";
				?>
            </div>
		</div>
			<div id="contenido">
				<?php if (!isset($_POST["nuevocoment"])) : ?>
						<?php						
					$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
						if($connection->connect_errno){
							echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
						}
					/*peliculas*/
					$result0=$connection->query("SELECT * FROM Peliculas where peliculas.id_pelicula=".$_GET['id'].";");
					/*peliculas-es-generos*/
					$result1=$connection->query("SELECT * FROM Peliculas join Es on peliculas.id_pelicula=Es.id_pelicula join Generos
					on Es.id_genero=Generos.id_genero where peliculas.id_pelicula=".$_GET['id'].";");
					/*peliculas-dirigida_por-directores*/
					$result2=$connection->query("SELECT directores.nombre FROM Peliculas join dirigida_por on peliculas.id_pelicula=dirigida_por.id_pelicula join directores
					on dirigida_por.id_director=directores.id_director where peliculas.id_pelicula=".$_GET['id'].";");
					/*peliculas-tienen-comentarios-usuarios*/
					$result3=$connection->query("SELECT usuarios.nombre,comentarios.contenido,comentarios.fecha FROM Peliculas join tienen on peliculas.id_pelicula=tienen.id_pelicula join comentarios 
					on tienen.id_comentario=comentarios.id_comentario join usuarios 
					on comentarios.id_usuario=usuarios.id_usuario where peliculas.id_pelicula=".$_GET['id'].";");
					/*peliculas-posee-valoraciones-usuarios*/
					$result4=$connection->query("SELECT ROUND(AVG(valoraciones.nota), 1) as media FROM Peliculas join posee on peliculas.id_pelicula=posee.id_pelicula join valoraciones 
					on posee.id_valoracion=valoraciones.id_valoracion join usuarios on 
					valoraciones.id_usuario=usuarios.id_usuario where peliculas.id_pelicula=".$_GET['id'].";");
					echo "<div id='cont' style='float:right;padding-right:20%;'>";
						while($obj=$result0->fetch_object()){
							echo "<h2>".$obj->titulo ."</h2>"."</br>";
							echo $obj->imagen ."</br>"."</br>";
							echo "<h3>Duración: ".$obj->duracion ."</h3>"."</br>";
							while($obj2=$result2->fetch_object()){
								echo "<h3>Director: ".$obj2->nombre ."</h3>"."</br>";
							}
							echo "<h3>Año: ".$obj->anio ."</h3>"."</br>";
							while($obj3=$result4->fetch_object()){
								echo "<h3>Nota media Usuarios Film Review: "."<h1>".$obj3->media ."</h1>"."</h3>"."</br>";
							}
							
						}
						echo "<h3>¿Aun no has valorado esta película?</h3>";
						echo "<div class='ec-stars-wrapper'>";
							echo "<h2>";
							echo "<a href='valora_pelicula.php?idpel=".$_GET['id']."&idval=0' data-value='0' title='Votar con 0 estrellas'>&#9733;</a>";
							echo "<a href='valora_pelicula.php?idpel=".$_GET['id']."&idval=1' data-value='1' title='Votar con 1 estrellas'>&#9733;</a>";
							echo "<a href='valora_pelicula.php?idpel=".$_GET['id']."&idval=2' data-value='2' title='Votar con 2 estrellas'>&#9733;</a>";
							echo "<a href='valora_pelicula.php?idpel=".$_GET['id']."&idval=3' data-value='3' title='Votar con 3 estrellas'>&#9733;</a>";
							echo "<a href='valora_pelicula.php?idpel=".$_GET['id']."&idval=4' data-value='4' title='Votar con 4 estrellas'>&#9733;</a>";
							echo "<a href='valora_pelicula.php?idpel=".$_GET['id']."&idval=5' data-value='5' title='Votar con 5 estrellas'>&#9733;</a>";
							echo "<a href='valora_pelicula.php?idpel=".$_GET['id']."&idval=6' data-value='6' title='Votar con 6 estrellas'>&#9733;</a>";
							echo "<a href='valora_pelicula.php?idpel=".$_GET['id']."&idval=7' data-value='7' title='Votar con 7 estrellas'>&#9733;</a>";
							echo "<a href='valora_pelicula.php?idpel=".$_GET['id']."&idval=8' data-value='8' title='Votar con 8 estrellas'>&#9733;</a>";
							echo "<a href='valora_pelicula.php?idpel=".$_GET['id']."&idval=9' data-value='9' title='Votar con 9 estrellas'>&#9733;</a>";
							echo "<a href='valora_pelicula.php?idpel=".$_GET['id']."&idval=10' data-value='10' title='Votar con 10 estrellas'>&#9733;</a>";
							echo "</h2>";
						echo "</div>";
							while($obj3=$result3->fetch_object()){
								echo "<p>";
								echo "<h4>".$obj3->fecha ." ".$obj3->nombre .": </h4>";
								echo "<p style='background-color:white;color:black;'>".$obj3->contenido ." </p>"."</br>";
							}
							echo "<form method='post' action='ficha_pelicula.php'>";
							echo "<input value=".$_GET['id']." type='hidden' placeholder='NULL' name='id_p'>";
							echo "<textarea name='nuevocoment' size=32 style='width:400px;height:100px;background-color:white;color:black;' cols='60' rows='8'></textarea>"."</br>";
							echo "</br>"."<input type='submit' value='Enviar Comentario'>"."</br>"."</br>";
							echo "</form>";
						echo "</div>";
						?>
						<?php else : ?>
						<?php
						$idepel=$_GET['id_p'];
						$conteni=$_GET['nuevocoment'];
						$ideusu=$_SESSION['id_usu'];
						$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
                        if($connection->connect_errno){
                            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
								} 
								$consulta="insert into comentarios(id_comentario,contenido,fecha,id_usuario,id_pelicula) VALUES('NULL','$conteni','NULL',$ideusu,$idepel);";
								echo "</br>";
								if($connection->query($consulta)==true){
									echo "<h2>Comentario enviado correctamente, Redireccionando...</h2>";
								}else{
									echo $connection->error;   
								}
								unset($connection);

								header('Refresh:3; url=/Proyecto/ficha_pelicula.php?id=$idepel',True,303)
						?>
						
			</div>
        </div>
        <div id="footer">
            <div id="footerleft">
          
            </div>
            <div id="footerright">
                <p>Copyright &copy; 2016, Desarrollada por <a href="">Velasco</a></p>
            </div>
		</div>
	</div>
	<?php endif ?>
</body>
</html>