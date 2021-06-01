@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">配送予定</div>
                    <div class="card-body">
                        <table class="table table-hover">
                        <tr>
                            <th>運転者</th>
                            <th>顧客</th>
                            <th>日付</th>
                            <th>着時間</th>
                            <th>配送先</th>
                            <th>タイプ</th>
                            <th>状況</th>
                            <th></th>
                        </tr>
                        @foreach($bookings as $booking)
                        <tr>
                            
                            <td><img src="{{ asset('storage/image/' . $booking->car->image_path) }}" class="img-thumbnail" alt="参考画像" width="80" height="80"><br>
                                {{ $booking->car->driver_name}}:{{ $booking->car->car_number}}</td>
                            <td>{{ $booking->user->name }}</td>
                            <td>{{ $booking->date }}</td>
                            <td>{{ $booking->arrival_time }}:00着</td>
                            <td>{{ $booking->warehouse_name }}</td>
                            <td>{{ $booking->car->type }}</td>
                            <td>{{ $booking->status->status }}</td>
                            <td>
                            @if ($booking->status->status == "未")
                            <a href="{{ action('AdminController@report',['id' => $booking->id])}}">完了報告する</a></td>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                    {{ $page->links() }}
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
@endsection