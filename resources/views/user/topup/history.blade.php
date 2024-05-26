@extends('user.layout_profile')
@section('right_content')
    <div class="mb-3 border-bottom pb-2">
        <h3 class="text-color-primary fw-bold mb-0"> Lịch sử nạp tiền vào tài khoản </h3>
    </div>
    <table id="table" class="table table-bordered">
        <thead>
            <tr>
                <th>Mã giao dịch</th>
                <th>Phương thức</th>
                <th>Số tiền</th>
                <th>Trạng thái</th>
                <th>Thời gian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($topup_requests as $topup_request)
                <tr>
                    <td>{{ $topup_request->id }}</td>
                    <td>{{ $topup_request->method }}</td>
                    <td>{{ number_format($topup_request->amount) }}</td>
                    <td>
                        @if ($topup_request->status == 'success')
                            <small class="bg-success text-white p-1 rounded">hoàn thành</small>
                        @elseif($topup_request->status == 'pending')
                            <small class="bg-info text-white p-1 rounded">chờ xử lý</small>
                        @elseif($topup_request->status == 'cancelled')
                           <small class="bg-warning text-white p-1 rounded">đã hủy</small>
                        @else
                        <small class="bg-danger text-white p-1 rounded">bị lỗi</small>
                        @endif
                    </td>
                    <td>{{ $topup_request->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
