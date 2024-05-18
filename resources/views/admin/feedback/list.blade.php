@extends('admin.layout')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Phản hồi người dùng</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Danh sách phản hồi</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="Table">
                    <thead>
                        <tr>
                            <th class="text-nowrap">#</th>
                            <th class="text-nowrap">Người dùng</th>
                            <th class="text-nowrap">Tiêu đề</th>
                            <th class="text-nowrap">Mô tả</th>
                            <th class="text-nowrap">Thời gian</th>
                            <th class="text-nowrap" data-orderable="false">Đã trả lời</th>
                            <th class="text-nowrap" data-orderable="false">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $feedback)
                            <tr>
                                <td class="align-middle">{{ $feedback->id }}</td>
                                <td class="align-middle">{{ $feedback->getUser->name }}</td>
                                <td class="align-middle">{{ $feedback->title }}</td>
                                <td class="align-middle">{{ $feedback->description }}</td>
                                <td class="align-middle">{{ $feedback->created_at }}</td>
                                <td class="align-middle">{{ count($feedback->getReply) }} trả lời</td>
                                <td class="align-middle">
                                    <div class="btn btn-sm btn-info"><i class="bi bi-eye"></i></div>
                                    <div class="btn btn-sm btn-primary"><i class="bi bi-reply"></i></div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
