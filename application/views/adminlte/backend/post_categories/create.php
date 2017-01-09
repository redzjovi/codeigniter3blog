<div class="box">
	<?php echo form_open(''); ?>
		<div class="box-header">
			<?php echo anchor(site_url('backend/post_categories'), lang('back'), array('class' => 'btn btn-default btn-xs')); ?>
		</div>
		<div class="box-body">
			<div class="form-group">
				<?php echo form_label(lang('slug').' (*)', NULL, array('class' => 'control-label', 'for' => 'slug')); ?>
				<?php echo form_input('slug', set_value('slug'), array('class' => 'form-control', 'id' => 'slug')); ?>
				<?php echo form_error('slug', '<div class="text-red">', '</div>'); ?>
			</div>
			<div class="form-group">
				<?php echo form_label(lang('name').' (*)', NULL, array('class' => 'control-label', 'for' => 'name')); ?>
				<?php echo form_input('name', set_value('name'), array('class' => 'form-control', 'id' => 'name')); ?>
				<?php echo form_error('name', '<div class="text-red">', '</div>'); ?>
			</div>
		</div>
		<div class="box-footer">
			<?php echo form_submit('submit', lang('create'), array('class' => 'btn btn-primary btn-xs')); ?>
		</div>
	<?php echo form_close(); ?>
</div>