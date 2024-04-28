@extends('layout')
@section('content')
    <div class="main-content py-4">
        <div class="container">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-7">
                    <div class="border w-100 d-flex justify-content-center">
                        <div class="w-100 carousel-cell">
                            @foreach ($post->images as $image)
                                <div class="mx-2 w-50">
                                    <img class="object-fit-cover" src="{{ $image->url }}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-3">

                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </div>
@endsection
