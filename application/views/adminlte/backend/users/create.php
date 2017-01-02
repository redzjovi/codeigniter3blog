<div class="box">
	<?php echo form_open(''); ?>
		<div class="box-header">
			<?php echo anchor(site_url('backend/users'), 'Back', array('class' => 'btn btn-default btn-xs')); ?>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="box-body">
					<div class="form-group">
						<?php echo form_label('Username (*)', NULL, array('class' => 'control-label', 'for' => 'username')); ?>
						<?php echo form_input('username', set_value('username'), array('class' => 'form-control', 'id' => 'username')); ?>
						<?php echo form_error('username', '<div class="text-red">', '</div>'); ?>
					</div>
					<div class="form-group">
						<?php echo form_label('Email (*)', NULL, array('class' => 'control-label', 'for' => 'email')); ?>
						<?php echo form_input('email', set_value('email'), array('class' => 'form-control', 'id' => 'email')); ?>
						<?php echo form_error('email', '<div class="text-red">', '</div>'); ?>
					</div>
					<div class="form-group">
						<?php echo form_label('Password (*)', NULL, array('class' => 'control-label', 'for' => 'password')); ?>
						<?php echo form_password('password', set_value('password'), array('class' => 'form-control', 'id' => 'password')); ?>
						<?php echo form_error('password', '<div class="text-red">', '</div>'); ?>
					</div>
					<div class="form-group">
						<?php echo form_label('Confirm Password (*)', NULL, array('class' => 'control-label', 'for' => 'password_confirm')); ?>
						<?php echo form_password('password_confirm', set_value('password_confirm'), array('class' => 'form-control', 'id' => 'password_confirm')); ?>
						<?php echo form_error('password_confirm', '<div class="text-red">', '</div>'); ?>
					</div>
					<div class="form-group">
						<?php echo form_label('Groups (*)', NULL, array('class' => 'control-label', 'for' => 'groups')); ?>
						<?php foreach((array) $groups as $group) : ?>
							<div class="checkbox icheck">
								<label>
								<?php echo form_checkbox('groups[]', $group->id, set_checkbox('groups[]', $group->id)); ?>
								<?php echo ' '.$group->name; ?>
								</label>
							</div>
						<?php endforeach; ?>
						<?php echo form_error('groups[]', '<div class="text-red">', '</div>'); ?>
					</div>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="box-body">
					<div class="form-group">
						<?php echo form_label('First name', NULL, array('class' => 'control-label', 'for' => 'first_name')); ?>
						<?php echo form_input('first_name', set_value('first_name'), array('class' => 'form-control', 'id' => 'first_name')); ?>
						<?php echo form_error('first_name', '<div class="text-red">', '</div>'); ?>
					</div>
					<div class="form-group">
						<?php echo form_label('Last name', NULL, array('class' => 'control-label', 'for' => 'last_name')); ?>
						<?php echo form_input('last_name', set_value('last_name'), array('class' => 'form-control', 'id' => 'last_name')); ?>
						<?php echo form_error('last_name', '<div class="text-red">', '</div>'); ?>
					</div>
					<div class="form-group">
						<?php echo form_label('Company', NULL, array('class' => 'control-label', 'for' => 'company')); ?>
						<?php echo form_input('company', set_value('company'), array('class' => 'form-control', 'id' => 'company')); ?>
						<?php echo form_error('company', '<div class="text-red">', '</div>'); ?>
					</div>
					<div class="form-group">
						<?php echo form_label('Phone', NULL, array('class' => 'control-label', 'for' => 'phone')); ?>
						<?php echo form_input('phone', set_value('phone'), array('class' => 'form-control', 'id' => 'phone')); ?>
						<?php echo form_error('phone', '<div class="text-red">', '</div>'); ?>
					</div>
				</div>
			</div>
		</div>
		
		<div class="box-footer">
			<?php echo form_submit('submit', 'Create user', array('class' => 'btn btn-primary btn-xs')); ?>
		</div>
	<?php echo form_close(); ?>
</div>