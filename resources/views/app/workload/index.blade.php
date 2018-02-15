@extends('admin.layout.main')

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            在线办公<small>工作量统计</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="/admin">
                    <i class="fa fa-dashboard"></i>Admin</a>
            </li>
            <li class="active">Workload</li>
        </ol>
    </section>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- page alert -->
                @include('admin.layout.error')
                <div class="box box-primary">
                    <div class="box-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#1Modal">
                            <i class="fa fa-plus"></i> Add item
                        </button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="recordtable" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>姓名</th>
                                    <th>部门</th>
                                    <th>工作描述</th>
                                    <th>工作量</th>
                                    <th>统计者</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($workloads as $workload)
                                <tr>
                                    <td>
                                        {{++$loop->index}}
                                    </td>
                                    <td>
                                        {{$workload->member->name}}
                                    </td>
                                    <td>
                                        {{$workload->member->department}}
                                    </td>
                                    <td>
                                        {{$workload->description}}
                                    </td>
                                    <td>
                                        <span class='label label-success'>{{$workload->workload}}</span>
                                    </td>
                                    <td>
                                        {{$workload->handler->name}}
                                    </td>
                                    <td>
                                        {{$workload->created_at}}
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#2Modal"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-modal')
    @include('app.workload.model')
@endsection

@section('page-js')
    <script src="{{ asset("bower_components/datatables.net/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{ asset("bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
    <script src="{{ asset("js/moment-with-locales.min.js")}}"></script>
    <script src="{{ asset("js/bootstrap-datetimepicker.min.js")}}"></script>
    <script src="{{ asset("js/admin/app.js")}}"></script>
    <script>
        $(document).ready(function () {
            $('#datetimepicker').datetimepicker({
                format: 'YYYY-MM-DD HH:mm',
                locale: moment.locale('zh-cn')
            });
            $('#2Modal').on('show.bs.modal', function (event) {
                var _href = $(event.relatedTarget).data('href');
                $(this).find("form").attr('action','workload/' + _href);
            })
        });
    </script>
@endsection