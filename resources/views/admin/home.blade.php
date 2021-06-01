@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ログインしました</div>

                <div class="card-body">
                    <!--@if (session('status'))-->
                    <!--    <div class="alert alert-success" role="alert">-->
                    <!--        {{ session('status') }}-->
                    <!--    </div>-->
                    <!--@endif-->
                    
                    <a href="/admin/schedule" class=btn btn-primary col-md-4>配送予定</a>
                    <a href="/admin/carIndex" class=btn btn-primary col-md-4>車両一覧</a>
                    
                    <a href="/admin/report" class=btn btn-primary col-md-4>報告一覧</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection