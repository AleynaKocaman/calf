<?php
require_once "sidebar.php";

// Başlangıç mesajı
$message = "";

// Form submit edildiğinde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri al
    $kupeNo = $_POST['kupeNo'];
    $rfidNo = $_POST['rfidNo'];
    $takmaIsim = $_POST['takmaIsim'];
    $dogumTarihi = $_POST['dogumTarihi'];
    $annesininKupeNo = $_POST['annesininKupeNo'];
    $babasininKupeNo = $_POST['babasininKupeNo'];
    $annesininIrk = $_POST['annesininIrk'];
    $babasininIrk = $_POST['babasininIrk'];
    $typeId = $_POST['typeId'];

    // Veritabanına ekleme sorgusu
    $sql = "INSERT INTO calf (earTagNumber, RFIDNumber, nickname, birthDate, motherTagNumber, fatherTagNumber, motherTypeId, fatherTypeId, typeId) VALUES (:earTagNumber, :RFIDNumber, :nickname, :birthDate, :motherTagNumber, :fatherTagNumber, :motherTypeId, :fatherTypeId, :typeId)";


    // Sorguyu hazırla
    $stmt = $pdo->prepare($sql);

    // Değişkenleri bağla
    $stmt->bindParam(':earTagNumber', $kupeNo);
    $stmt->bindParam(':RFIDNumber', $rfidNo);
    $stmt->bindParam(':nickname', $takmaIsim);
    $stmt->bindParam(':birthDate', $dogumTarihi);
    $stmt->bindParam(':motherTagNumber', $annesininKupeNo);
    $stmt->bindParam(':fatherTagNumber', $babasininKupeNo);
    $stmt->bindParam(':motherTypeId', $annesininIrk);
    $stmt->bindParam(':fatherTypeId', $babasininIrk);
    $stmt->bindParam(':typeId', $typeId);

    // Sorguyu çalıştır
    if ($stmt->execute()) {
        $message = "Başarıyla eklendi."; // Başarı mesajı
    } else {
        $message = "Ekleme sırasında bir hata oluştu."; // Hata mesajı
    }
}

// Bütün buzağıları listele (en son eklenenden başlayarak)
$sql = "SELECT * FROM calf ORDER BY id DESC";
$stmt = $pdo->query($sql);
$calfList = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Tür listesini al
$typeSql = "SELECT id, type_name FROM type "; // Corrected column name
$typeStmt = $pdo->query($typeSql);
$typeList = $typeStmt->fetchAll(PDO::FETCH_ASSOC);
// Tür listesini bir lookup array'e dönüştür
$typeLookup = [];
foreach ($typeList as $type) {
    $typeLookup[$type['id']] = $type['type_name'];
}

?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        ._container {
            max-width: 1200px;
            margin: 150px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: center;
        }

        .form-container {
            max-width: 600px;
            margin: 20px auto;
            border: 1px solid #000;
            padding: 20px;
            border-radius: 5px;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }

        .form-row label {
            width: 150px;
            text-align: right;
            padding-right: 10px;
        }

        .form-row input,
        .form-row select {
            flex: 1;
            padding: 5px;
            margin: 5px;
            box-sizing: border-box;
        }

        .form-row input[type="submit"] {
            width: auto;
            margin-left: 160px;
        }

        .form-title {
            text-align: center;
            font-weight: bold;
        }
    </style>
    <title>Buzağı Ekleme</title>
</head>

<body>
    <div class="_container">
        <h2 class="form-title">Buzağı Bilgi Formu</h2>
        <div class="form-container">
            <form action="" method="POST">
                <div class="form-row">
                    <label for="kupeNo">Küpe No:</label>
                    <input type="text" id="kupeNo" name="kupeNo" required>
                </div>
                <div class="form-row">
                    <label for="rfidNo">RFID No:</label>
                    <input type="text" id="rfidNo" name="rfidNo" required>
                </div>
                <div class="form-row">
                    <label for="takmaIsim">Takma İsim:</label>
                    <input type="text" id="takmaIsim" name="takmaIsim" required>
                </div>
                <div class="form-row">
                    <label for="typeId">Tür:</label>
                    <select id="typeId" name="typeId" required>
                    <option>Seçiniz</option>

                        <?php foreach ($typeList as $type) : ?>

                            <option value="<?php echo $type['id']; ?>"><?php echo $type['type_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-row">
                    <label for="dogumTarihi">Doğum Tarihi:</label>
                    <input type="date" id="dogumTarihi" name="dogumTarihi" required>
                </div>
                <div class="form-row">
                    <label for="annesininKupeNo">Annesinin Küpe No:</label>
                    <input type="text" id="annesininKupeNo" name="annesininKupeNo" required>
                </div>
                <div class="form-row">
                    <label for="annesininIrk">Annesinin Irk:</label>
                    <select id="annesininIrk" name="annesininIrk" required>
                        <option>Seçiniz</option>
                        <?php foreach ($typeList as $type) : ?>
                            <option value="<?php echo $type['id']; ?>"><?php echo $type['type_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-row">
                    <label for="babasininKupeNo">Babasının Küpe No:</label>
                    <input type="text" id="babasininKupeNo" name="babasininKupeNo" required>
                </div>
                <div class="form-row">
                    <label for="babasininIrk">Babasının Irk:</label>
                    <select id="babasininIrk" name="babasininIrk" required>
                        <option>Seçiniz</option>
                        <?php foreach ($typeList as $type) : ?>
                            <option value="<?php echo $type['id']; ?>"><?php echo $type['type_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-row">
                    <input type="submit" value="EKLE">
                </div>
            </form>
        </div>

        <h2>Eklenen Buzağaların Listesi</h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Ear Tag Number</th>
                    <th scope="col">RFID Number</th>
                    <th scope="col">Nickname</th>
                    <th scope="col">Tür</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Annesinin Küpe No</th>
                    <th scope="col">Annesinin Irk</th>
                    <th scope="col">Babasının Küpe No</th>
                    <th scope="col">Babasının Irk</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($calfList) > 0) {
                    foreach ($calfList as $calf) {
                        echo "<tr>";
                        echo "<td>" . $calf['id'] . "</td>";
                        echo "<td>" . $calf['earTagNumber'] . "</td>";
                        echo "<td>" . $calf['RFIDNumber'] . "</td>";
                        echo "<td>" . $calf['nickName'] . "</td>";
                        echo "<td>" . (isset($typeLookup[$calf['typeId']]) ? $typeLookup[$calf['typeId']] : 'Bilinmiyor') . "</td>";
                        echo "<td>" . $calf['birthDate'] . "</td>";
                        echo "<td>" . $calf['motherTagNumber'] . "</td>";
                        echo "<td>" . (isset($typeLookup[$calf['motherTypeId']]) ? $typeLookup[$calf['motherTypeId']] : 'Bilinmiyor') . "</td>";
                        echo "<td>" . $calf['fatherTagNumber'] . "</td>";
                        echo "<td>" . (isset($typeLookup[$calf['fatherTypeId']]) ? $typeLookup[$calf['fatherTypeId']] : 'Bilinmiyor') . "</td>";

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>Tabloda hiç buzağı bulunamadı.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>