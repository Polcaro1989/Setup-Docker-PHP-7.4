<?php
$con = new mysqli("testinho-mariadb", "root", "root", "vogue");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>
