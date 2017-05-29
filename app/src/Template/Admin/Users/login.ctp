
<?php
    echo $this->assign('title', 'Administrator');
    echo $this->Flash->render();
?>

<div class="login-box">
    <div class="login-logo"><b>
        <?php echo $this->Html->link('Adminstrator', '/'); ?></b>
    </div>
    <div class="login-box-body" style="background: #eee !important;">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php
            echo $this->Form->create('user', array(
                'role' => 'form',
                'name' => 'login_form',
            ));
        ?>
        <div class="form-group has-feedback">
            <?php
                echo $this->Form->input('username', array(
                    'placeholder' => 'username',
                    'label' => false,
                    'class' => 'form-control',
                ));
            ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?php
                echo $this->Form->input('password', array(
                    'placeholder' => 'Password',
                    'label' => false,
                    'class' => 'form-control',
                ));
            ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <?php
                    echo $this->Html->link('forgot password', $this->Url->build(array(
                        'controller' => 'users',
                        'action' => 'forgot_password',
                    )));
                ?>
            </div>
            <div class="col-xs-4">
                <?php
                    echo $this->Form->button('Login', array(
                        'class' => 'btn btn-primary btn-block btn-flat',
                    ));
                ?>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
