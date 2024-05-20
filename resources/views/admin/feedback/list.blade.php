@extends('admin.layout')
@section('content')
    <div class="modal fade" id="replyFeedbackModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header background-primary">
                    <h5 class="text-white fw-bold m-0" id="confirmModalLabel">Trả lời phản hồi</h5>
                </div>
                <form action="/admin/feedback/reply" id="feedback-form" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="" class="form-label">ID phản hồi</label>
                            <input type="text" readonly id="id_feedback" name="id_feedback" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Tiêu đề</label>
                            <input disabled type="text" id="title_feedback" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Nội dung
                            </label>
                            <textarea name="description" class="form-control" id="" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Trả lời</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="FeedbackModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header background-primary">
                    <h5 class="text-white fw-bold m-0" id="confirmModalLabel">Chi tiết phản hồi</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="" class="form-label">ID phản hồi</label>
                        <input type="text" readonly id="id-feedback" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Tiêu đề</label>
                        <input disabled type="text" id="title-feedback" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Nội dung
                        </label>
                        <textarea id="description-feedback" disabled class="form-control" id="" rows="3"></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Trả lời</label>
                        <ul id="list-reply-feedback" class="list-group">
                          </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

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
                                <td class="align-middle"><img class="rounded-circle object-fit-cover me-2" width="30px"
                                        height="30px" src="{{ $feedback->getUser->avatar_url }}"
                                        alt="">{{ $feedback->getUser->name }}</td>
                                <td class="align-middle">{{ $feedback->title }}</td>
                                <td class="align-middle">{{ $feedback->description }}</td>
                                <td class="align-middle">{{ $feedback->created_at }}</td>
                                <td class="align-middle">{{ count($feedback->getReply) }} trả lời</td>
                                <td class="align-middle">
                                    <div class="btn btn-sm btn-info" data-toggle="modal" data-target="#FeedbackModal" onclick="showFeedbackList('{{ $feedback->id }}')"><i
                                            class="bi bi-eye"></i></div>
                                    <div class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#replyFeedbackModal" onclick="showReplyForm('{{ $feedback->id }}')">
                                        <i class="bi bi-reply"></i></div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
