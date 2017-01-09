<div class="box">
	<?php echo form_open(''); ?>
		<div class="box-header">
			<?php echo anchor(site_url('backend/users'), lang('back'), array('class' => 'btn btn-default btn-xs')); ?>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="box-body">
					<div class="form-group">
						<?php echo form_label(lang('username').' (*)', NULL, array('class' => 'control-label', 'for' => 'username')); ?>
						<?php echo form_input('username', set_value('username', $user->username), array('class' => 'form-control', 'id' => 'username')); ?>
						<?php echo form_error('username', '<div class="text-red">', '</div>'); ?>
					</div>
					<div class="form-group">
						<?php echo form_label(lang('email').' (*)', NULL, array('class' => 'control-label', 'for' => 'email')); ?>
						<?php echo form_input('email', set_value('email', $user->email), array('class' => 'form-control', 'id' => 'email')); ?>
						<?php echo form_error('email', '<div class="text-red">', '</div>'); ?>
					</div>
					<div class="form-group">
						<?php echo form_label(lang('password').' (*)', NULL, array('class' => 'control-label', 'for' => 'password')); ?>
						<?php echo form_password('password', set_value('password'), array('class' => 'form-control', 'id' => 'password')); ?>
						<?php echo form_error('password', '<div class="text-red">', '</div>'); ?>
					</div>
					<div class="form-group">
						<?php echo form_label(lang('password_confirm').' (*)', NULL, array('class' => 'control-label', 'for' => 'password_confirm')); ?>
						<?php echo form_password('password_confirm', set_value('password_confirm'), array('class' => 'form-control', 'id' => 'password_confirm')); ?>
						<?php echo form_error('password_confirm', '<div class="text-red">', '</div>'); ?>
					</div>
					<div class="form-group">
						<?php echo form_label(lang('groups').' (*)', NULL, array('class' => 'control-label', 'for' => 'groups')); ?>
						<?php foreach((array) $groups as $group) : ?>
							<div class="checkbox icheck">
								<label>
								<?php echo form_checkbox('groups[]', $group->id, set_checkbox('groups[]', $group->id, in_array($group->id, $usergroups))); ?>
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
						<?php echo form_label(lang('first_name'), NULL, array('class' => 'control-label', 'for' => 'first_name')); ?>
						<?php echo form_input('first_name', set_value('first_name', $user->first_name), array('class' => 'form-control', 'id' => 'first_name')); ?>
						<?php echo form_error('first_name', '<div class="text-red">', '</div>'); ?>
					</div>
					<div class="form-group">
						<?php echo form_label(lang('last_name'), NULL, array('class' => 'control-label', 'for' => 'last_name')); ?>
						<?php echo form_input('last_name', set_value('last_name', $user->last_name), array('class' => 'form-control', 'id' => 'last_name')); ?>
						<?php echo form_error('last_name', '<div class="text-red">', '</div>'); ?>
					</div>
					<div class="form-group">
						<?php echo form_label(lang('company'), NULL, array('class' => 'control-label', 'for' => 'company')); ?>
						<?php echo form_input('company', set_value('company', $user->company), array('class' => 'form-control', 'id' => 'company')); ?>
						<?php echo form_error('company', '<div class="text-red">', '</div>'); ?>
					</div>
					<div class="form-group">
						<?php echo form_label(lang('phone'), NULL, array('class' => 'control-label', 'for' => 'phone')); ?>
						<?php echo form_input('phone', set_value('phone', $user->phone), array('class' => 'form-control', 'id' => 'phone')); ?>
						<?php echo form_error('phone', '<div class="text-red">', '</div>'); ?>
					</div>
				</div>
			</div>
		</div>

		<div class="box-footer">
			<?php echo form_hidden('user_id', $user->id); ?>
			<?php echo form_submit('submit', lang('update'), array('class' => 'btn btn-primary btn-xs')); ?>
		</div>
	<?php echo form_close(); ?>
</div>