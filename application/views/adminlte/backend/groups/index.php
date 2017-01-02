<div class="box">
	<div class="box-header">
		<a class="btn btn-primary btn-xs" href="<?php echo site_url('backend/groups/create'); ?>">Create group</a>
	</div>
	<div class="box-body no-padding table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<tr>
				<th>No</th>
				<th>Group Name</th>
				<th>Group Description</th>
				<th>Action</th>
			</tr>
			<?php $i = 1; ?>
			<?php foreach((array) $groups as $group) : ?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $group->name; ?></td>
				<td><?php echo $group->description; ?></td>
				<td>
					<a class="btn btn-success btn-xs" href="<?php echo site_url('backend/groups/update/'.$group->id); ?>">Update</a>
					<?php if ( ! in_array($group->name, array('admin','members'))) : ?>
						<a class="btn btn-danger btn-xs" href="<?php echo site_url('backend/groups/delete/'.$group->id); ?>">Delete</a>
					<?php endif; ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>