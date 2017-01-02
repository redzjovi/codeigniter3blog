<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b></a>
    </div>
    <?php if (isset($message)) : ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
    
    <!-- /.login-logo -->
    <div class="login-box-body">
        <?php echo form_open('', array('class' => 'form-group has-feedback')); ?>
            <div class="form-group has-feedback">
                <input name="email" type="text" value="<?php echo set_value('email', 'admin@admin.com'); ?>" class="form-control" placeholder="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="password" type="password" value="<?php echo set_value('password', 'password') ?>" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                    <label>
                        <input <?php echo set_checkbox('remember_me', '1'); ?> name="remember_me" type="checkbox" value="1"> Remember Me
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        <?php echo form_close(); ?>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->