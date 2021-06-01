@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">予約状況</div>
                    <div class="card-group">
                        @foreach ($canReserveCarCount as $date => $count)
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">{{ substr($date, 5) }}</h3>
                                <p class="card-text">
                                @if ($count == 0)
                                ×
                                @elseif ($count <= 3)
                                <a href="{{ action('UserController@checkCondition', ['conditionList' => $conditionList, 'date' => $date]) }}">△<br>
                                残り{{ $count }}台</a>
                                @else
                                <a href="{{ action('UserController@checkCondition', ['conditionList' => $conditionList, 'date' => $date]) }}">〇</a>
                                @endif</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>    
            <br>
            <div class="card">
                <div class="card-header">検索条件変更</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>配送先地域</th>
                                <th>配送先名称</th>
                                <th>到着時間</th>
                                <th>コンテナサイズ・タイプ</th>
                            </tr>
                            <form action="{{ action('AdminController@search') }}" method="post" enctype='multipart/form-data'>
                            {{ csrf_field() }}
                            <tr>
                                <td><select name="delivery_area">
                                    <option value="" disabled style="display:none;">選択してください</option>
                                    <option value="10" {{ ($conditionList["delivery_area"] == "10")? "selected" : "" }}>10</option>
                                    <option value="20" {{ ($conditionList["delivery_area"] == "20")? "selected" : "" }}>20</option>
                                    <option value="30" {{ ($conditionList["delivery_area"] == "30")? "selected" : "" }}>30</option>
                                    <option value="40" {{ ($conditionList["delivery_area"] == "40")? "selected" : "" }}>40</option>
                                    <option value="50" {{ ($conditionList["delivery_area"] == "50")? "selected" : "" }}>50</option>
                                    <option value="60" {{ ($conditionList["delivery_area"] == "60")? "selected" : "" }}>60</option>
                                    <option value="70" {{ ($conditionList["delivery_area"] == "70")? "selected" : "" }}>70</option>
                                </select></td>
                                <td><input type="text" name="warehouse" size="20" maxlength="10" value="{{ $conditionList["warehouse"] }}"></td>
                                <td><select name="time">
                                        <option value="" disabled style="display:none;"> 選択してください</option>
                                        <option value="9" {{ ($conditionList["time"] == "9")? "selected" : "" }}>9:00</option>
                                        <option value="12" {{ ($conditionList["time"] == "12")? "selected" : "" }}>12:00</option>
                                        <option value="15" {{ ($conditionList["time"] == "15")? "selected" : "" }}>15:00</option>
                                    </select></td>
                                <td>
                                <select name="type">
                                    <option value="" disabled style="display:none;">選択してください</option>
                                    <option value="20RF" {{ ($conditionList["type"] == "20RF")? "selected" : "" }}>20RF</option>
                                    <option value="40RF" {{ ($conditionList["type"] == "40RF")? "selected" : "" }}>40RF</option>
                                    <option value="20DRY" {{ ($conditionList["type"] == "20DRY")? "selected" : "" }}>20DRY</option>
                                    <option value="40DRY" {{ ($conditionList["type"] == "40DRY")? "selected" : "" }}>40DRY</option>
                                </select>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" value="変更する" class="submit">
                        </form>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
@endsection