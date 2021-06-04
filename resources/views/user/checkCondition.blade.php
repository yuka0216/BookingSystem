@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">配送内容確認</div>
                    <div class="card-body">
                        <form name="form1" action="{{ action('UserController@confirmDataSave') }}" method="post" enctype='multipart/form-data'>
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
                            <h4>注意事項</h4>
                            <p>・当日の状況次第で高速料金が追加される可能性があります</p>
                            <p>・入船遅れにより当日配送不可となった場合キャンセル料が発生する可能性があります</p>
                            <input id="Checkbox1" type="checkbox" />注意事項について確認しました<br>
                            <input id="evtarget" type="submit" value="確定する">
                            <script>
                              //  id = 'evtarget' のタグにクリックイベントを設定
                                var target = document.getElementById('evtarget');
                                target.addEventListener('click', chk_value, false);
                            
                                function chk_value(event) {
                                //  チェックボックスの値を取得
                                    var chkflg = document.form1.Checkbox1.checked;
                                    if (chkflg == false) {
                                        event.preventDefault();
                                        alert('注意事項について確認してください');
                                    }
                                }
                            </script>
                        </form>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
@endsection