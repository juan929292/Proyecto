<?php 
session_start();
include_once("./db_configuration.php");

?>
<html>
<head> 
    <title>Film Review</title>
    <link href="css/general.css" rel="stylesheet" type="text/css" />
	<meta charset="utf-8"/>
</head>
<body>

   <div id="page">
        <div id="header">  
			<div id="login">
				<h2>Bienvenido <?php
				//<?php if (!isset($_GET["idd"])) : 
				 if (isset($_SESSION["nombresesion"])){  
					echo $_SESSION['nombresesion']."</br>"."</br>";
					echo "<a href='sesiondestroy.php'>Cerrar Sesi&oacute;n</a></br>";
					echo "</br><a href='includes/imprimir_pdf.php'>Imprimir actividad</a></br></br>";
					}
					else{
						echo "Invitado";
					
				echo "</h2>";
				echo "</br>";
				echo "<h3><p><a href='login.php'>Inicia Sesi&oacute;n</a> o <a href='registro.php'>reg&iacute;strate</a></p></h3>";
				}
				include_once("includes/cambiar_color_tema.php");
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
							echo "<li><a href='includes/imprimir_pdf_admin.php'>Imprimir actividad Web</a></li>";
							echo "<li><a href='administracion_bd.php'>Panel Administraci&oacute;n</a></li>";
						}
						else{
							echo " ";
						}
					?>
					
                </ul>
                <h2>G&eacute;neros</h2>
				<?php
				$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
						if($connection->connect_errno){
							echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
						}
					$result7=$connection->query("SELECT nombre FROM generos");
                echo "<ul>";
				while($obj7=$result7->fetch_object()){
					echo "<li><a href='peliculas_genero.php?id=".$obj7->nombre ."'>".$obj7->nombre ."</a></li>";
				}
				echo "</ul>";

				?>
            </div>
			
			<img style="margin: 50px 10px 10px 15px; border: 1px solid black" src="includes/grafica.php"/>
			
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
						echo "<a href='ficha_pelicula.php?id=".$obj->id_pelicula ."'>"."<h4>$obj->titulo</h4>"."</a>";
						echo "<a href='ficha_pelicula.php?id=".$obj->id_pelicula ."'>".$obj->imagen."</a>";
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