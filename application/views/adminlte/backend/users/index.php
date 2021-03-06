<div class="box">
	<div class="box-header">
		<a class="btn btn-primary btn-xs" href="<?php echo site_url('backend/users/create');?>"><?php echo lang('create'); ?></a>
	</div>
	<div class="box-body no-padding table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<tr>
				<th>No</th>
				<th><?php echo lang('id'); ?></th>
				<th><?php echo lang('username'); ?></th>
				<th><?php echo lang('name'); ?></th>
				<th><?php echo lang('email'); ?></th>
				<th><?php echo lang('groups'); ?></th>
				<th><?php echo lang('last_login'); ?></th>
				<th><?php echo lang('action'); ?></th>
			</tr>
			<?php $i = 1; ?>
			<?php foreach((array) $users as $user) : ?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $user->id; ?></td>
				<td><?php echo $user->username; ?></td>
				<td><?php echo $user->first_name.' '.$user->last_name; ?></td>
				<td><?php echo $user->email; ?></td>
				<td>
					<?php foreach ($user->groups as $group) : ?>
						<?php echo $group->name; ?><br />
					<?php endforeach; ?>
				</td>
				<td><?php echo date('Y-m-d H:i:s', $user->last_login); ?></td>
				<td>
					<a class="btn btn-success btn-xs" href="<?php echo site_url('backend/users/update/'.$user->id); ?>"><?php echo lang('update'); ?></a>
					<?php if ($user->id != 1) : ?>
						<a class="btn btn-danger btn-xs" href="<?php echo site_url('backend/users/delete/'.$user->id); ?>"><?php echo lang('delete'); ?></a>
					<?php endif; ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>