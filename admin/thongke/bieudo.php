<div class="row">
    <div class="row mb headeradmin" style="width:1050px;">
        <h1 style="padding: 15px 0;">ADMIN </h1>
    </div>
    <div class="row formtittle" style="width:143%;">
        <h3>BIỂU ĐỒ THỐNG KÊ</h3>
    </div>
    <div class="row formcontent">
        <form action="index.php?act=thongke" method="post">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <div id="myChart" style="width:100%; max-width:1000px; height:700px;">
            </div>
            <script>
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Loại phòng', 'Số lượng số lượng phòng'],
                        <?php
                        $tonglp = count($listthongke);
                        $i = 1;
                        foreach ($listthongke as $thongke) {
                            extract($thongke);
                            if ($i == $tonglp) $dauphay = "";
                            else $dauphay = ",";
                            echo "['" . $thongke['tenlp'] . "', " . $thongke['countp'] . "]" . $dauphay;
                            $i += 1;
                        }
                        ?>
                    ]);
                    var options = {
                        title: 'Phòng Theo Loại Phòng', 'width':1150, 'height':700,
                        is3D: true
                    };
                    var chart = new google.visualization.PieChart(document.getElementById('myChart'));
                    chart.draw(data, options);
                }
            </script>
            
<div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>

<!-- <script>
google.charts.load('current',{packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
// Set Data
var data = google.visualization.arrayToDataTable([
  ['Price', 'Size'],
  [50,7],[60,8],[70,8],[80,9],[90,9],
  [100,9],[110,10],[120,11],
  [130,14],[140,14],[150,15]
]);
// Set Options
var options = {
  title: 'House Prices vs. Size',
  hAxis: {title: 'Square Meters'},
  vAxis: {title: 'Price in Millions'},
  legend: 'none'
};
// Draw
var chart = new google.visualization.LineChart(document.getElementById('myChart'));
chart.draw(data, options);
}
</script> -->
        </form>
    </div>
</div>
</div>