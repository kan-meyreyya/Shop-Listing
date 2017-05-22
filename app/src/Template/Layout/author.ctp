<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $this->fetch('title'); ?></title>
    <?php echo $this->fetch('meta'); ?>

    <?php
        echo $this->Html->css(array(
            'bootstrap.min.css',
            '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
            '//cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
            'admin.min.css',
            'skins/_all-skins.min.css',
            'minimal/minimal.css',
        ));
    ?>
    <?php echo $this->fetch('css'); ?>

</head>
<body>
    <div class="container">
        <?php echo $this->fetch('content'); ?>
    </div>
    <footer>
        <?php
            echo $this->Html->script(array(
                '//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js',
                'bootstrap.min.js',
                'icheck.min.js',
            ));
        ?>
        <?php echo $this->fetch('script'); ?>
        <script>
            $(document).ready(function(){
                $('.icheck_minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal',
                    increaseArea: '20%'
                });
            });
        </script>
    </footer>
</body>
</html>
