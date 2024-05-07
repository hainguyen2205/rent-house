@extends('admin.layout')
@section('content')
    <div class="flex justify-content-center">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong><i class="bi bi-check-circle"></i> Success!</strong> {{ Session::get('success') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                <strong><i class="bi bi-exclamation-circle"></i> Warning!</strong> Kiểm tra lại các thông tin.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong><i class="bi bi-exclamation-circle"></i> Warning!</strong> {{ Session::get('error') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <h1 class="h3 mb-4 text-gray-800">Quản lý tin đăng</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Danh sách người dùng</h6>
                <button onclick="showCreateForm()" data-toggle="modal" data-target="#userModal"
                    class="btn btn-sm btn-primary"><i class="fa-solid fa-user-plus"></i> Thêm mới</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="custom-table table table-sm table-bordered table-hover" id="userTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th class="text-color">#</th>
                            <th>Tên dịch vụ</th>
                            <th>Icon thể hiện</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td class="align-middle">{{ $service->id }}</td>
                                <td class="align-middle">{{ $service->services_name }}</td>
                                <td class="align-middle">{!! html_entity_decode($service->icon) !!} - {{ $service->icon }}</td>
                                <td class="align-middle">
                                    <div class="d-flex justify-content-center">
                                        <div data-toggle="modal" data-target="#userModal" class="btn btn-sm btn-info"
                                            title="Sửa thông tin"><i class="bi bi-pencil-square"></i></div>
                                        <div class="btn mx-2 btn-sm btn-danger" title="Xóa" data-toggle="modal"
                                            data-target="#confirmModal"><i class="bi bi-trash"></i></div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
