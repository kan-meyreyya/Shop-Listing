<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset() ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $this->fetch('title') ?></title>
        <?php echo $this->Html->meta('icon'); ?>
        <?php
            echo $this->Html->css([
                'bootstrap.min.css',
                '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
                '//cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
                'admin.min.css',
                'skins/_all-skins.min.css',
                'minimal/minimal.css',
                'dashboard.css',
            ]);
        ?>

        <?php echo $this->fetch('meta') ?>
        <?php echo $this->fetch('css') ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <?php
            $session = $this->request->session();
            $AUTH_ROLE = $session->read('Auth.User.role');
            $AUTH_USERNAME = $session->read('Auth.User.username');
        ?>
        <div class="wrapper">
            <header class="main-header">
                <a href="index2.html" class="logo">
                    <span class="logo-mini"><b>Admin</b></span>
                    <span class="logo-lg"><b>Administrator</b></span>
                </a>
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="hidden-xs"><?php echo $AUTH_USERNAME; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        <p>Alexander Pierce - Web Developer<small>Member since Nov. 2012</small></p>
                                    </li>
                                    <li class="user-body">
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Followers</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Sales</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Friends</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <?php
                                                echo $this->Html->link('Sign out', 'admin/users/logout', array(
                                                    'class' => 'btn btn-default btn-flat',
                                                ));
                                            ?>
                                        </div>
                                    </li>
                                </ul>
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

                <?php
                echo $this->Html->script([
                    '//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js',
                    'bootstrap.min.js',
                    'icheck.min.js',
                    'app.js',
                    'dashboard.js',
                ]);
                ?>
                <script>
                    var BASE_URL = '<?php echo BASE_URL; ?>';
                </script>
<?php echo $this->fetch('script') ?>

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