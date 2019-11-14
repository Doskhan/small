@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">Заявки</div>
                @foreach($orders as $order)
                    <div class="card-header">
                        <a href="/order/{{$order->id}}"> {{$order->title}}</a>
                    </div>
                @endforeach
            </div>
            <a style="margin-top: 15px;" class="btn btn-primary" href="/order/create" role="button">Создать заявку</a>
        </div>
    </div>
</div>
@endsection
