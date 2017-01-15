<p class="heading">
    <h1><?php echo $post->title; ?></h1>
    <p><small><?php echo lang('by').' '.$post->first_name; ?></small></p>
</p>

<p class="heading">
    <amp-social-share type="email"></amp-social-share>
    <amp-social-share type="facebook"></amp-social-share>
    <amp-social-share type="gplus"></amp-social-share>
    <amp-social-share type="linkedin"></amp-social-share>
    <amp-social-share type="pinterest"></amp-social-share>
    <amp-social-share type="tumblr"></amp-social-share>
    <amp-social-share type="twitter"></amp-social-share>
    <!-- <amp-social-share type="whatsapp"></amp-social-share> -->
</p>

<amp-image-lightbox id="lightbox1" layout="nodisplay"></amp-image-lightbox>

<figure>
    <amp-img src="<?php echo base_url($post->image ? $upload['posts_upload_path'].'/'.$post->image : 'uploads/default/no-image.png'); ?>"
        layout="responsive"
        on="tap:lightbox1"
        width="1280"
        height="768">
    </amp-img>
</figure>
<p><?php echo $post->content; ?></p>

<p class="heading">
    <amp-social-share type="email"></amp-social-share>
    <amp-social-share type="facebook"></amp-social-share>
    <amp-social-share type="gplus"></amp-social-share>
    <amp-social-share type="linkedin"></amp-social-share>
    <amp-social-share type="pinterest"></amp-social-share>
    <amp-social-share type="tumblr"></amp-social-share>
    <amp-social-share type="twitter"></amp-social-share>
    <!-- <amp-social-share type="whatsapp"></amp-social-share> -->
</p>

<h4><?php echo lang('recent_articles'); ?></h4>
<amp-list width=300 height=75 layout=responsive>
    <?php $number = 0; ?>
    <?php foreach ((array) $posts->result() as $row) : ?>
        <a class="card related" href="<?php echo site_url('posts/'.$row->slug); ?>">
            <amp-img width="101" height="75" src="<?php echo base_url($row->image ? $upload['posts_upload_path'].'/'.$row->image : 'uploads/default/no-image.png'); ?>"></amp-img>
            <span><?php echo $row->title; ?></span>
        </a>
        <?php $number++;
        if ($number == 3) break;
        ?>
    <?php endforeach; ?>
</amp-list>