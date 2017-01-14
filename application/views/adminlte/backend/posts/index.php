<div class="box">
	<div class="box-header">
		<a class="btn btn-primary btn-xs" href="<?php echo site_url('backend/posts/create'); ?>"><?php echo lang('create'); ?></a>
		<a class="btn btn-danger btn-xs" href="<?php echo site_url('backend/posts/cleansing'); ?>"><?php echo lang('cleansing'); ?></a>
	</div>
	<div class="box-body no-padding table-responsive">
		<table class="table table-bordered table-hover table-striped" id="table">
			<thead>
				<tr>
					<th>No</th>
					<th><?php echo lang('slug'); ?></th>
					<th><?php echo lang('title'); ?></th>
					<th><?php echo lang('content'); ?></th>
					<th><?php echo lang('author'); ?></th>
					<th><?php echo lang('status'); ?></th>
					<th><?php echo lang('post_date'); ?></th>
					<th><?php echo lang('created_date'); ?></th>
					<th><?php echo lang('action'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach((array) $posts->result() as $row) : ?>
				<tr>
					<td></td>
					<td><?php echo $row->slug; ?></td>
					<td><?php echo $row->title; ?></td>
					<td><?php echo $row->content; ?></td>
					<td><?php echo $row->first_name; ?></td>
					<td><?php echo ($row->status == '1' ? lang('active') : lang('inactive')); ?></td>
					<td><?php echo $row->post_date; ?></td>
					<td><?php echo $row->created_date; ?></td>
					<td>
						<a class="btn btn-success btn-xs" href="<?php echo site_url('backend/posts/update/'.$row->id); ?>"><?php echo lang('update'); ?></a>
						<a class="btn btn-danger btn-xs" href="<?php echo site_url('backend/posts/delete/'.$row->id); ?>"><?php echo lang('delete'); ?></a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<script>
$(function () {
	var t = $('#table').DataTable();
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
});
</script>