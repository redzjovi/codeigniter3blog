<p class="heading">
    <h1><?php echo $post->title; ?></h1>
    <p><small><?php echo lang('by').' '.$post->first_name; ?></small></p>
</p>

<p class="heading">
    <amp-social-share type="twitter" width="45" height="33"></amp-social-share>
    <amp-social-share type="facebook" width="45" height="33" data-attribution=254325784911610></amp-social-share>
    <amp-social-share type="gplus" width="45" height="33"></amp-social-share>
    <amp-social-share type="email" width="45" height="33"></amp-social-share>
    <amp-social-share type="pinterest" width="45" height="33"></amp-social-share>
</p>

<figure>
    <amp-img src="<?php echo base_url($post->image ? $upload['posts_upload_path'].'/'.$post->image : 'uploads/default/no-image.png'); ?>" layout="responsive" width="1280" height="768"></amp-img>
</figure>
<p><?php echo $post->content; ?></p>

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