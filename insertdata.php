<?php
// require_once "database.php";


$dsn = "mysql:host=localhost;port=3306;dbname=tarti";
$dbusername = "tarti@haytek.mooo.com";
$dbpassword = "BELZd2IcJo7tk3g";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "bağlantı başarılı"."<br>";
} catch (PDOException $e) {
    echo "Bağlantı hatası: "."<br>" . $e->getMessage();
}

// echo "sayfa açıldıIII"."<br>";

$rfidNumber = $_POST['tag'];
$kg = $_POST['median'];

// echo $rfidNumber."<br>";
// echo $kg;

// Verileri weight tablosuna ekle
$sql = "INSERT INTO weight (calfRfid, kg) VALUES (:rfidNumber, :kg)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':rfidNumber', $rfidNumber);
$stmt->bindParam(':kg', $kg);

try {
    $stmt->execute();
    echo "Yeni kayıt başarıyla oluşturuldu";
} catch (PDOException $e) {
    echo "Hata: " . $e->getMessage();
}

$pdo = null; // Bağlantıyı kapat
