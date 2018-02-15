@extends('admin.layout.main')

@section('content-header')
    <section class="content-header">
        <h1>
            在线办公
            <small>值班签到系统</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="/admin"><i class="fa fa-dashboard"></i>App</a>
            </li>
            <li class="active">Signin</li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @include('admin.layout.error')
                <div class="box box-primary">
                    <div class="box-header">
                        {{--<h3 class="box-title">Sign in record</h3>--}}
                    </div>
                    <div class="box-body">
                        <table id="recordtable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>姓名</th>
                                    <th>部门</th>
                                    <th>年级</th>
                                    <th>联系方式</th>
                                    <th>签到时间</th>
                                    <th>签退时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($records as $record)
                                <tr @if($record->status==0)class="info" @endif>
                                    <td>
                                        {{++$loop->index}}
                                    </td>
                                    <td>
                                        {{$record->user->name}}
                                    </td>
                                    <td>
                                        <span class='label label-success'>{{$record->user->department}}</span>
                                    </td>
                                    <td>
                                        {{$record->user->grade}}
                                    </td>
                                    <td>
                                        {{$record->user->phone}}
                                    </td>
                                    <td>
                                        {{$record->created_at}}
                                    </td>
                                    <td>
                                        {{$record->updated_at}}
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:void(0);" data-id="2" class="grid-row-delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                        <form action="signin" method="post">
                            {{csrf_field()}}
                            <div class="input-group">
                                <input type="text" name="sdut_id" placeholder="请输入学号签到" class="form-control">
                                <span class="input-group-btn"><button type="submit" class="btn btn-primary btn-flat">签到</button></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-js')
    <script src="{{ asset("bower_components/datatables.net/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{ asset("bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
    <script src="{{ asset("js/admin/app.js")}}"></script>
@endsection