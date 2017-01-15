<?php foreach ((array) $posts->result() as $row) : ?>
    <div>
        <div class="card blog">
            <amp-img src="<?php echo base_url($row->image ? $upload['posts_upload_path'].'/'.$row->image : 'uploads/default/no-image.png'); ?>"
                layout="responsive" width="1280" height="768">
            </amp-img>
            <h1 class="title">
                <?php echo anchor(site_url('posts/'.$row->slug), $row->title); ?>
            </h1>
            <p class="date"><?php echo $row->post_date; ?></p>
            <p><small><?php echo lang('by').' '.$row->first_name; ?></small></p>
            <p class="text">
                <?php echo character_limiter($row->content, 500); ?>
                <?php echo anchor(site_url('posts/'.$row->slug), lang('read_more')); ?>
            </p>
            <p class="social-share">
                <amp-social-share type="email"></amp-social-share>
                <amp-social-share type="facebook"></amp-social-share>
                <amp-social-share type="gplus"></amp-social-share>
                <amp-social-share type="linkedin"></amp-social-share>
                <amp-social-share type="pinterest"></amp-social-share>
                <amp-social-share type="tumblr"></amp-social-share>
                <amp-social-share type="twitter"></amp-social-share>
                <!-- <amp-social-share type="whatsapp"></amp-social-share> -->
            </p>
        </div>
    </div>
<?php endforeach; ?>