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
</head>
<body>
   <div id="page" style="float:left;">
	<div id="info1" style="">
		    <?php
        //conexion a la base de datos-peliculas
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
        if($connection->connect_errno){
            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
        }
        $result=$connection->query("SELECT peliculas.id_pelicula,peliculas.titulo,directores.id_director,directores.nombre FROM peliculas join dirigida_por on peliculas.id_pelicula=dirigida_por.id_pelicula join directores on dirigida_por.id_director=directores.id_director;");
		echo "<h3>Registros 'Dirigida_por'</h3>";
		?>
		<table border=1 class="centered bordered card-panel white"  style="text-align:center;">
            <tr class="card-panel teal lighten-2 white-text" style="font-weight:bold">
				<td>Id_pelicula</td>
                <td>titulo</td>
                <td>Id_director</td>
                <td>Nombre</td>
            </tr>
            
        <?php
            while($obj=$result->fetch_object()){
                echo "<tr>";
                echo "<td>$obj->id_pelicula</td>";
                echo "<td>$obj->titulo</td>";
                echo "<td>$obj->id_director</td>";
                echo "<td>$obj->nombre</td>";
                echo "</tr>";   
            }
			echo "</br>"."<a href='../../../Proyecto/administracion_bd.php'>"."<input type='button' value='Volver a panel' style='font-family: Verdana; font-size: 10 pt'>"."</a>"."</br>";
			$result->close();
            unset($obj);
            unset($connection);
        ?>
        </table>
		</div>
		</div>
	<img src='/Proyecto/sql/BD_vista_grafica.jpg' style='float:left;height:500px;width:600;margin-left:10px;'/>
	</body>
	</html>