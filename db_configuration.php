<?php
if (isset($_ENV['OPENSHIFT_APP_NAME'])) {
$db_user=$_ENV['OPENSHIFT_MYSQL_DB_USERNAME'];
$db_host=$_ENV['OPENSHIFT_MYSQL_DB_HOST'];
$db_password=$_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'];
$db_name='instalador';
} else {
$db_user='root';
$db_host='localhost';
$db_password='';
$db_name='instalador';
}
?>
