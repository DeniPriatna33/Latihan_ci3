<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="<?= base_url('assets/'); ?>index3.html" class="nav-link">Home</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link">Contact</a>
				</li>
			</ul>

			<!-- Right navbar links -->

		</nav>
		<!-- /.navbar -->


		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="<?= base_url('assets/'); ?>index3.html" class="brand-link">
				<img src="<?= base_url('assets/'); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">AdminLTE 3</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?= base_url('assets/'); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block">SnapZone</a>
					</div>
				</div>

				<!-- SidebarSearch Form -->
				<div class="form-inline">
					<div class="input-group" data-widget="sidebar-search">
						<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
						<div class="input-group-append">
							<button class="btn btn-sidebar">
								<i class="fas fa-search fa-fw"></i>
							</button>
						</div>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-edit"></i>
								<p>
									CRUD
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url('crud/crud_v1'); ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>CRUD v1</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('crud/crud_v2'); ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>CRUD v2</p>
									</a>
								</li>

							</ul>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-edit"></i>
								<p>
									CRUD Ajax
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url('ajax/ajax_v1'); ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>CRUD Ajax v1</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('ajax/ajax_v2'); ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>CRUD Ajax v2</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-edit"></i>
								<p>
									CRUD Multiple
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url('multiple/multiple_v1'); ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>CRUD Multiple v1</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('multiple/multiple_v2'); ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>CRUD Multiple v2</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-edit"></i>
								<p>
									Datatable ServerSide
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url('serverside/serverside_v1'); ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Datatable ServerSide v1</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('serverside/serverside_v2'); ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Datatable ServerSide v2</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-edit"></i>
								<p>
									Upload File
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url('upload_file/upload_file'); ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Upload File</p>
									</a>
								</li>
							</ul>
						</li>

					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Blank Page</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section> -->
