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
	header('Refresh:1; url=../../login.php',True,303);
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
<div id="header">
<div id="login">
<?php
	if (isset($_SESSION['tiposesion'])&&($_SESSION['tiposesion']=='admin')){
		echo "";
	}
	else {
		echo "<h2>Acceso denegado, redireccionando...</h2>";
		echo "<style>page {display:none;}<style>";
	header('Refresh:1; url=../../login.php',True,303);
}
?>
				<h2>Bienvenido <?php
				//<?php if (!isset($_GET["idd"])) : 
				 if (isset($_SESSION["nombresesion"])){  
					echo $_SESSION['nombresesion']."</br>"."</br>";
					echo "<a href='sesiondestroy.php'>Cerrar Sesi&oacute;n</a>";
					}
					else{
						echo "Usted no es Administrador";
				echo "</h2>";
				echo "</br>";
				echo "<h3><p><a href='../../login.php'>Inicia Sesi&oacute;n</a> o <a href='registro.php'>reg&iacute;strate</a></p></h3>";
				}
				?>
			</div>
			</div>
	<div id="main">
		<div id="contenido" style="float:right;">
   <div>

	</br>
		 <?php
					//conexion a la base de datos-peliculas
					$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
					if($connection->connect_errno){
						echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
					}
								$result=$connection->query("select * from comentarios order by id_comentario desc limit 1;");
								while($obj=$result->fetch_object()){
									$idcomen=$obj->id_comentario;
								}
								$idpeliculon=$_GET['idaso'];
								$consulta="insert into tienen(id_comentario,id_pelicula) VALUES($idcomen,$idpeliculon);";
								echo "</br>";
								if($connection->query($consulta)==true){
									echo "<h2>Inserción parte 2 realizada correctamente, Redireccionando...</h2>";
								}else{
									echo $connection->error;   
								}
								unset($connection);
								

								header('Refresh:3; url=/Proyecto/sql/Comentarios/resultado.php',True,303)
						?>
					</br>
					</div>
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