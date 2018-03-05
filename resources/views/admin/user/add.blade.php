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
                        <h3 class="box-title">添加用户</h3>
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