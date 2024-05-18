@extends('user.layout_profile')
@section('right_content')
    <div class="py-4">
        <table class="table table-hover">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Thời gian</th>
                <th scope="col">Được trả lời</th>
                <th scope="col"></th>
            </thead>
            <tbody>
                @foreach ($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->id }}</td>
                        <td>{{ $feedback->title }}</td>
                        <td>{{ $feedback->description }}</td>
                        <td>{{ $feedback->created_at }}</td>
                        <td>Chưa</td>
                        <td><a href="" class="btn btn-sm btn-success">Xem</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
