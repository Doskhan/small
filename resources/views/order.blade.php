@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$order->title}}</div>
                    <div class="card-body">{{$order->message}}</div>
                </div>
        </div>
    </div>
@endsection
