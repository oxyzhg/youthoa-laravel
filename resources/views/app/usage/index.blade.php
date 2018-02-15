@extends('admin.layout.main')

@section('content-header')
    <section class="content-header">
        <h1>
            在线办公
            <small>网站设备使用记录</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="/admin"><i class="fa fa-dashboard"></i>App</a>
            </li>
            <li class="active">Usage</li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @include('admin.layout.error')
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#camera" data-toggle="tab">相机/单反/无人机</a></li>
                        <li><a href="#projector" data-toggle="tab">投影仪</a></li>
                        <li><a href="javascript:void(0)" data-toggle="modal" data-target="#1Modal"><i class="fa fa-plus"></i> 借用</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="camera">
                            <table id="recordtable" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>设备名称</th>
                                    <th>活动名称</th>
                                    <th>使用时间</th>
                                    <th>使用人姓名</th>
                                    <th>备忘人姓名</th>
                                    <th>归还时间</th>
                                    <th>备忘人姓名</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($usages as $usage)
                                    <tr @if(!$usage->status)class="info" @endif>
                                        <td>
                                            {{++$loop->index}}
                                        </td>
                                        <td>
                                            {{$usage->machine}}
                                        </td>
                                        <td>
                                            {{$usage->activity}}
                                        </td>
                                        <td>
                                            <span class='label label-success'>{{$usage->datetime}}</span>
                                        </td>
                                        <td>
                                            {{$usage->borrower->name}}
                                        </td>
                                        <td>
                                            {{$usage->memo->name}}
                                        </td>
                                        <td>
                                            @if($usage->status)
                                                {{$usage->updated_at}}
                                            @else
                                                <span class='label label-warning'>暂未归还</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($usage->rememo_id)
                                                {{$usage->rememo->name}}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#2Modal" data-href="{{$usage->id}}" data-method="PUT">
                                                <i class="fa fa-paper-plane"></i>
                                            </a>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#2Modal" data-href="{{$usage->id}}" data-method="DELETE">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="projector">
                            To be determined...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('page-modal')
    @include('app.usage.model')
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
            $(this).find("form").attr('action','usage/' + _href);
            $(this).find("input[name='_method']").val(_method);
        })
    </script>
@endsection