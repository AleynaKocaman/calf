<?php
require_once "sidebar.php";
$sql = "SELECT c.earTagNumber, c.nickName,c.RFIDNumber, c.id, FORMAT(AVG(w.kg), 2) AS average_weight
        FROM calf c 
        JOIN weight w ON w.calfRFid = c.RFIDNumber
        GROUP BY c.earTagNumber, c.id;";



$result = $pdo->query($sql);
$data = array();

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
  $data[] = $row; // Verileri diziye ekliyoruz
}

$dataJSON = json_encode($data);

?>
<script src="https://code.highcharts.com/es5/highcharts.js"></script>

<div class="container" style="margin-top: 120px;">
  <div class="row">
    <div class="col-9 col-sm-12">
      <div id="calf" style="height:1800px;">
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    let chartId = 'calf';
    let data = <?php echo $dataJSON; ?>;
    console.log(data);

    Highcharts.chart(chartId, {
      accessibility: {
        enabled: true
      },
      chart: {
        type: 'bar', 
        zoomType: 'xy',
      },
      credits: {
        enabled: false
      },
      title: {
        text: 'Ortalama Buzağı Kilosu (kg)' 
      },
      xAxis: {
        categories: data.map(item =>  item.nickName ) 
      },
      yAxis: {
        title: {
          text: 'Ortalama Buzağı Kilosu (kg)'
        }
      },
      plotOptions: {
        bar: {
          pointWidth: 30,
          pointPadding: 0.1,
          groupPadding: 0.2,
          events: {
            click: function(event) {
              // Tıklanan çubunun indeksini alın
              let index = event.point.index;
              // Veriden calf_id değerini alın
              let calfId = data[index].RFIDNumber;
              window.location.href = 'onecalfkg.php?calfId=' + calfId;
            }
          }
        }
      },

      series: [{
        name: 'Ortalama Buzağı Kilosu (kg)', // Seri adı değiştirildi
        data: data.map(item => parseFloat(item.average_weight)),
 // Veri alımı değiştirildi
        color: '#7cb5ec' // Renk eklendi
      },
    ]
    });
  });
</script>