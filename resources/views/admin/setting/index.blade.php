@extends('admin.layouts.app')

@section('title')
系统设置
@endsection

@section('sidebar')
@include('admin.setting.menu')
@endsection

@section('content')
@page_title(['title'=>'系统设置','comment'=>'系统全局配置和开关'])
@endpage_title

<form action="{{route('admin.setting')}}" method="post">
    @csrf
    @foreach ($setting as $settings)
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label text-right">{{$settings->name}}</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name='setting[{{$settings->key}}]' value="{{$settings->value}}">
            <small class='form-text text-muted'>{{$settings->comment}}</small>
        </div>
    </div>
    @endforeach

    <div class="form-group row">
        <div class='col-sm-2'></div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
    </div>
</form>
@endsection
