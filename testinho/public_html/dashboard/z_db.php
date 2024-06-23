<?php
try {
    $con = new PDO("mysql:host=testinho_mariadb;dbname=u315642386_portfolio;charset=utf8mb4", "root", "root");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $url = "";
} catch (PDOException $e) {
    echo "Failed to connect to MySQL: " . $e->getMessage();
}
