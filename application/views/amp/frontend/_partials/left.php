<!-- #### Navigation -->
<!--
Use the [amp-sidebar](/components/amp-sidebar/) component to give customers the chance to quickly jump to any of your product categories.
-->
<amp-sidebar id='drawermenu' layout="nodisplay">
    <div class="topheader">
        <a href="<?php echo site_url(); ?>" class="home"><?php echo lang('home'); ?></a>
    </div>
    <hr/>

    <?php foreach ((array) $left_menu->result() as $row) : ?>
        <h4 class="category"><a href="<?php echo site_url('post_categories/'.$row->slug); ?>"><?php echo $row->name; ?></a></h4>
    <?php endforeach; ?>
</amp-sidebar>