<aside class="main-sidebar">

	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">

		<!-- Sidebar user panel (optional) -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg")}}" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>Administrator</p>
				<!-- Status -->
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
			<!-- Optionally, you can add icons to the links -->
			<li class="active">
				<a href="/admin">
					<i class="fa fa-dashboard"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-pie-chart"></i>
					<span>Admin</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="/admin/users"><i class="fa fa-circle-o"></i>用户</a>
					</li>
					<li>
						<a href="/admin/roles"><i class="fa fa-circle-o"></i>角色</a>
					</li>
					<li>
						<a href="/admin/permissions"><i class="fa fa-circle-o"></i>权限</a>
					</li>
					<li>
						<a href="/admin/menus"><i class="fa fa-circle-o"></i>菜单</a>
					</li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-paper-plane"></i>
					<span>Apps</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="/admin/signin"><i class="fa fa-pencil"></i>签到系统</a>
					</li>
					<li>
						<a href="/admin/schedule"><i class="fa fa-tasks"></i>日程安排</a>
					</li>
					<li>
						<a href="/admin/usage"><i class="fa fa-tasks"></i>使用记录</a>
					</li>
					<li>
						<a href="/admin/workload"><i class="fa fa-circle-o"></i>工作量化</a>
					</li>
				</ul>
			</li>
			<li class="header">LINKS</li>
			<li>
				<a href="http://www.youthol.cn" target="_black">
					<i class="fa fa-circle-o text-red"></i>
					<span>青春在线网站</span>
				</a>
			</li>
		</ul>
		<!-- /.sidebar-menu -->
	</section>
	<!-- /.sidebar -->
</aside>