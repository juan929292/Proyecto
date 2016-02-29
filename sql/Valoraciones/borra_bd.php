<?php 
session_start();
include_once("../../db_configuration.php");
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
        $result=$connection->query("SELECT * FROM valoraciones");

echo "<h3>Borrar Valoracion</h3>";
		?>
		<table class="centered bordered card-panel white"  style="text-align:center;">
            <tr class="card-panel teal lighten-2 white-text" style="font-weight:bold">
                <td>Id_valoracion</td>
                <td>nota</td>
                <td>id_usuario</td>
				<td>id_usuario(Usuarios)</td>
				<td>Nombre(Usuarios)</td>
            </tr>
            
        <?php
                echo "<tr>";
				while($obj=$result->fetch_object()){
                echo "<tr>";
                echo "<td>$obj->id_valoracion</td>";
                echo "<td>$obj->nota</td>";
                echo "<td>$obj->id_usuario</td>";
				$result3=$connection->query("SELECT nombre,id_usuario FROM usuarios where id_usuario=".$obj->id_usuario .";");
				while($obj2=$result3->fetch_object()){
				echo "<td>$obj2->id_usuario</td>";
				echo "<td>$obj2->nombre</td>";
				echo "<td><a href='borra_bd.php?idd=$obj->id_valoracion'><img width=26 src='/proyecto/img/borra.png'/></a></td>";
				}  
            }
                echo "</tr>";   

        ?>
        </table>
	</div>
	<?php else: ?>
				<?php
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
                        if($connection->connect_errno){
                            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
								}
								$idval=$_GET['idd'];
								$consulta="DELETE FROM valoraciones WHERE id_valoracion=$idval;";
								echo "</br>";
								if($connection->query($consulta)==true){
									echo "<h2>Borrado realizado correctamente, Redireccionando...</h2>";
								}else{
									echo $connection->error;   
								}
								unset($connection);

								header('Refresh:3; url=/Proyecto/sql/Valoraciones/resultado.php',True,303);
					?>
								<?php endif ?>
</body>
</html>
