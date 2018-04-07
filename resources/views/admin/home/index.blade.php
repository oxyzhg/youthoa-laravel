@extends("admin.layout.main") 

@section("content-header")
<section class="content-header">
    <h1>
        Dashboard
        <small>Overview panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Dashboard</li>
    </ol>
</section>
@endsection

@section("content")
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-lg-3 col-xs-6">
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>{{$youth_users_count}}<sup style="font-size:.5em">人</sup></h3>
					<p>网站成员</p>
				</div>
				<div class="icon"><i class="fa fa-user"></i></div>
				<a href="/admin/users" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
			<div class="small-box bg-green">
				<div class="inner">
					<h3>{{$records_today_count}}<sup style="font-size:.5em">人</sup></h3>
					<p>今日签到</p>
				</div>
				<div class="icon"><i class="fa fa-flag-o"></i></div>
				<a href="/admin/signin" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>{{$schedule_count}}<sup style="font-size:.5em">个</sup></h3>
					<p>待办事项</p>
				</div>
				<div class="icon"><i class="fa fa-calendar-check-o"></i></div>
				<a href="/admin/schedule" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
			<div class="small-box bg-red">
				<div class="inner">
					<h3>{{$workload_count}}</h3>
					<p>总工作量</p>
				</div>
				<div class="icon"><i class="fa fa-area-chart"></i></div>
				<a href="#" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>
	<!-- /.row (small boxes) -->
	<!-- Main row -->
	<div class="row">
        <!-- Signin col -->
		<section class="col-lg-7 connectedSortable">
            <div class="box box-info">
                <div class="box-header with-border">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">今日签到</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>姓名</th>
                                <th>部门</th>
                                <th>签到时间</th>
                            </tr>
                        </thead>
                        <tbody>
							@foreach($records as $record)
								<tr>
									<td>{{++$loop->index}}</td>
									<td>{{$record->user->name}}</td>
									<td><span class="label label-info">{{$record->user->department}}</span></td>
									<td>{{$record->created_at}}</td>
								</tr>
							@endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer clearfix">
                    <form action="/admin/signin" method="post">
                        {{csrf_field()}}
                        <div class="input-group">
                            <input type="text" name="sdut_id" placeholder="请输入学号签到" class="form-control">
                            <span class="input-group-btn"><button type="submit" class="btn btn-info btn-flat">签到</button></span>
                        </div>
                    </form>
                </div>
              </div>
			<!-- /.box -->
		</section>
		<!-- Schedule col -->
		<section class="col-lg-5 connectedSortable">
			<div class="box box-primary">
				<div class="box-header">
					<i class="ion ion-clipboard"></i>
					<h3 class="box-title">待办事项</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
					{{--<div class="box-tools pull-right">--}}
						{{--<ul class="pagination pagination-sm inline">--}}
							{{--<li><a href="#">&laquo;</a></li>--}}
							{{--<li><a href="#">1</a></li>--}}
							{{--<li><a href="#">2</a></li>--}}
							{{--<li><a href="#">3</a></li>--}}
							{{--<li><a href="#">&raquo;</a></li>--}}
						{{--</ul>--}}
					{{--</div>--}}
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
					<ul class="todo-list">
						@foreach($schedules as $schedule)
						<li>
							<!-- drag handle -->
							<span class="handle">
                        		<i class="fa fa-ellipsis-v"></i>
                        		<i class="fa fa-ellipsis-v"></i>
                      		</span>
							<!-- checkbox -->
							<input type="checkbox" value="">
							<!-- todo text -->
							<span class="text">{{$schedule->name}}</span>
							<!-- Emphasis label -->
							<small class="label label-info"><i class="fa fa-clock-o"></i>{{$schedule->location}}</small>
							<small class="label label-warning"><i class="fa fa-clock-o"></i>{{$schedule->datetime}}</small>
							<!-- General tools such as edit or delete-->
							<div class="tools">
								<i class="fa fa-edit"></i>
								<i class="fa fa-trash-o"></i>
							</div>
						</li>
						@endforeach
						{{--<li>--}}
                    		{{--<span class="handle">--}}
                        		{{--<i class="fa fa-ellipsis-v"></i>--}}
                        		{{--<i class="fa fa-ellipsis-v"></i>--}}
                      		{{--</span>--}}
							{{--<input type="checkbox" value="">--}}
							{{--<span class="text">Make the theme responsive</span>--}}
							{{--<small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>--}}
							{{--<div class="tools">--}}
								{{--<i class="fa fa-edit"></i>--}}
								{{--<i class="fa fa-trash-o"></i>--}}
							{{--</div>--}}
						{{--</li>--}}
						{{--<li>--}}
                    		{{--<span class="handle">--}}
								{{--<i class="fa fa-ellipsis-v"></i>--}}
                        		{{--<i class="fa fa-ellipsis-v"></i>--}}
                      		{{--</span>--}}
							{{--<input type="checkbox" value="">--}}
							{{--<span class="text">Let theme shine like a star</span>--}}
							{{--<small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>--}}
							{{--<div class="tools">--}}
								{{--<i class="fa fa-edit"></i>--}}
								{{--<i class="fa fa-trash-o"></i>--}}
							{{--</div>--}}
						{{--</li>--}}

					</ul>
				</div>
				<!-- /.box-body -->
				<div class="box-footer clearfix no-border">
					{{--<button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>--}}
				</div>
			</div>
			<!-- /.box -->
		</section>
	</div>
	<!-- /.row (main row) -->
</section>
@endsection

@section('page-js')
<script src="{{ asset("js/admin/dashboard.js")}}"></script>
@endsection