@extends('admin.index')

@section('rightcontent')

    {{--@include('common.message')--}}

    {{--@include('common.validator')--}}

    <div class="panel panel-default">
        <div class="panel-heading">新增图书</div>
        <div class="panel-body">
            @include('admin._form')
        </div>
    </div>
@stop
