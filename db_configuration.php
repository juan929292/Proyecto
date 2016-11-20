<?php
if (isset($_ENV['OPENSHIFT_APP_NAME'])) {
$db_user=$_ENV['OPENSHIFT_MYSQL_DB_USERNAME'];
$db_host=$_ENV['OPENSHIFT_MYSQL_DB_HOST'];
$db_name='cine';
$db_password=$_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'];
}
else{
$db_user='root';
$db_password='';
$db_host='localhost';
$db_name='cine';
}
?>
