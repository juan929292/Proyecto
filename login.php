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
					<div style="margin:15px 15px 15px 15px;">
						<form action="login.php" method="POST">
						<h4>Usuario:</h4> 
						<input required placeholder="Usuario" type="text" name="nombre"></br>
						<h4>Contraseña:</h4> 
						<input required type="password" placeholder="Contraseña" name="clave"></br></br>
						<input type="submit" value="Entrar">
						</form>
						<?php
							$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
						if($connection->connect_errno){
							echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
						}
						if (isset($_POST['nombre'])){
							$consulta="select * from usuarios where nombre='".$_POST['nombre']."' and contrasena='".$_POST['clave']."';";
							if ($result0=$connection->query($consulta)){
								while($obj=$result0->fetch_object()){
									
									 $_SESSION['nombresesion']=$_POST['nombre'];
									 $_SESSION['idsesion']=$obj->id_usuario;
									 $_SESSION['tiposesion']=$obj->tipo;
									 echo "<h2>Inicio sesion realizado correctamente, Redireccionando...</h2>"; 
									 echo $_SESSION['nombresesion'];
									header("Location: index.php");
								 }	
								}
								 
							}
						?>
					</div>
					<p>¿No estás registrado? <a href="registro.php">Reg&iacute;strate</a></p>
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
</body>
</html>