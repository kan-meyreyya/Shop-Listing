
<div class="col-sm-8 col-lg-8 col-md-8">
    <?php
        echo $this->Form->create('user', array(
            'role' => 'form',
            'class' => 'form-horizontal',
        ));
    ?>
    <div class="form-group">
        <label class="col-sm-2 control-label">username</label>
        <div class="col-sm-10">
            <?php
                echo $this->Form->input('username', array(
                    'placeholder' => 'username',
                    'class' => 'form-control',
                    'label' => false,
                ));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">email</label>
        <div class="col-sm-10">
            <?php
                echo $this->Form->input('email', array(
                    'placeholder' => 'password',
                    'class' => 'form-control',
                    'type' => 'email',
                    'label' => false,
                ));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Phone</label>
        <div class="col-sm-10">
            <?php
                echo $this->Form->input('phone', array(
                    'placeholder' => 'phone number',
                    'class' => 'form-control',
                    'type' => 'tel',
                    'label' => false,
                ));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <?php
                echo $this->Form->input('password', array(
                    'placeholder' => 'password',
                    'class' => 'form-control',
                    'type' => 'password',
                    'label' => false,
                ));
            ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php
                echo $this->Form->submit('Register', array(
                    'class' => 'btn btn-default',
                ));
            ?>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
