@extends("admin.layout.main")

@section("content-header")
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            后台管理
            <small>增加用户</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#"><i class="fa fa-dashboard"></i> Admin</a>
            </li>
            <li class="active">User</li>
        </ol>
    </section>
@endsection

@section("content")
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">上传成员表</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal"  action="store" method="post">
                        {{csrf_field()}}
                        <div class="box-body">
                            {{--<div class="form-group  ">--}}
                                {{--<label for="file" class="col-sm-2 control-label">File</label>--}}
                                {{--<div class="col-sm-10">--}}
                                    {{--<div class="file-input file-input-new"><div class="file-preview ">--}}
                                            {{--<div class="close fileinput-remove">×</div>--}}
                                            {{--<div class="file-drop-disabled">--}}
                                                {{--<div class="file-preview-thumbnails">--}}
                                                {{--</div>--}}
                                                {{--<div class="clearfix"></div>    <div class="file-preview-status text-center text-success"></div>--}}
                                                {{--<div class="kv-fileinput-error file-error-message" style="display: none;"></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="kv-upload-progress hide"><div class="progress">--}}
                                                {{--<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;">--}}
                                                    {{--0%--}}
                                                {{--</div>--}}
                                            {{--</div></div>--}}
                                        {{--<div class="input-group file-caption-main">--}}
                                            {{--<div tabindex="500" class="form-control file-caption  kv-fileinput-caption">--}}
                                                {{--<div class="file-caption-name"></div>--}}
                                            {{--</div>--}}

                                            {{--<div class="input-group-btn">--}}

                                                {{--<button type="button" tabindex="500" title="Abort ongoing upload" class="btn btn-default hide fileinput-cancel fileinput-cancel-button"><i class="glyphicon glyphicon-ban-circle"></i>  <span class="hidden-xs">Cancel</span></button>--}}

                                                {{--<div tabindex="500" class="btn btn-primary btn-file"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;  <span class="hidden-xs">Browse</span><input type="file" class="file" name="file" id="1522914462926"></div>--}}
                                            {{--</div>--}}
                                        {{--</div></div><div id="kvFileinputModal" class="file-zoom-dialog modal fade" tabindex="-1" aria-labelledby="kvFileinputModalLabel"><div class="modal-dialog modal-lg" role="document">--}}
                                            {{--<div class="modal-content">--}}
                                                {{--<div class="modal-header">--}}
                                                    {{--<div class="kv-zoom-actions pull-right"><button type="button" class="btn btn-default btn-header-toggle btn-toggleheader" title="Toggle header" data-toggle="button" aria-pressed="false" autocomplete="off"><i class="glyphicon glyphicon-resize-vertical"></i></button><button type="button" class="btn btn-default btn-fullscreen" title="Toggle full screen" data-toggle="button" aria-pressed="false" autocomplete="off"><i class="glyphicon glyphicon-fullscreen"></i></button><button type="button" class="btn btn-default btn-borderless" title="Toggle borderless mode" data-toggle="button" aria-pressed="false" autocomplete="off"><i class="glyphicon glyphicon-resize-full"></i></button><button type="button" class="btn btn-default btn-close" title="Close detailed preview" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button></div>--}}
                                                    {{--<h3 class="modal-title">Detailed Preview <small><span class="kv-zoom-title"></span></small></h3>--}}
                                                {{--</div>--}}
                                                {{--<div class="modal-body">--}}
                                                    {{--<div class="floating-buttons"></div>--}}
                                                    {{--<div class="kv-zoom-body file-zoom-content"></div>--}}
                                                    {{--<button type="button" class="btn btn-navigate btn-prev" title="View previous file"><i class="glyphicon glyphicon-triangle-left"></i></button> <button type="button" class="btn btn-navigate btn-next" title="View next file"><i class="glyphicon glyphicon-triangle-right"></i></button>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label for="input1" class="col-sm-2 control-label">操作者学号</label>
                                <div class="col-sm-10">
                                    <input type="text" type="file" class="form-control" id="input" name="name" placeholder="请输入当前操作者学号">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            @include('admin.layout.error')
                            <button type="submit" class="btn btn-info pull-right">提交</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">上传值班表</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal"  action="store" method="post">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="input1" class="col-sm-2 control-label">姓名</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input1" name="name" placeholder="请输入姓名">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label">学号</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input2" name="sdut_id" placeholder="请输入学号">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input3" class="col-sm-2 control-label">部门</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="input3" name="department">
                                        <option>综合部</option>
                                        <option>采编部</option>
                                        <option>新媒体</option>
                                        <option>美工部</option>
                                        <option>程序部</option>
                                        <option>闪客部</option>
                                        <option>品牌部</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label">年级</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="input4" name="grade" placeholder="请输入年级">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input5" class="col-sm-2 control-label">联系方式</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="input5" name="phone" placeholder="请输入联系方式">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input6" class="col-sm-2 control-label">生日</label>
                                <div class="col-sm-10 input-group date" id="datetimepicker" style="padding: 0 15px;">
                                    <input type='text' class="form-control" id="input6" name="birthday" placeholder="请选择日期时间">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            @include('admin.layout.error')
                            <button type="submit" class="btn btn-info pull-right">提交</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
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
            format: 'YYYY-MM-DD',
            locale: moment.locale('zh-cn')
        });
    </script>
@endsection