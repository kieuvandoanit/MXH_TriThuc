<h2>Quản lí bài đăng</h2>
    <br>
    <div class="homeCard">
            <div>
                
                <b><?php echo (isset($data['postNumber'])?$data['postNumber'][0]['number']:'Đang cập nhật'); ?> Bài viết   <i class="far fa-newspaper"></i></b> 
                
            </div>
            <div style="background-color: rgb(104, 154, 230);">
                <b><?php echo (isset($data['commentNumber'])?$data['commentNumber'][0]['number']:'Đang cập nhật'); ?> Bình luận <i class="far fa-comment-alt"></i></b> 
            </div>
            <div>
                <b><?php echo (isset($data['userNumber'])?$data['userNumber'][0]['number']:'Đang cập nhật'); ?> Người dùng <i class="fas fa-user-friends"></i></b>
            </div>
    </div>
    <br>
    <br>
<h2>Số lượng đăng bài</h2>
    <div class="">
        <div id="curve_chart" style="height: 300px"></div>
    </div>
                
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    var data1=<?php echo json_encode($data['postPerMonth']) ?>;
    
    function drawChart() {
        var data = google.visualization.arrayToDataTable(data1);
        var options = {
        // title: 'Company Performance',
        // curveType: 'function',
        legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }
</script>