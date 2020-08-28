@extends('admin.layouts.app')

@section('title')
后台中心
@endsection

@section('content')
<br>
<?php dump(Auth::guard('admin')->user()); ?>
@endsection
