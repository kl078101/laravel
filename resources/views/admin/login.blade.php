@extends('admin.layouts.guest')

@section('title')
管理员登陆
@endsection

@section('content')
<div class="row">
    <div class="col-5 mx-auto bg-light rounded mt-5 p-5">
        <div class="row mb-3">
            <h3 class="col-12">管理员登陆</h3>
        </div>

        <form action="{{route('admin.login')}}" method="POST">
            @csrf
            <div class="form-group row mx-auto">
                <label for="username" class="col-2 col-form-label text-right">用户</label>
                <div class="col-10">
                    <input type="text" name="username" class="form-control" id="username" placeholder="请输入用户名">
                    <small class="form-text text-muted">
                        @error('username')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </small>
                </div>
            </div>

            <div class="form-group row mx-auto">
                <label for="password" class="col-2 col-form-label ">密码</label>
                <div class="col-10">
                    <input type="password" name="password" class="form-control" id="password" placeholder="请输入密码">
                    <small class="form-text text-muted">
                        @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </small>
                </div>
            </div>

            <div class="form-group row mx-auto">
                <div class="col-10 ml-auto">
                    <button type="submit" class="btn btn-primary">登陆</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
