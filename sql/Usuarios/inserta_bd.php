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
   <div>
    <?php if (!isset($_POST["val2"])) : ?>
		<h2>Añadir Usuario</h2>
                    <?php
							echo "<form method='post' action='#' onsubmit='return checkForm(this);'>";
								echo "<input required value='NULL' type='hidden' placeholder='NULL' name='val1' readonly='readonly'>"."</br>";
								echo "<h3>Nombre:</h3>";
								echo "<input required type='text' name='val2'>"."</br>";
								echo "<h3>contrasena:</h3>";
								echo "<input required type='password' title='La contrasena debe contener al menos 6 caracteres, incluyendo minusculas, mayusculas y numeros' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}' onchange='this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
  if(this.checkValidity()) form.pwd2.pattern = this.value;' name='val3'>"."</br>";
								echo "<h3>confirmar contrasena:</h3>";
								echo "<input required type='password' title='Por favor introduzca la misma contrasena que antes' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}' name='pwd2' onchange=".'"'."
  this.setCustomValidity(this.validity.patternMismatch ? this.title : '');>".'"'."</br>";
								echo "<h3>Correo:</h3>";
								echo "<input required type='email' placeholder='example@example.com' name='val4'>"."</br>";
								echo "<h3>Tipo de usuario:</h3>";
								echo "<select required multiple name='val5'>";
								echo "<option value='admin'>Administrador</option>";
								echo "<option value='estandar'>Estandar</option>";
								echo " </select></br>";
							echo "</br>"."<input type='submit' value='Enviar'>";
							echo "</form>";
                    ?>
					<?php else: ?>
					<?php
							$idusu=$_POST['val1'];
							$nomb=$_POST['val2'];
							$cont=$_POST['val3'];
							$corr=$_POST['val4'];
							$tip=$_POST['val5'];
							$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
                        if($connection->connect_errno){
                            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
								} 
								$consulta="insert into usuarios(id_usuario,nombre,contrasena,correo,tipo) VALUES($idusu,'$nomb','$cont','$corr','$tip');";
								echo "</br>";
								if($connection->query($consulta)==true){
									echo "<h2>Inserción realizada correctamente, Redireccionando...</h2>";
								}else{
									echo $connection->error;   
								}
								unset($connection);

								header('Refresh:3; url=/Proyecto/sql/Usuarios/resultado.php',True,303)
						?>
					<?php endif ?>
    </div>
</body>
</html>