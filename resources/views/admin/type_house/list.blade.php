@extends('admin.layout')
@section('content')
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="staticBackdropLabel">Lỗi </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="type-form" action="" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="type-id">
                    <div class="modal-body">
                        <div class="mb-2">
                            <lable class="form-label">Tên loại hình</lable>
                            <input id="type-name" type="text" name="type_name" class="form-control">
                            {{-- <div class="invalid-feedback">{{ $errors->first('services_name') }}</div> --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy</button>
                        <button id="type-submit" type="submit" class="btn btn-primary">Button</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <h1 class="h3 mb-4 text-gray-800">Quản lý loại hình nhà</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Danh sách loại hình nhà ở</h6>
                <button onclick="showTypeHouseForm('')" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                    class="btn btn-sm btn-primary"><i class="fa-solid fa-user-plus"></i> Thêm mới</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="custom-table table table-sm table-bordered table-hover" id="Table" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th data-orderable="false" class="text-color">#</th>
                            <th>Tên loại hình</th>
                            <th data-orderable="false">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                            <tr>
                                <td class="align-middle">{{ $type->id }}</td>
                                <td class="align-middle">{{ $type->type_name }}</td>
                                <td class="align-middle">
                                    <div onclick="showTypeHouseForm('{{ $type->id }}')" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                        class="btn btn-sm btn-info mx-1" title="Sửa thông tin"><i
                                            class="bi bi-pencil-square"></i></div>
                                    {{-- <a href="#" class="btn btn-sm btn-danger mx-1"><i class="bi bi-trash"></i></a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
