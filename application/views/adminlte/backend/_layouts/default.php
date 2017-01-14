<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
        <?php $this->load->view($top); ?>

        <?php $this->load->view($left); ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<?php $this->load->view($messages); ?>

			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					<?php echo $page_title; ?>
				</h1>
				<?php if (isset($breadcrumb)) : ?>
					<ol class="breadcrumb">
						<?php foreach ((array) $breadcrumb  as $value) : ?>
		                    <li>
		                        <i class="<?php echo (isset($value['icon']) ? $value['icon'] : ''); ?>"></i>
		                        <?php if (isset($value['url'])) : ?>
		                            <a href="<?php echo (isset($value['url']) ? $value['url'] : ''); ?>"><?php echo $value['text']; ?></a>
		                        <?php else : ?>
		                            <?php echo $value['text']; ?>
		                        <?php endif; ?>
		                    </li>
		                <?php endforeach; ?>
					</ol>
				<?php endif; ?>
			</section>

			<section class="content">
				<!-- Main content -->
	            <?php $this->load->view($view); ?>
				<!-- /.content -->
			</section>
		</div>
		<!-- /.content-wrapper -->

        <?php $this->load->view($right); ?>

        <?php $this->load->view($bottom); ?>
	</div>
	<!-- ./wrapper -->

	<?php if (ENVIRONMENT == 'development') : ?>
		<p class="text-center text-muted">
			CI Version: <strong><?php echo CI_VERSION; ?></strong>,
			Elapsed Time: <strong>{elapsed_time}</strong> seconds,
			Memory Usage: <strong>{memory_usage}</strong>
		</p>
	<?php endif; ?>