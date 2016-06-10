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
<div id="header">
<div id="login">
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
				echo "<h3><p><a href='login.php'>Inicia Sesi&oacute;n</a> o <a href='registro.php'>reg&iacute;strate</a></p></h3>";
				}
				?>
			</div>
</div>
   
	<div id="main">
		<div id="contenido" style="float:right;">
<?php if (!isset($_GET["idd"])) : ?>
	<div id="info1" style="">
		    <?php
        //conexion a la base de datos-peliculas
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
        if($connection->connect_errno){
            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
        }
        $result=$connection->query("SELECT * FROM peliculas");

echo "<h3>Peliculas</h3>";
		?>
		<table class="centered bordered card-panel white"  style="text-align:center;">
            <tr class="card-panel teal lighten-2 white-text" style="font-weight:bold">
                <td>Id_Pelicula</td>
                <td>Titulo</td>
                <td>Duracion</td>
                <td>Año</td>
                <td>nota_media</td>
                <td>imagen</td>
            </tr>
            
        <?php
            while($obj=$result->fetch_object()){
                echo "<tr>";
                echo "<td>$obj->id_pelicula</td>";
                echo "<td>$obj->titulo</td>";
                echo "<td>$obj->duracion</td>";
                echo "<td>$obj->anio</td>";
                echo "<td>$obj->nota_media</td>";
                echo "<td>$obj->imagen</td>";
                echo "<td><a href='edita_bd.php?idd=$obj->id_pelicula'><img width=26 src='../../img/edita.png'/></a></td>";
                echo "</tr>";   
            }
        ?>
        </table>
	</div>
	<?php else : ?>
	  <?php
        //conexion a la base de datos-peliculas
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
        if($connection->connect_errno){
            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
        }
        $result=$connection->query("SELECT * FROM peliculas where id_pelicula=".$_GET['idd'].";");
							echo "<form method='post' action='edita_fila.php'>";
							while($obj=$result->fetch_object()){
								echo "<h3>Editar pelicula: ".$obj->titulo ."</h3>"."</br>";
								echo $obj->imagen."</br>";
								echo "<input required type='hidden' value=".$obj->id_pelicula ." name='val1' readonly='readonly'>"."</br>";
								echo "<h3>titulo:</h3>";
								echo "<input required type='text' placeholder="."'".$obj->titulo ."'"." name='val2'>"."</br>";
								echo "<h3>duracion:</h3>";
								echo "<input required type='text' name='val3'"." placeholder="."'".$obj->duracion ."'>"."</br>";
								echo "<h3>anio:</h3>";
								echo "<input required type='text' placeholder="."'".$obj->anio ."'"." name='val4'>"."</br>";
								echo "<h3>nota_media:</h3>";
								echo "<input required type='text' placeholder=".$obj->nota_media ." name='val5'>"."</br>";
								echo "<h3>imagen:</h3>";
								echo "<input type='hidden' name='MAX_FILE_SIZE' value='3000000' />";
								echo "<input required type='file' name='val6'>"."</br>";
								echo "<h3>Director:</h3>";
								$result3=$connection->query("SELECT * FROM directores;");
								$result4=$connection->query("SELECT * FROM generos;");
								$result5=$connection->query("SELECT * FROM directores join dirigida_por on directores.id_director=dirigida_por.id_director where dirigida_por.id_pelicula=".$obj->id_pelicula.";");
								$result6=$connection->query("SELECT * FROM generos join es on generos.id_genero=es.id_genero where es.id_pelicula=".$obj->id_pelicula.";");
									while($obj4=$result5->fetch_object()){
								echo "<select placeholder=".$obj4->id_director . $obj4->nombre ." required name='val7'>";
								
								while($obj2=$result3->fetch_object()){		
									echo "<option value=".$obj2->id_director .">".$obj2->id_director ." ".$obj2->nombre ."</option>";		
									}
								}
								echo "</select>";
								echo "<h3>Genero:</h3>";
								echo "<select required name='val8'>";
								while($obj3=$result4->fetch_object()){
									echo "<option value=".$obj3->id_genero .">".$obj3->id_genero ." ".$obj3->nombre ."</option>";
								}
								echo "</select>"."</br>";
							echo "</br>"."<input type='submit' value='Enviar'>";
							}
							echo "</form>";
                    ?>
					<?php endif ?>
					<div id="footerleft">
          
            </div>
            <div id="footerright">
                <p>Copyright &copy; 2016, Desarrollada por <a href="">Velasco</a></p>
            </div>
		</div>
	</div>
</body>
</html>
