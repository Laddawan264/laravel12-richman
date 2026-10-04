<x-weight-layout>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>รายงานกราฟแสดงแนวโน้มน้ำหนัก</h2>
        <a href="{{ route('weights.index') }}" class="btn btn-outline-secondary">← กลับหน้าบันทึกข้อมูล</a>
    </div>

    <!-- แสดงผล Google Chart -->
    <div class="card p-3 shadow-sm">
        <div id="curve_chart" style="width: 100%; height: 400px"></div>
    </div>

    <!-- Script Google Chart -->
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'วันที่');
            data.addColumn('number', 'น้ำหนัก (กก.)');

            var rows = [];

            <?php
            $chartData = \App\Models\Weight::orderBy('recorded_at', 'asc')->get();
            foreach ($chartData as $w):
            ?>
                rows.push(['<?= $w->recorded_at ?>', <?= (float)$w->weight ?>]);
            <?php endforeach; ?>

            if (rows.length > 0) {
                data.addRows(rows);
            } else {
                data.addRow(['<?= date('Y-m-d') ?>', 0]);
            }

            var options = {
                title: 'แนวโน้มน้ำหนักร่างกาย',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                },
                vAxis: {
                    minValue: 0
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(data, options);
        }
    </script>
</x-weight-layout>