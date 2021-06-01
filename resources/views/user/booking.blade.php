@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">配送依頼</div>
                <div class="card-body">
                    <form action="{{ action('AdminController@search') }}" method="post" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    配送先地域 <br>
                        <select name="delivery_area">
                        <option value="">選択してください</option>
                        <option value="10">船橋</option>
                        <option value="20">入間</option>
                        <option value="10">大和</option>
                        <option value="30">甲府</option>
                        <option value="30">茨木</option>
                        <option value="30">栃木</option>
                        <option value="40">長野</option>
                        </select>
                        <br><br>
                    配送先名称<br>
                        <input type="text" name="warehouse" size="30" maxlength="255">
                        <br><br>
                    到着時間<br>
                        <select name="time">
                        <option value=""> 選択してください</option>
                        <option value="9">9:00</option>
                        <option value="12">12:00</option>
                        <option value="15">15:00</option>
                        </select><br><br>
                    コンテナサイズ・タイプ<br>
                        <select name="type">
                        <option value=""> 選択してください</option>
                        <option value="20RF">20/RF</option>
                        <option value="40RF">40/RF</option>
                        <option value="20DRY">20/DRY</option>
                        <option value="40DRY">40/DRY</option>
                        </select>
                        <br><br>
                        <input type="submit" value="予約する" class="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection