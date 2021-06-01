@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">配送内容確認</div>
                    <div class="card-body">
                        <form action="{{ action('UserController@confirmDataSave') }}" method="post" enctype='multipart/form-data'>
                        {{ csrf_field() }}
                            <table class="table">
                                <tr>
                                    <th>日付</th>
                                    <th>到着時間</th>
                                    <th>配送先名称</th>
                                    <th>コンテナサイズ・タイプ</th>
                                </tr>
                                <tr>
                                    <td>{{ $conditionList['date'] }}<input type="hidden" name="date" value="{{ $conditionList['date'] }}" /></td>
                                    <td>{{ $conditionList['time'] }}：00着<input type="hidden" name="time" value="{{ $conditionList['time'] }}" /></td>
                                    <td>{{ $conditionList['warehouse'] }}<input type="hidden" name="warehouse" value="{{ $conditionList['warehouse'] }}" /></td>
                                    <td>{{ $conditionList['type'] }}<input type="hidden" name="type" value="{{ $conditionList['type'] }}" /></td>
                                    <input type="hidden" name="delivery_area" value="{{ $conditionList['delivery_area'] }}" />
                                </tr>
                            </table>
                            <input type="submit" value="確定する" class="submit">
                        </form>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
@endsection