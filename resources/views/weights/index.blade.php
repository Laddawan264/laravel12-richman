<x-weight-layout>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>ระบบติดตามน้ำหนักร่างกาย</h2>
        <a href="{{ route('weights.chart') }}" class="btn btn-outline-primary">ดูรายงานกราฟ 📊</a>
    </div>

    <!-- ฟอร์มบันทึกน้ำหนัก -->
    <div class="card mb-4 p-3 shadow-sm">
        <h4>บันทึกน้ำหนัก</h4>
        <form action="{{ route('weights.store') }}" method="POST" class="row g-3 mt-1">
            @csrf
            <div class="col-auto">
                <input type="number" step="0.1" name="weight" class="form-control" placeholder="น้ำหนัก (กิโลกรัม)" required>
            </div>
            <div class="col-auto">
                <input type="date" name="recorded_at" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
            </div>
        </form>
    </div>

    <!-- ตารางแสดงรายการข้อมูล -->
    <div class="card p-3 shadow-sm">
        <h4>รายการบันทึกย้อนหลัง</h4>
        <table class="table table-bordered table-striped mt-2">
            <thead>
                <tr>
                    <th>วันที่</th>
                    <th>น้ำหนัก (กก.)</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($weights as $item)
                <tr>
                    <td>{{ $item->recorded_at }}</td>
                    <td>{{ $item->weight }} kg</td>
                    <td>
                        <form action="{{ route('weights.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล?')">ลบ</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-weight-layout>