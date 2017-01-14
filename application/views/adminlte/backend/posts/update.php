<div class="box">
	<?php echo form_open_multipart(''); ?>
		<div class="box-header">
			<?php echo anchor(site_url('backend/posts'), lang('back'), array('class' => 'btn btn-default btn-xs')); ?>
		</div>
		<div class="box-body">
			<div class="form-group">
				<?php echo form_label(lang('slug').' (*)', NULL, array('class' => 'control-label', 'for' => 'slug')); ?>
				<?php echo form_input('slug', set_value('slug', $post->slug), array('class' => 'form-control', 'id' => 'slug')); ?>
				<?php echo form_error('slug', '<div class="text-red">', '</div>'); ?>
			</div>
			<div class="form-group">
				<?php echo form_label(lang('title').' (*)', NULL, array('class' => 'control-label', 'for' => 'title')); ?>
				<?php echo form_input('title', set_value('title', $post->title), array('class' => 'form-control', 'id' => 'title')); ?>
				<?php echo form_error('title', '<div class="text-red">', '</div>'); ?>
			</div>
			<div class="form-group">
				<?php echo form_label(lang('content').' (*)', NULL, array('class' => 'control-label', 'for' => 'content')); ?>
				<?php echo form_textarea('content', set_value('content', $post->content), array('class' => 'form-control', 'id' => 'content')); ?>
				<?php echo form_error('content', '<div class="text-red">', '</div>'); ?>
			</div>
			<div class="form-group">
				<?php echo form_label(lang('image'), NULL, array('class' => 'control-label', 'for' => 'image')); ?>
				<?php echo form_upload('image', set_value('image'), array('id' => 'image')); ?>
				<?php echo img($post->image, NULL, array('id' => 'image_div', 'style' => 'width: 250px;')); ?>
				<?php echo form_error('image', '<div class="text-red">', '</div>'); ?>
			</div>
			<div class="form-group">
				<?php $data = $users;
					$data = array('' => '- '.sprintf(lang('select_with_param'), lang('author')).' -') +
					 	array_column($data, 'first_name', 'id');
				?>
				<?php echo form_label(lang('author').' (*)', NULL, array('class' => 'control-label', 'for' => 'author')); ?>
				<?php echo form_dropdown('author', $data, set_value('author', $post->author), array('class' => 'form-control', 'id' => 'author')); ?>
				<?php echo form_error('author', '<div class="text-red">', '</div>'); ?>
			</div>
			<div class="form-group">
				<?php $data = array(
					'' => '- '.sprintf(lang('select_with_param'), lang('status')).' -',
					'0' => lang('inactive'),
					'1' => lang('active'),
				); ?>
				<?php echo form_label(lang('status').' (*)', NULL, array('class' => 'control-label', 'for' => 'status')); ?>
				<?php echo form_dropdown('status', $data, set_value('status', $post->status), array('class' => 'form-control', 'id' => 'status')); ?>
				<?php echo form_error('status', '<div class="text-red">', '</div>'); ?>
			</div>
			<div class="form-group">
				<?php echo form_label(lang('post_date').' (*)', NULL, array('class' => 'control-label', 'for' => 'post_date')); ?>
				<div class="input-group date" id="post_date_picker">
					<?php echo form_input('post_date', set_value('post_date', date($datetime_php, strtotime($post->post_date))), array('class' => 'form-control', 'id' => 'post_date')); ?>
					<span class="input-group-addon">
	                    <span class="fa fa-calendar"></span>
	                </span>
				</div>
				<?php echo form_error('post_date', '<div class="text-red">', '</div>'); ?>
			</div>
		</div>
		<div class="box-footer">
			<?php echo form_hidden('id', set_value('id', $post->id)); ?>
			<?php echo form_submit('submit', lang('update'), array('class' => 'btn btn-primary btn-xs')); ?>
		</div>
	<?php echo form_close(); ?>
</div>

<script>
$(function(){
	function preview_image(input, input_div)
	{
	    if (input.files && input.files[0])
		{
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            input_div.attr('src', e.target.result);
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$('#image').change(function(){
	    preview_image(this, $('#image_div'));
	});
	
	$('#post_date_picker').datetimepicker({
		// 'sideBySide': true,
		'format': '<?php echo $datetime_js; ?>',
		'showClose': true,
		'showTodayButton': true,
	});
});
</script>