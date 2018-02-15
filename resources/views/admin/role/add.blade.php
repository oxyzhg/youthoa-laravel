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
                    <form class="form-horizontal"  action="/admin/roles/store" method="post">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Role Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" name="name" placeholder="添加角色名">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDesc" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputDesc" name="description" placeholder="添加角色描述">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            {{--<button type="submit" class="btn btn-default">返回</button>--}}
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