<?php
echo "<h1>".$_SERVER['SERVER_NAME'] ."</h1></br></br>";
echo "<h1>".$_SERVER['SERVER_ADDR'] ."</h1></br></br>";
echo "<h1>".$_ENV['OPENSHIFT_MYSQL_DB_HOST'] ."</h1></br></br>";
var_dump($_SERVER)."</br></br>";
echo "<h1>esto es el dolar env</h1></br></br>";
var_dump($_ENV)."</br></br>";
?>
