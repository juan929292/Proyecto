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
        $result=$connection->query("SELECT * FROM valoraciones");
		$result2=$connection->query("SELECT * FROM usuarios");
		echo "<h3>Valoraciones</h3>";
		?>
		<table border=1 class="centered bordered card-panel white"  style="text-align:center;float:left;">
            <tr class="card-panel teal lighten-2 white-text" style="font-weight:bold">
                <td>Titulo(Peliculas)</td>
				<td>Id_valoracion</td>
                <td>nota</td>
                <td>id_usuario</td>
				<td>id_usuario(Usuarios)</td>
				<td>Nombre(Usuarios)</td>
            </tr>
            
        <?php
		
					echo "</br>"."<a href='../../../Proyecto/administracion_bd.php'>"."<input type='button' value='Volver a panel' style='font-family: Verdana; font-size: 10 pt'>"."</a>"."</br>";
            while($obj=$result->fetch_object()){
                echo "<tr>";
				$result3=$connection->query("SELECT peliculas.titulo FROM usuarios join valoraciones on
					usuarios.id_usuario=valoraciones.id_usuario join posee on
					valoraciones.id_valoracion=posee.id_valoracion join peliculas on posee.id_pelicula=peliculas.id_pelicula where valoraciones.id_usuario=".$obj->id_usuario .";");
				while($obj3=$result3->fetch_object()){
					echo "<td>$obj3->titulo</td>";
				
                echo "<td>$obj->id_valoracion</td>";
                echo "<td>$obj->nota</td>";
                echo "<td>$obj->id_usuario</td>";
				$result3=$connection->query("SELECT nombre,id_usuario FROM usuarios where id_usuario=".$obj->id_usuario .";");
				while($obj2=$result3->fetch_object()){
				echo "<td>$obj2->id_usuario</td>";
				echo "<td>$obj2->nombre</td>";
				}
				}
                echo "</tr>";   
            }
			echo "</table>";
			$result->close();
			$result2->close();
			$result3->close();
            unset($obj);
            unset($connection);
        ?>
        </table>
	</div>
	</div>
	<img src='/Proyecto/sql/BD_vista_grafica.jpg' style='float:left;height:500px;width:600;margin-left:10px;'/>
	</body>
	</html>