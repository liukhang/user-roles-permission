@extends('auth.master')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="javascript:void(0)"><img style="width: 130px;" src="{!!asset('public/uploads/icons/logo.png')!!}" alt=""></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Đăng nhập để bắt đầu phiên của bạn</p>
        @error('email')
        <p class="login-box-msg" role="alert" style="color: #dd4b39">
            {!! $message !!}
        </p>
        @enderror
        <form method="POST" action="{!! route('login') !!}">
            @csrf
            <div class="form-group has-feedback">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{!! old('email') !!}" required autocomplete="email" autofocus>

                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <p class="login-box-msg" role="alert" style="color: #dd4b39">
                    {!! $message !!}
                </p>
                @enderror
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {!! old('remember') ? 'checked' : '' !!}>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection