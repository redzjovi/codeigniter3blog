<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
        <?php $this->load->view($top); ?>

        <?php $this->load->view($left); ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Dashboard
					<small>Control panel</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Dashboard</li>
				</ol>
			</section>

			<!-- Main content -->
            <?php $this->load->view($view); ?>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

        <?php $this->load->view($right); ?>

        <?php $this->load->view($bottom); ?>
	</div>
	<!-- ./wrapper -->
