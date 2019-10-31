@extends('backend.master')
@section('controller','Quản lý vai trò')
@section('action','')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="text-right">
            @can('super-admin')
            <button type="button" class="btn bg-olive margin" style="margin-right: 0;"><a class="color-white" href="{!! route('roles.create') !!}">Thêm mới</a></button>
            @endcan
        </div>
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Tên vai trò</th>
                            <th style="width: 84px">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{!! $role->id !!}</td>
                            <td>{!! $role->name !!}</td>
                            <td>
                                @can('super-admin')
                                <a class="badge bg-light-blue" href="{!! route('roles.edit',$role->id) !!}"><i class="fa fa-fw fa-edit"></i></a>
                                <a class="badge bg-light-blue"><i class="fa fa-fw fa-trash-o"></i></a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
            <!-- /.box-body -->
        </div>

    </div>
    <!-- /.col -->
</div>


@endsection