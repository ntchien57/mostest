<style>
    .main-footer{
        display:none !important;
    }
</style>
<div class="container box">
    <div class="box-header with-border">
        <h3 class="box-title"><span class="glyphicon glyphicon-list-alt"></span> Thống kê chi tiết
        </h3>
        <p style="color:red; padding-top:4px">Vui lòng chọn khoảng thời gian bạn muốn thống kê</p>
        <div class="box-tools">
            <form action="{{ url('system_admin/show_data_statis') }}" method="GET">
        <div class="box-tools">
            <div style="padding-top: 10px">
                    <input type="date" name="startDate"> <span> - </span>
                    <input type="date" name="endDate">
                    <input type="submit" value="Thống kê">
                </div>
            </form> 
        </div>
    </div>

    @if (isset($orders))
    <div class="row" style="padding:20px">
        <div class="col-md-2 btn-warning" style="padding: 10px 0;">
            <div style="padding: 0 20px">
                <h2>{{ $orders->count() }}</h2>
                <span>Tổng đơn hàng</span> 
            </div>
        </div>

        <div class="col-md-2 btn-success" style="padding: 10px 0;">
            <div style="padding: 0 20px">
                <h2>{{ $orders->where('status', 4)->count() }}</h2>
                <span>Đơn hoàn thành</span> 
            </div>
        </div>

        <div class="col-md-2 btn-danger" style="padding: 10px 0;">
            <div style="padding: 0 20px">
                <h2>{{ $orders->where('status', 3)->count() }}</h2>
                <span>Đơn hủy</span> 
            </div>
        </div>
        <div class="col-md-2 btn-info" style="padding: 10px 0;">
            <div style="padding: 0 20px">
                <h2>{{ $orders->where('status', 5)->count() }}</h2>
                <span>Đơn trả lại</span> 
            </div>
        </div>
        <div class="col-md-4 btn-primary" style="padding: 10px 0;">
            <div style="padding: 0 20px">
                <h2>{{ number_format($orders->where('status',4)->sum('total'),0,0,'.') }} VNĐ</h2>
                <span>Doanh thu của các đơn hoàn thành</span> 
            </div>     
         </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4>Top 5 sản phẩm bán chạy</h4>
            <table class="table table-bordered">   
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng đã bán</th>
                    <th>Doanh thu</th>
                </tr>
                @foreach ($topProducts  as $item)
                <tr>
                   
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item['product']->name }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ number_format($item['totalRevenue'],0,0,'.') }} đ</td>
                </tr>
                @endforeach                 
            </table>
            <style type="text/css">
                .history {
                    max-height: 50px;
                    max-width: 300px;
                    overflow-y: auto;
                }
            </style>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h4>Top 5 khách hàng mua nhiều nhất</h4>
            <table class="table table-bordered">   
                <tr>
                    <th>STT</th>
                    <th>Tên người dùng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Lượt mua hàng</th>
                </tr>
                @foreach ($topUsers  as $item)
                <tr>
                   
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->address1 }}</td>
                    <td>{{ $item->total_orders }}</td>
                </tr>
                @endforeach                 
            </table>
            <style type="text/css">
                .history {
                    max-height: 50px;
                    max-width: 300px;
                    overflow-y: auto;
                }
            </style>

        </div>
    </div>
    @endif

</div>