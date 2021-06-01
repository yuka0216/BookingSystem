@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ログインしました！</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/booking" class=btn btn-primary col-md-4>予約する</a>
                    <a href="/schedule" class=btn btn-primary col-md-4>確認する</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection