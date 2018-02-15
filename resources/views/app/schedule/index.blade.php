@extends('admin.layout.main')

@section('content-header')
    <section class="content-header">
        <h1>
            在线办公
            <small>网站日程安排</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="/admin"><i class="fa fa-dashboard"></i>App</a>
            </li>
            <li class="active">Schedule</li>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#1Modal">
                            <i class="fa fa-plus"></i> Add item
                        </button>
                    </div>
                    <div class="box-body">
                        <table id="recordtable" class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>活动名称</th>
                                <th>活动地点</th>
                                <th>活动时间</th>
                                <th>发起人</th>
                                <th>发起时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($schedules as $schedule)
                                <tr @if(!$schedule->status)class="info" @endif>
                                    <td>
                                        {{++$loop->index}}
                                    </td>
                                    <td>
                                        {{$schedule->name}}
                                    </td>
                                    <td>
                                        {{$schedule->location}}
                                    </td>
                                    <td>
                                        @if($schedule->status)
                                            <span class='label label-success'>{{$schedule->datetime}}</span>
                                        @else
                                            <span class='label label-info'>{{$schedule->datetime}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{$schedule->user->name}}
                                    </td>
                                    <td>
                                        {{$schedule->created_at}}
                                    </td>
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#2Modal" data-href="{{$schedule->id}}" data-method="PUT">
                                            <i class="fa fa-paper-plane"></i>
                                        </a>
                                        <a href="" data-toggle="modal" data-target="#2Modal" data-href="{{$schedule->id}}" data-method="DELETE">
                                            <i class="fa fa-trash"></i>
                                        </a>
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
    @include('app.schedule.model')
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{ asset("css/bootstrap-datetimepicker.min.css")}}">
@endsection

@section('page-js')
    <script src="{{ asset("bower_components/datatables.net/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{ asset("bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
	<script src="{{ asset("js/moment-with-locales.min.js")}}"></script>
    <script src="{{ asset("js/bootstrap-datetimepicker.min.js")}}"></script>
    <script src="{{ asset("js/admin/app.js")}}"></script>
    <script>
        $('#datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            locale: moment.locale('zh-cn')
        });
        $('#2Modal').on('show.bs.modal', function (event) {
            var _href = $(event.relatedTarget).data('href');
            var _method = $(event.relatedTarget).data('method');
            $(this).find("form").attr('action','schedule/' + _href);
            $(this).find("input[name='_method']").val(_method);
        })
    </script>
@endsection