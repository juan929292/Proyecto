<?php
echo "<h6 style='padding:1% 1% 1% 1%;color:black;background-color:white;border-radius:10px;'>";
$hname=$_SERVER['SERVER_NAME'];
$soft=$_SERVER['SERVER_SOFTWARE'];
	if(isset($_ENV['OPENSHIFT_APP_NAME'])){
		$ip=$_ENV['OPENSHIFT_MYSQL_DB_HOST'];
		$pas=$_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'];
		$us=$_ENV['OPENSHIFT_MYSQL_DB_USERNAME'];
		echo "INFORMACIÓN SERVIDOR:"."</br></br>";
		echo "IP SERVIDOR -----------------------> ".$ip."</br></br>";
		echo "BD SERVIDOR -----------------------> ".$badatos."</br></br>";
		echo "PASS SERVIDOR -----------------------> ".$pas."</br></br>";
		echo "NOMBRE HOST SERVIDOR ----> ".$hname."</br></br>";
		echo "SOFTWARE SERVIDOR ----------> ".$soft."</br></br>";
	}
	else{
		$ip=$_SERVER['SERVER_ADDR'];
		echo "INFORMACIÓN SERVIDOR:"."</br></br>";
		echo "IP SERVIDOR -----------------------> ".$ip."</br></br>";
		echo "NOMBRE HOST SERVIDOR ----> ".$hname."</br></br>";
		echo "SOFTWARE SERVIDOR ----------> ".$soft."</br></br>";
	}
echo "</h6>";
?>