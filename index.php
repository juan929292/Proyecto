<?php 
session_start();
include_once("./db_configuration.php");
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
				<h2>Bienvenido <?php
				//<?php if (!isset($_GET["idd"])) : 
				 if (isset($_SESSION["nombresesion"])){  
					echo $_SESSION['nombresesion']."</br>"."</br>";
					echo "<a href='sesiondestroy.php'>Cerrar Sesi&oacute;n</a>";
					}
					else{
						echo "Invitado";
					
				echo "</h2>";
				echo "</br>";
				echo "<h3><p><a href='login.php'>Inicia Sesi&oacute;n</a> o <a href='registro.php'>reg&iacute;strate</a></p></h3>";
				}
				?>
			</div>
		</div>
		<div id="page2">
        <div id="main">
		<div id="sidebaraso">
            <div id="sidebar">
                <h2>Men&uacute;</h2>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
					<?php
						if (isset($_SESSION['tiposesion'])&&($_SESSION['tiposesion']=='admin')){
					echo "<li><a href='administracion_bd.php'>Panel Administraci&oacute;n</a></li>";
						}
						else{
							echo " ";
						}
					?>
					
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
						<?php
					$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
						if($connection->connect_errno){
							echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
						}
					$result=$connection->query("SELECT * FROM peliculas");
						while($obj=$result->fetch_object()){
						echo "<div class='cajas'>";
						echo "<h4>$obj->titulo</h4>";
						echo "<a href='ficha_pelicula.php?id=".$obj->id_pelicula ."'>".$obj->imagen;
						echo "</div>";
						};
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
	</div>
</body>
</html>