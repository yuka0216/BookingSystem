@extends('layouts.admin', ['authgroup'=>'admin'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">車両登録</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ action('AdminController@add') }}" method="post" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    車番<br>
                    　　<input type="text" name="car_number" size="20" maxlength="10">
                    　　<br><br>
                    運転手<br>
                        <input type="text" name="driver_name" size="20" maxlength="10">
                        <br><br>
                    配送先地域<br>
                        <select name="delivery_area">
                        <option value="">選択してください</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                        <option value="60">60</option>
                        <option value="70">70</option>
                        </select>
                        <br><br>
                    コンテナサイズ・タイプ<br>
                        <select name="type">
                        <option value=""> 選択してください</option>
                        <option value="20RF">20/RF</option>
                        <option value="40RF">40/RF</option>
                        <option value="20DRY">20/DRY</option>
                        <option value="40DRY">40/DRY</option>
                        </select>
                        <br><br>
                    画像<br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon">画像選択</span>
                            </div>
                            <div class="custom-file col-5">
                            <input type="file" class="custom-file-input" id="inputGroupFile" name="image_path" accept=".png,.jpg,.jpeg,image/png,image/jpg" aria-describedby="inputGroupFileAddon">
                            <label class="custom-file-label" for="inputGroupFile" data-browse="参照">ファイルを選択</label>
                            </div>
                        </div>
                        <br><br>
                    車検期限<br>
                        <input type="date" name="limit">
                        <br><br>
                    メモ<br>
                        <textarea class="form-control" name="memo" rows="5">{{ old('memo')}}</textarea>
                        <br><br>
                        <input type="submit" value="登録する" class="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection