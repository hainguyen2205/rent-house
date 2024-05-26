@extends('user.topup.topup_layout')
@section('topup_content')
    <div class="px-2">
        <form action="/profile/topup/vnpay-checkout" method="POST">
            @csrf
            <div class="row mb-2">
                <div class="col-6">
                    <label for="" class="form-label text-color-primary">Tài khoản nhận</label>
                    <input type="text" class="form-control" readonly
                        value="{{ Auth::user()->phone }} - {{ Auth::user()->name }}">
                </div>
                <div class="col-6">
                    <label for="" class="form-label text-color-primary">Phương thức thanh toán</label>
                    <input type="text" name="method" class="form-control" readonly value="vnpay">
                </div>
            </div>
            <div class="mb-2">
                <label for="" class="form-label text-color-primary">Số tiền cần nạp</label>
                <input type="number" class="form-control" id="amountInput" name="amount">
                <div class="invalid-feedback">{{ $errors->first('amount') }}</div>
            </div>
            <button type="submit" class="btn btn-primary">Thanh toán</button>
        </form>
    </div>
@endsection
