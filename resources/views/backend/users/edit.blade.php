@extends('backend.master')
@section('controller','Cập nhật tài khoản')
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
            <button type="button" class="btn bg-olive margin"><a class="color-white" href="{!! route('users.index') !!}">Quay lại</a></button>
        </div>
        <div class="box box-primary">
            {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
            <div class="box-body">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Email:</strong>
                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Password:</strong>
                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Role:</strong>
                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Cập nhật</button>
                    <button type="button" class="btn btn-info pull-right ocsen-margin-right"><a class="color-white" href="{!! route('users.index') !!}">Quay lại</a></button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection