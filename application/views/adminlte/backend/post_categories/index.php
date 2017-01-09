<div class="box">
	<div class="box-header">
		<a class="btn btn-primary btn-xs" href="<?php echo site_url('backend/post_categories/create'); ?>"><?php echo lang('create'); ?></a>
	</div>
	<div class="box-body no-padding table-responsive">
		<table class="table table-bordered table-hover table-striped" id="table">
			<thead>
				<tr>
					<th>No</th>
					<th><?php echo lang('slug'); ?></th>
					<th><?php echo lang('name'); ?></th>
					<th><?php echo lang('action'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach((array) $post_categories->result() as $row) : ?>
				<tr>
					<td></td>
					<td><?php echo $row->slug; ?></td>
					<td><?php echo $row->name; ?></td>
					<td>
						<a class="btn btn-success btn-xs" href="<?php echo site_url('backend/post_categories/update/'.$row->id); ?>"><?php echo lang('update'); ?></a>
						<a class="btn btn-danger btn-xs" href="<?php echo site_url('backend/post_categories/delete/'.$row->id); ?>"><?php echo lang('delete'); ?></a>
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