@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="/store" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Введите тему</label>
                        <input type="text" name="title" class="form-control" id="title" aria-describedby="title" placeholder="Тема">
                    </div>
                    <div class="form-group">
                        <label for="message">Введите сообщение</label>
                        <textarea class="form-control" name="message" id="message" rows="3" placeholder="Сообщение"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
@endsection
