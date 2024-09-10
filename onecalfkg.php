<?php
// Database connection settings
require_once "sidebar.php";


// Get the calf ID from the query parameter
$calfId = isset($_GET['calfId']) ? $_GET['calfId'] : 'Cattle ID belirtilmemiş';
echo $calfId;

// SQL query to select data
$sql = "SELECT * FROM weight w
        JOIN calf c ON w.calfRFid = c.RFIDNumber
        WHERE c.RFIDNumber= :calfId";

try {
    // Prepare and execute the query
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['calfId' => $calfId]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if any data was fetched
    if ($data) {
        // Data fetched successfully
    } else {
        echo 'No data found';
    }
} catch (PDOException $e) {
    // Handle query error
    die('Query failed: ' . $e->getMessage());
}
?>

<link rel="stylesheet" href="assets/css/onecalf.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<div class="container text-center" style="margin-top: 120px;">
    <div class="row">
        <div class="col-6 col-sm-6" style="margin:auto;">
            <h2><?php echo isset($data[0]['earTagNumber']) ? $data[0]['earTagNumber'] : 'No data'; ?></h2>
        </div>
        <div class="w-100 d-none d-md-block"></div>
        <div class="col-8 col-sm-8" style="overflow-y: scroll; height: calc(100vh - 100px); margin:auto;">
            <table class="table table-striped table-hover">
                <thead style="top:0; position: sticky; z-index:0;background-color: #dee2e6;">
                    <tr>
                        <th>Takma Adı</th>
                        <th >Sarı Küpe No</th>
                        <th >RFID Küpe No</th>
                        <th>KİLOSU</th>

                    </tr>
                </thead>
                <tbody>
                    <?php if ($data) : ?>
                        <?php foreach ($data as $calf) : ?>
                            <tr>
                                <td><?php echo $calf['nickName']; ?></td>
                                <td><?php echo $calf['earTagNumber']; ?></td>
                                <td><?php echo $calf['RFIDNumber']; ?></td>
                                <td style="font-weight: bold; font-size:18px"><?php echo $calf['kg']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
