@extends('backend.master')
@section('controller','Tạo mới vai trò')
@section('action','')
@section('content')
<div class="row">
    <div class="col-sx-12 col-sm-12 col-md-6">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="box box-primary">
            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
            <div class="box-body">
                <div class="form-group">
                    <strong>Tên vai trò:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Permission:</strong>
                    <br />
                    @foreach($permission as $value)
                    <label>{!! Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) !!}
                        {!! $value->name !!}</label>
                    <br />
                    @endforeach
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Tạo mới</button>
                    <button type="button" class="btn btn-info pull-right ocsen-margin-right"><a class="color-white" href="{!! route('roles.index') !!}">Quay lại</a></button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    @endsection