@extends('admin.layouts.app')

@section('title')
管理员管理 - 添加
@endsection

@section('sidebar')
@include('admin.adminuser.menu')
@endsection

@section('content')
@page_title(['title'=>'管理员','comment'=>'管理员添加'])
@endpage_title

<form action="{{route('admin.adminuser.add',[$adminuser->id])}}" method="post">
    @csrf
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label text-right">用户名</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name='username' placeholder="请输入用户名" value="{{old('username',$adminuser->username)}}">
            @error('username')
            <small class='form-text text-danger'>{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label text-right">密码</label>
        <div class="col-sm-6">
            <input type="password" class="form-control" name='password' value="{{old('password')}}" placeholder="请输入密码">
            @error('password')
            <small class='form-text text-danger'>{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label text-right">确认密码</label>
        <div class="col-sm-6">
            <input type="password" class="form-control" name='password2' value="{{old('password2')}}" placeholder="请再次输入密码">
        </div>
    </div>
    <div class="form-group row">
        <div class='col-sm-2'></div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
    </div>
</form>

@endsection
