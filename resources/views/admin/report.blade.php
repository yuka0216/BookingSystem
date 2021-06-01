@extends('layouts.admin', ['authgroup'=>'admin'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">完了報告</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ action('AdminController@reportDataSave',['id' => $booking->id]) }}" method="post" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    日付<br>
                    　　<input type="date" name="date" value="{{ $booking->date }}">
                    　　<br><br>
                    運転手<br>
                        <input type="text" name="driver_name" value="{{ $booking->car->driver_name }}">
                        <br><br>
                    配送先<br>
                        <input type="text" name="warehouse_name" value="{{ $booking->warehouse_name }}">
                        <br><br>
                    コンテナナンバー<br>
                        <input type="text" name="container_no" value="">
                        <br><br>
                    出発時間<br>
                        <input type="time" name="departure_time">
                        <br><br>
                    到着時間<br>
                        <input type="time" name="arrival_time">
                        <br><br>
                    走行距離<br>
                        <input type="text" name="mileage" value="">km
                        <br><br>
                    金額<br>
                        <input type="text" name="price" value="">
                        <br><br>
                    備考<br>
                        <textarea class="form-control" name="memo" rows="5"></textarea>
                        <br><br>
                        <input type="submit" value="登録する" class="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection