@extends('layouts.admin', ['authgroup'=>'admin'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">車両登録</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ action('AdminController@carDataUpdate', ['id' => $targetCarData->id]) }}" method="post" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    車番<br>
                    　　<input type="text" name="car_number" size="20" maxlength="10" value="{{ $targetCarData->car_number }}">
                    　　<br><br>
                    運転手<br>
                        <input type="text" name="driver_name" size="20" maxlength="10" value="{{ $targetCarData->driver_name }}">
                        <br><br>
                    配送先地域<br>
                        <select name="delivery_area">
                        <option value="" disabled style="display:none;">選択してください</option>
                        <option value="10" {{ ($targetCarData->delivery_area == "10")? "selected" : "" }}>10</option>
                        <option value="20" {{ ($targetCarData->delivery_area == "20")? "selected" : "" }}>20</option>
                        <option value="30" {{ ($targetCarData->delivery_area == "30")? "selected" : "" }}>30</option>
                        <option value="40" {{ ($targetCarData->delivery_area == "40")? "selected" : "" }}>40</option>
                        <option value="50" {{ ($targetCarData->delivery_area == "50")? "selected" : "" }}>50</option>
                        <option value="60" {{ ($targetCarData->delivery_area == "60")? "selected" : "" }}>60</option>
                        <option value="70" {{ ($targetCarData->delivery_area == "70")? "selected" : "" }}>70</option>
                        </select>
                        <br><br>
                    コンテナサイズ・タイプ<br>
                        <select name="type">
                            <option value="" disabled style="display:none;">選択してください</option>
                            <option value="20RF" {{ ($targetCarData->type == "20RF")? "selected" : "" }}>20RF</option>
                            <option value="40RF" {{ ($targetCarData->type == "40RF")? "selected" : "" }}>40RF</option>
                            <option value="20DRY" {{ ($targetCarData->type == "20DRY")? "selected" : "" }}>20DRY</option>
                            <option value="40DRY" {{ ($targetCarData->type == "40DRY")? "selected" : "" }}>40DRY</option>
                        </select>
                        <br>
                    登録画像<br>
                        <img src="{{ asset('storage/image/' . $targetCarData->image_path) }}" alt="画像" width="40%">
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
                        <input type="date" name="limit" value="{{ $targetCarData->limit->format('Y-m-d') }}">
                        <br><br>
                    メモ<br>
                        <textarea class="form-control" name="memo" rows="5">{{ $targetCarData->memo }}"</textarea>
                        <br><br>
                        <input type="submit" value="登録する" class="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection