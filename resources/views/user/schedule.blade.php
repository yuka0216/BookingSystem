@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">配送予定</div>
                    <div class="card-body">
                        <table class="table table-hover">
                        <tr>
                            <th>日付</th>
                            <th>着時間</th>
                            <th>配送先</th>
                            <th>サイズ・タイプ</th>
                            <th>配送業者</th>
                            <th>料金</th>
                            <th>状況</th>
                            <th></th>
                        </tr>
                        @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $booking->date }}</td>
                            <td>{{ $booking->arrival_time }}:00着</td>
                            <td>{{ $booking->warehouse_name }}</td>
                            <td>{{ $booking->car->type }}</td>
                            <td>{{ $booking->car->admin->name }}</td>
                            <td></td>
                            <td>{{ $booking->status->status}}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
@endsection