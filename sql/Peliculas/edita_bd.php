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
                echo "<td><a href='edita_bd.php?idd=$obj->id_pelicula'><img width=26 src='/Proyecto/img/edita.PNG'/></a></td>";
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
								echo "<h3>Editar pelicula: ".$obj->titulo ."</h3>";
								echo "<input required type='hidden' value=".$obj->id_pelicula ." name='val1' readonly='readonly'>"."</br>";
								echo "<h3>titulo:</h3>";
								echo "<input required type='text' placeholder="."'".$obj->titulo ."'"." name='val2'>"."</br>";
								echo "<h3>duracion:</h3>";
								echo "<input required type='text' name='val3'>"."</br>";
								echo "<h3>anio:</h3>";
								echo "<input required type='text' placeholder="."'".$obj->anio ."'"." name='val4'>"."</br>";
								echo "<h3>nota_media:</h3>";
								echo "<input required type='text' placeholder=".$obj->nota_media ." name='val5'>"."</br>";
								echo "<h3>imagen:</h3>";
								echo "<input required type='file' name='val6'>"."</br>";
							echo "</br>"."<input type='submit' value='Enviar'>";
							}
							echo "</form>";
                    ?>
					<?php endif ?>
</body>
</html>
