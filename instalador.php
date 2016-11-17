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
		  
    <div class='form-group col-lg-5'>
            <form action="instalador.php" method="post">

    					<div class="form-group">
                <input type="text" name="user" class="form-control input-lg " placeholder="Usuario (acceso BD)" required>		</div>
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
						 <!-- <div class='form-group col-lg-5'>
    					<div class="form-group">
						<p style="font-size:20px;margin-top:10px;color:white">Nuevo USUARIO administrador para aplicación:</p>
                <input type="text" name="useraw" class="form-control input-lg " placeholder="Usuario aplicación" required>		</div>
    				</div>
					<div class='form-group col-lg-5'>
    					<div class="form-group">
						<p style="font-size:20px;margin-top:10px;color:white">Nueva CONTRASEÑA administrador para aplicación:</p>
                <input type="text" name="passaw" class="form-control input-lg " placeholder="Contraseña aplicación" required>		</div>
    				</div>
					-->
            <div class="form-group col-lg-5">
                <p style="font-size:20px;margin-top:10px;color:white">Contenido de la Base de Datos:</p>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="form-group">
            <select class="form-control input-lg" name="content" required>
              <option class="form-control input-lg" value="completa">Tablas y contenido</option>
			  <option class="form-control input-lg" value="datos">Solo contenido</option>
              <option class="form-control input-lg" value="no_completa">Solo tablas</option>
            </select>
              </div>
            </div>
            <div class="form-group col-lg-5">
            <input style="background-color:white;color:#0C5484" type="submit" value="Instalar" class="btn btn-primary pull-left">
            </div>
            </div>
            </div>
          </div>
          </div>

        </form>
  <?php
          if(isset($_POST["user"])){
              $contenido=$_POST["content"];
              $usuario=$_POST["user"];
              $password=$_POST["pass"];
              $bd=$_POST["formbd"];
			  $bd_e=$_POST["formbd"]. "_estructure";
			  $bd_d=$_POST["formbd"]. "_data";
              if(!isset($_POST["formhost"])){
				$host="localhost";
			  }
			  else{
				  if(isset($_ENV['OPENSHIFT_MYSQL_DB_HOST'];)){
					$host=$_ENV['OPENSHIFT_MYSQL_DB_HOST'];
				  }else{
					$host=$_POST["formhost"];
					}
			  }
			  echo $contenido."</br>"."</br>";
			  echo $usuario."</br>"."</br>";
			  echo $password."</br>"."</br>";
			  echo $bd."</br>"."</br>";
			  echo $host."</br>"."</br>";
			  echo $bd_e."</br>"."</br>";
			  echo $bd_d."</br>"."</br>";
			  $primeraconsulta="create database ". $bd.";";
			  $connection= mysqli_connect($host,$usuario,$password);
			  $first_result=$connection->query($primeraconsulta);
              if ($connection->connect_errno) {
                   printf("Connection failed: %s\n", $connection->connect_error);
                   exit();
              }
			  else{
				  
                if($contenido == 'completa'){
                  // Name of the file
                  $filename = $bd. ".sql";
                  // MySQL host
                  $mysql_host = $host;
                  // MySQL username
                  $mysql_username = $usuario;
                  // MySQL password
                  $mysql_password = $password;
                  // Database name
                  $mysql_database = $bd;
                  // Connect to MySQL server
                  // Temporary variable, used to store current query
                  $templine = '';
                  // Read in entire file
                  $lines = file($filename);
                  // Loop through each line
                  foreach ($lines as $line){
					  // Skip it if it's a comment
					  if (substr($line, 0, 2) == '--' || $line == '')
						  continue;
					  // Add this line to the current segment
					  $templine .= $line;
					  // If it has a semicolon at the end, it's the end of the query
					  if (substr(trim($line), -1, 1) == ';'){
							  // Perform the query
							  $connection->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
							  // Reset temp variable to empty
							  $templine = '';
						  }
                  }
                   echo "Base de datos completa importada correctamente";
				   
			    }
				   elseif($contenido == 'datos'){
				  // Name of the file
				  $filename = $bd_d. ".sql";
				  // MySQL host
				   $mysql_host = $host;
                  // MySQL username
                  $mysql_username = $usuario;
                  // MySQL password
                  $mysql_password = $password;
                  // Database name
                  $mysql_database = $bd_d;
                  // Connect to MySQL server
                  // Temporary variable, used to store current query
                  $templine = '';
                  // Read in entire file
                  $lines = file($filename);
                  // Loop through each line
                  foreach ($lines as $line)
                  {
                  // Skip it if it's a comment
                  if (substr($line, 0, 2) == '--' || $line == '')
                      continue;
                  // Add this line to the current segment
                  $templine .= $line;
                  // If it has a semicolon at the end, it's the end of the query
                  if (substr(trim($line), -1, 1) == ';')
                  {
                      // Perform the query
                      $connection->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
                      // Reset temp variable to empty
                      $templine = '';
                  }
                  }
                   echo "Datos importados correctamente";
                }else{
                  // Name of the file
                  $filename = $bd_e. ".sql";
                  // MySQL host
                  $mysql_host = $host;
                  // MySQL username
                  $mysql_username = $usuario;
                  // MySQL password
                  $mysql_password = $password;
                  // Database name
                  $mysql_database = $bd_e;
                  // Connect to MySQL server
                  // Temporary variable, used to store current query
                  $templine = '';
                  // Read in entire file
                  $lines = file($filename);
                  // Loop through each line
                  foreach ($lines as $line)
                  {
                  // Skip it if it's a comment
                  if (substr($line, 0, 2) == '--' || $line == '')
                      continue;
                  // Add this line to the current segment
                  $templine .= $line;
                  // If it has a semicolon at the end, it's the end of the query
                  if (substr(trim($line), -1, 1) == ';')
                  {
                      // Perform the query
                      $connection->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
                      // Reset temp variable to empty
                      $templine = '';
                  }
                  }
                   echo "Tablas importadas correctamente";
                }
				$file2 = fopen("./db_configuration.php", "w");
				fwrite($file2, "<?php"."\n");
				fwrite($file2, "if (isset("."$"."_ENV['OPENSHIFT_APP_NAME'])) {"."\n");
				fwrite($file2, "$"."db_user="."$"."_ENV['OPENSHIFT_MYSQL_DB_USERNAME'];"."\n");
				fwrite($file2, "$"."db_host="."$"."_ENV['OPENSHIFT_MYSQL_DB_HOST'];"."\n");
				fwrite($file2, "$"."db_password="."$"."_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'];"."\n");
				fwrite($file2, "$"."db_name="."Cine".";"."\n");
				fwrite($file2, "} else {"."\n");
                fwrite($file2, "$"."db_user="."'".$usuario."';"."\n");
                fwrite($file2, "$"."db_password="."'".$password."';"."\n");
                fwrite($file2, "$"."db_name="."'".$bd."';"."\n");
                fwrite($file2, "$"."db_host="."'".$host."';"."\n");
				fwrite($file2, "}"."\n");
                fwrite($file2, "?>"."\n");
				fclose($file2);
                unlink('instalador.php');
                unlink($bd. ".sql");
                unlink($bd_e. ".sql");
				unlink($bd_d. ".sql");
                header('Location:index.php');
              }
          }
        ?>
    </div>
  </body>
</html>
