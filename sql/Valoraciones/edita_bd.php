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

echo "<h3>Editar Valoracion</h3>";		?>
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
				echo "<td><a href='edita_bd.php?idd=$obj->id_valoracion'><img width=26 src='/proyecto/img/edita.png'/></a></td>";
				}  
            }
                echo "</tr>";   

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
							$result=$connection->query("SELECT * FROM valoraciones where id_valoracion=".$_GET['idd'].";");
							echo "<form method='post' action='edita_fila.php'>";
							while($obj=$result->fetch_object()){
								$result3=$connection->query("SELECT nombre,id_usuario FROM usuarios where id_usuario=".$obj->id_usuario .";");
								while($obj2=$result3->fetch_object()){
								echo "<h3>Editar valoracion de usuario: ".$obj2->nombre ." y id=>".$obj->id_valoracion."</h3>";
								}
								echo "<input required type='hidden' value=".$obj->id_valoracion ." name='val1' readonly='readonly'>"."</br>";
								echo "<h3>nota:</h3>";
								echo "<select required multiple name='val2'>";
								echo "<option value='0'>0</option>";
								echo "<option value='1'>1</option>";
								echo "<option value='2'>2</option>";
								echo "<option value='3'>3</option>";
								echo "<option value='3'>3</option>";
								echo "<option value='4'>4</option>";
								echo "<option value='5'>5</option>";
								echo "<option value='6'>6</option>";
								echo "<option value='7'>7</option>";
								echo "<option value='8'>8</option>";
								echo "<option value='9'>9</option>";
								echo "<option value='10'>10</option>";
								echo " </select></br>";
								echo "<input required type='hidden' value=".$obj->id_usuario ." name='val3' readonly='readonly'>"."</br>";
								echo " </select></br>";
							echo "</br>"."<input type='submit' value='Enviar'>";
							}
							echo "</form>";
                    ?>
					<?php endif ?>
</body>
</html>
