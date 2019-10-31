@extends('backend.master')
@section('controller','Tạo mới tài khoản')
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
            {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="">Tên tài khoản</label>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <label for="">Nhập lại Password:</label>
                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <label>Chọn vai trò</label>
                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Tạo mới</button>
                <button type="button" class="btn btn-info pull-right ocsen-margin-right"><a class="color-white" href="{!! route('roles.index') !!}">Quay lại</a></button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection