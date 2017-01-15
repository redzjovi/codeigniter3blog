<?php foreach ((array) $posts->result() as $row) : ?>
    <div>
        <div class="card blog">
            <amp-img src="<?php echo base_url($row->image ? $upload['posts_upload_path'].'/'.$row->image : 'uploads/default/no-image.png'); ?>"
                layout="responsive" width="1280" height="768">
            </amp-img>
            <h1 class="title"><?php echo $row->title; ?></h1>
            <p class="date"><?php echo $row->post_date; ?></p>
            <p><small><?php echo lang('by').' '.$row->first_name; ?></small></p>
            <p class="text">
                <?php echo character_limiter($row->content, 500); ?>
                <?php echo anchor(site_url('posts/'.$row->slug), lang('read_more')); ?>
            </p>
            <p class="social-share">
                <amp-social-share type="twitter" width="45" height="33"></amp-social-share>
                <amp-social-share type="facebook" width="45" height="33"></amp-social-share>
                <amp-social-share type="gplus" width="45" height="33"></amp-social-share>
                <amp-social-share type="email" width="45" height="33"></amp-social-share>
                <amp-social-share type="pinterest" width="45" height="33"></amp-social-share>
            </p>
        </div>
    </div>
<?php endforeach; ?>