@extends("admin.layout.main")

@section("content-header")
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>后台管理<small>用户权限</small></h1>
        <ol class="breadcrumb">
            <li>
                <a href="/admin"><i class="fa fa-dashboard"></i> Admin</a>
            </li>
            <li>
                <a href="/admin/users"><i class="fa fa-dashboard"></i> User</a>
            </li>
            <li class="active">Role</li>
        </ol>
    </section>
@endsection

@section("content")
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <form action="role" method="post">
                        {{ csrf_field() }}
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th> </th>
                                    <th>#</th>
                                    <th>角色名</th>
                                    <th>角色描述</th>
                                </tr>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>
                                            @if(in_array($role->id, $roleids))
                                                <input type="checkbox" class="grid-row-checkbox" name="up_roles[]" value="{{$role->id}}" checked />
                                            @else
                                                <input type="checkbox" class="grid-row-checkbox" name="up_roles[]" value="{{$role->id}}"/>
                                            @endif
                                        </td>
                                        <td>
                                            {{++$loop->index}}
                                        </td>
                                        <td>
                                            <span class='label label-success'>{{ $role->display_name}}</span>
                                        </td>
                                        <td>
                                            {{$role->description}}
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

@section('page-js')
    <script src="{{ asset("js/admin/main.js")}}"></script>
@endsection
