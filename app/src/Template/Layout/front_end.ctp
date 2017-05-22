<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->fetch('title'); ?></title>
    <?php echo $this->fetch('meta'); ?>
    <?php
        echo $this->Html->css(array(
            'bootstrap.min.css',
            '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
            'front/style.css',
        ));
    ?>
    <?php echo $this->fetch('css'); ?>
</head>
<body>
    <div class="container-fluid" id="mainWrap">
        <?php echo $this->element('Front/menu'); ?>
        <?php echo $this->fetch('content'); ?>
    </div>
    <footer>
        <?php
            echo $this->Html->script(array(
                '//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js',
                'bootstrap.min.js',
            ));
        ?>
        <?php echo $this->fetch('script'); ?>
    </footer>
</body>
</html>
