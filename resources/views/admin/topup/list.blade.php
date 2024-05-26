@extends('admin.layout')
@section('content')
    <div class="modal fade" id="TopUpConfirmBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="TopUpConfirmBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header background-primary">
                    <h5 class="modal-title text-white fw-bold" id="TopUpConfirmBackdropLabel">Xử lý yêu cầu nạp tiền</h5>
                </div>
                <form id="topup-form" action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="text-center">
                            <i style="font-size: 70px" class="fa-solid fa-question text-color-primary"></i>
                        </div>
                        <h5 id="topup-title-action" class="text-center mb-2 text-color">Action?</h5>
                        <p class="text-center mb-0">Quá trình này không thể hoàn tác?</p>
                        <input type="hidden" id="topup-id" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Quay lại</button>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <h1 class="h3 mb-4 text-gray-800">
        Quản lý người dùng</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Lịch sử nạp tài khoản</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="custom-table table table-bordered table-hover" id="Table" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th class="text-color">Mã giao dịch</th>
                            <th>Người dùng</th>
                            <th>Phương thức</th>
                            <th>Số tiền</th>
                            <th>Thời gian</th>
                            <th>Trạng thái</th>
                            <th data-orderable="false">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topups as $topup)
                            <tr>
                                <td class="align-middle">{{ $topup->id }}</td>
                                <td class="align-middle"><img class="rounded-circle object-fit-cover me-2" width="30px"
                                        height="30px" src="{{ $topup->user_info->avatar_url }}"
                                        alt="">{{ $topup->user_info->name }}</td>
                                <td class="align-middle">{{ $topup->method }}</td>
                                <td class="align-middle">{{ $topup->amount }} </td>
                                <td class="align-middle">{{ $topup->created_at }}</td>
                                <td class="align-middle">
                                    @if ($topup->status == 'success')
                                        <small class="bg-success text-white p-1 rounded">hoàn thành</small>
                                    @elseif($topup->status == 'pending')
                                        <small class="bg-info text-white p-1 rounded">chờ xử lý</small>
                                    @elseif($topup->status == 'cancelled')
                                        <small class="bg-warning text-white p-1 rounded">đã hủy</small>
                                    @else
                                        <small class="bg-danger text-white p-1 rounded">bị lỗi</small>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if ($topup->status == 'pending' || $topup->status == 'fail')
                                        <div class="d-flex">
                                            <button onclick="showTopUpRequestForm('{{ $topup->id }}', 'success')"
                                                data-bs-toggle="modal" data-bs-target="#TopUpConfirmBackdrop"
                                                class="mx-1 btn btn-sm btn-success"><i
                                                    class="bi bi-check-circle-fill"></i></button>
                                            <button onclick="showTopUpRequestForm('{{ $topup->id }}', 'cancel')"
                                                data-bs-toggle="modal" data-bs-target="#TopUpConfirmBackdrop"
                                                class="mx-1 btn btn-sm btn-danger"><i
                                                    class="bi bi-x-circle-fill"></i></button>
                                        </div>
                                    @else
                                        <div class="d-flex">
                                            <button disabled class="mx-1 btn btn-sm btn-success"><i
                                                    class="bi bi-check-circle-fill"></i></button>
                                            <button disabled class="mx-1 btn btn-sm btn-danger"><i
                                                    class="bi bi-x-circle-fill"></i></button>
                                        </div>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
