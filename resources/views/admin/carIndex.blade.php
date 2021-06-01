@extends('layouts.admin',  ['authgroup'=>'admin'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">車両一覧
                    <div class="text-right">
                        <a href="/admin/add" class="btn btn-primary">新規車両登録</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table table-hover">
                        <tr>
                            <th>写真</th>
                            <th>車番</th>
                            <th>ドライバー</th>
                            <th>タイプ</th>
                            <th>配送エリア</th>
                            <th>車検</th>
                            <th>メモ</th>
                            <th></th>
                        </tr>
                        @foreach($cars as $car)
                        <tr>
                            <td><img src="{{ asset('storage/image/' . $car->image_path) }}" class="img-thumbnail" alt="参考画像" width="150" height="150"></td>
                            <td>{{ $car->car_number }}</td>
                            <td>{{ $car->driver_name }}</td>
                            <td>{{ $car->type }}</td>
                            <td>{{ $car->delivery_area }}km圏内</td>
                            <td>{{ $car->limit->format('Y-m-d') }}</td>
                            <td>{{ $car->memo }}</td>
                            <td><a href="{{ action('AdminController@carDataEdit',['id' => $car->id])}}">編集</a>
                                <a href="{{ action('AdminController@carDataDelete', ['id' => $car->id]) }}">削除</a><td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $page->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection