<?php 



DEFINE('DB_HOST', 'localhost');
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', 'root');
DEFINE('DB_NAME', 'mobileshopdb');
DEFINE('DB_PORT', '8889');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
// Set the encoding...optional but recommended
$conn->set_charset("utf8");
 





?>





