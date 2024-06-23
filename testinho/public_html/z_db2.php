<?php
$con = new mysqli("testinho_mariadb", "root", "root", "u315642386_portfolio");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}