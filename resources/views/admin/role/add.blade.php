@extends("admin.layout.main")

@section("content-header")
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            后台管理
            <small>增加角色</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#"><i class="fa fa-dashboard"></i> Admin</a>
            </li>
            <li class="active">Role</li>
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
                        <h3 class="box-title">添加角色</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal"  action="store" method="post">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="input1" class="col-sm-2 control-label">角色名</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input1" name="name" placeholder="请输入角色英文名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label">角色名</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input2" name="display_name" placeholder="请输入角色显示名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input3" class="col-sm-2 control-label">角色描述</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input3" name="description" placeholder="请输入角色描述">
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