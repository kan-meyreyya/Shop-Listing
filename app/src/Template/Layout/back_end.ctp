<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset() ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $this->fetch('title') ?></title>
        <?php echo $this->Html->meta('icon'); ?>
        <?php
            echo $this->Html->css(array(
                'bootstrap.min.css',
                '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
                '//cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
                'admin.min.css',
                'skins/_all-skins.min.css',
                'minimal/minimal.css',
                'dashboard.css',
            ));
        ?>

        <?php
            echo $this->Html->script(array(
                '//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js',
                'bootstrap.min.js',
                'icheck.min.js',
                'app.js',
                'dashboard.js',
            ));
        ?>

        <?php echo $this->fetch('meta') ?>
        <?php echo $this->fetch('css') ?>
        <?php echo $this->fetch('script') ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <?php
                    echo $this->Html->link(
                        '<span class="logo-mini"><b>Admin</b></span><span class="logo-lg"><b>Administrator</b></span>',
                        'javascript:void(0);', array('class' => 'logo', 'escape' => false,)
                    );
                ?>
                <nav class="navbar navbar-static-top">
                    <?php
                        echo $this->Html->link(
                            '<span class="sr-only">Toggle navigation</span>',
                            'javascript:void(0);', array(
                                'class' => 'sidebar-toggle',
                                'data-toggle' => 'offcanvas',
                                'role' => 'button',
                                'escape' => false,
                            )
                        );
                    ?>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="javascript:void(0);">
                                    <?php echo $this->request->session()->read('Auth.User.username'); ?>
                                </a>
                            </li>
                            <li>
                                <?php
                                    echo $this->Html->link(
                                        '<i class="fa fa-sign-out" aria-hidden="true"></i> Logout',
                                        array(
                                            'controller' => 'users',
                                            'action' => 'logout',
                                        ), array(
                                            'escape' => false,
                                        )
                                    );
                                ?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <?php echo $this->element('Admin/admin_menu'); ?>
            <?php echo $this->element('Admin/admin_content'); ?>

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.3.8
                </div>
                <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
                reserved.

                <script>
                    $(document).ready(function () {
                        $('.icheck_minimal').iCheck({
                            checkboxClass: 'icheckbox_minimal',
                            radioClass: 'iradio_minimal',
                            increaseArea: '20%'
                        });
                    });
                </script>
            </footer>
        </div>
    </body>
</html>