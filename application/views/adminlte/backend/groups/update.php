<div class="box">
	<?php echo form_open(''); ?>
		<div class="box-header">
			<?php echo anchor(site_url('backend/groups'), lang('back'), array('class' => 'btn btn-default btn-xs')); ?>
		</div>
		<div class="box-body">
			<div class="form-group">
				<?php echo form_label(lang('group_name').' (*)', NULL, array('class' => 'control-label', 'for' => 'group_name')); ?>
				<?php echo form_input('group_name', set_value('group_name', $group->name), array('class' => 'form-control', 'id' => 'group_name')); ?>
				<?php echo form_error('group_name', '<div class="text-red">', '</div>'); ?>
			</div>
			<div class="form-group">
				<?php echo form_label(lang('group_description').' (*)', NULL, array('class' => 'control-label', 'for' => 'group_description')); ?>
				<?php echo form_input('group_description', set_value('group_description', $group->description), array('class' => 'form-control', 'id' => 'group_description')); ?>
				<?php echo form_error('group_description', '<div class="text-red">', '</div>'); ?>
			</div>
		</div>
		<div class="box-footer">
			<?php echo form_hidden('group_id', set_value('group_id', $group->id)); ?>
			<?php echo form_submit('submit', lang('update'), array('class' => 'btn btn-primary btn-xs')); ?>
		</div>
	<?php echo form_close(); ?>
</div>