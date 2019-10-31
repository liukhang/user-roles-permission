@extends('backend.master')
@section('controller','Danh sách tài khoản')
@section('action','')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="text-right">
            @can('super-admin')
            <button type="button" class="btn bg-olive margin" style="margin-right: 0;"><a class="color-white" href="{!! route('users.create') !!}">Thêm mới</a></button>
            @endcan
        </div>
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="">
                                <label>Tìm kiếm theo tên:<input class="form-control input-sm" id="name" value="{{ request('name') }}" placeholder="Search name" name="name" type="text" /></label>
                                <input class="os-sub" type="submit" value="Tìm kiếm" />
                            </form>
                        </div>
                    </div>
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th style="width: 84px">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{!! $user->id !!}</td>
                            <td>{!! $user->name !!}</td>
                            <td>{!! $user->email !!}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                <label class="label label-primary">{!! $v !!}</label>
                                @endforeach
                                @endif
                            </td>
                            <td>
                                @can('super-admin')
                                <a class="badge bg-light-blue" href="{!! route('users.edit',$user->id) !!}"><i class="fa fa-fw fa-edit"></i></a>
                                <a class="badge bg-light-blue"><i class="fa fa-fw fa-trash-o"></i></a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                </table>
                <div class="pull-right">
                    <?php $users->setPath(route('users.index')); ?>
                    <?php echo $users->render(); ?>
                </div>
            </div>
            <!-- /.box-body -->
        </div>

    </div>
    <!-- /.col -->
</div>


@endsection