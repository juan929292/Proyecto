<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  </head>
  <body style="background-color:darkred; ">

	<div style="width:1000px;margin: 0 auto;margin-top:41px;">
		<div>
			<h1 style="margin-left:25px;margin-bottom:25px;color:white;text-decoration: underline;">Instalador Aplicación Web</h1>
		</div>
			  
		<div class='form-group col-lg-5'>
			<form action="instalador.php" method="post">
				<div class="form-group">
					<input type="text" name="user" class="form-control input-lg " placeholder="Usuario (acceso BD)" required>
				</div>
		</div>
		
		<div class="form-group col-lg-5">
			<div class="form-group">
				<input type="password" name="pass" class="form-control input-lg" placeholder="Contraseña (acceso BD)">
			</div>
		</div>
		
		<div class="form-group col-lg-5">
			<div class="form-group">
				<input type="text" name="formhost" class="form-control input-lg" placeholder="Host de la BD " required>
			</div>
		</div>
		
		<div class="form-group col-lg-5">
		  <div class="form-group">
			  <input type="text" name="formbd" class="form-control input-lg" placeholder="Nombre de la BD" required>
			</div>
		</div>
		
		<div class="form-group col-lg-5">
			<input style="background-color:white;color:#0C5484; float:right;" type="submit" value="Instalar" class="btn btn-primary pull-left">
		</div>
	</form>	
</div>
	<?php
          if(isset($_POST["user"])){
              $usuario=$_POST["user"];
              $password=$_POST["pass"];
              $bd=$_POST["formbd"];
			  $host=$_POST["formhost"];
			  $connection= new mysqli($host, $usuario, $password, $bd);
              if ($connection->connect_errno) {
                   printf("Connection failed: %s\n", $connection->connect_error);
                   exit();
              }
			  else{
				include_once("database.php");
                $file = fopen("configurationdb.php", "w");
                fwrite($file, "<?php"."\n");
                fwrite($file, "$"."username="."'".$usuario."';"."\n");
                fwrite($file, "$"."password="."'".$password."';"."\n");
                fwrite($file, "$"."database="."'".$bd."';"."\n");
                fwrite($file, "$"."localhost="."'".$host."';"."\n");
                fwrite($file, "?>"."\n");
                fclose($file);
//              unlink("instalador.php");
//				unlink("database.php");
//				unlink("../instalador.php");
                header("Location: ./Proyecto/index.php");
              }
          }
	?>
    </div>
  </body>
</html>
