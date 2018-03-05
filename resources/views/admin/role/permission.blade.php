@extends("admin.layout.main")

@section("content-header")
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            后台管理
            <small>角色权限</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="/admin"><i class="fa fa-dashboard"></i> Admin</a>
            </li>
            <li>
                <a href="/admin/roles"><i class="fa fa-dashboard"></i> Role</a>
            </li>
            <li class="active"> Permission</li>
        </ol>
    </section>
@endsection

@section("content")
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <form action="permission" method="post">
                        {{ csrf_field() }}
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th> </th>
                                    <th>#</th>
                                    <th>权限名</th>
                                    <th>权限描述</th>
                                </tr>
                                @foreach($perms as $perm)
                                <tr>
                                    <td>
                                        @if(in_array($perm->id, $permids))
                                            <input type="checkbox" class="grid-row-checkbox" name="up_perms[]" value="{{$perm->id}}" checked />
                                        @else
                                            <input type="checkbox" class="grid-row-checkbox" name="up_perms[]" value="{{$perm->id}}"/>
                                        @endif
                                    </td>
                                    <td>
                                        {{$perm->id}}
                                    </td>
                                    <td>
                                        <span class='label label-success'>{{$perm->display_name}}</span>
                                    </td>
                                    <td>
                                        {{$perm->description}}
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="box-footer clearfix">
                            @include('admin.layout.error')
                            <div class="input-group">
                                <input type="text" name="sdut_id" placeholder="请输入操作者学号确认权限" class="form-control">
                                <span class="input-group-btn"><button type="submit" class="btn btn-info btn-flat">提交</button></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection