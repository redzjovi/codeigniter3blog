<div class="box">
	<div class="box-header">
		<a class="btn btn-primary btn-xs" href="<?php echo site_url('backend/groups/create'); ?>"><?php echo lang('create'); ?></a>
	</div>
	<div class="box-body no-padding table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<tr>
				<th>No</th>
				<th><?php echo lang('group_name'); ?></th>
				<th><?php echo lang('group_description'); ?></th>
				<th><?php echo lang('action'); ?></th>
			</tr>
			<?php $i = 1; ?>
			<?php foreach((array) $groups as $group) : ?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $group->name; ?></td>
				<td><?php echo $group->description; ?></td>
				<td>
					<a class="btn btn-success btn-xs" href="<?php echo site_url('backend/groups/update/'.$group->id); ?>"><?php echo lang('update'); ?></a>
					<?php if ( ! in_array($group->name, array('admin','members'))) : ?>
						<a class="btn btn-danger btn-xs" href="<?php echo site_url('backend/groups/delete/'.$group->id); ?>"><?php echo lang('delete'); ?></a>
					<?php endif; ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>