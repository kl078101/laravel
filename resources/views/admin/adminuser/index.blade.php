@extends('admin.layouts.app')

@section('title')
管理员管理
@endsection

@section('sidebar')
@include('admin.adminuser.menu')
@endsection

@section('content')
@page_title(['title'=>'管理员','comment'=>'管理员管理'])
@endpage_title

<table class="table table-hover">
    <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">用户名</th>
            <th scope="col">状态</th>
            <th scope="col">创建时间</th>
            <th scope="col">管理</th>
        </tr>
    </thead>
    <tbody>
        @foreach($adminuser as $adminusers)
        <tr>
            <th scope="row">{{$adminusers->id}}</th>
            <td>{{$adminusers->username}}</td>
            <td>
                <a onclick='return confirm("确认切换状态吗？")' href="{{route('admin.adminuser.state',[$adminusers->id])}}">{!!$adminusers->StateText!!}</a>
            </td>
            <td>{{$adminusers->created_at}}</td>
            <td>
                <a href="{{route('admin.adminuser.add',[$adminusers->id])}}"><button type="button" class="btn btn-primary btn-sm">修改</button></a>
                <a onclick='return confirm("确认删除该账号吗？")' href="{{route('admin.adminuser.remove',[$adminusers->id])}}"><button type="button" class="btn btn-danger btn-sm">删除</button></a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection
