<?php

$dsn = "mysql:host=localhost;port=3306;dbname=tarti";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "bağlantı başarılı";

} catch (PDOException $e) {
    echo "Bağlantı hatası: "."<br>" . $e->getMessage();
}

