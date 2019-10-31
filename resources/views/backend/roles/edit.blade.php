@extends('backend.master')
@section('controller','Cập nhật vai trò')
@section('action','')
@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
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
        <div class="text-right">
            <button type="button" class="btn btn-info margin"><a class="color-white" href="{!! route('roles.index') !!}">Quay lại</a></button>
        </div>
        <div class="box box-info">
            {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
            <div class="box-body">
                <div class="form-group">
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Permission:</strong>
                    <br />
                    @foreach($permission as $value)
                    <label>{!! Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) !!}
                        {!! $value->name !!}</label>
                    <br />
                    @endforeach
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Cập nhật</button>
                <button type="button" class="btn btn-info pull-right ocsen-margin-right"><a class="color-white" href="{!! route('roles.index') !!}">Quay lại</a></button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection