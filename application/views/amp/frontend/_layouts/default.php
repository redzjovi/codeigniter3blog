<body>
	<?php $this->load->view($view); ?>

	<?php if (ENVIRONMENT == 'development') : ?>
		<p class="text-center text-muted">
			CI Version: <strong><?php echo CI_VERSION; ?></strong>,
			Elapsed Time: <strong>{elapsed_time}</strong> seconds,
			Memory Usage: <strong>{memory_usage}</strong>
		</p>
	<?php endif; ?>