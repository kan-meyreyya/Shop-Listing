
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <?php echo $this->form->create('user', array('role' => 'form')); ?>
                <div class="box-body">
                    <div class="form-group">
                        <label>Username</label>
                        <?php
                            echo $this->Form->input('username', array(
                                'placeholder' => 'Username',
                                'class' => 'form-control',
                                'label' => false,
                            ));
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <?php
                            echo $this->Form->input('email', array(
                                'placeholder' => 'Email',
                                'class' => 'form-control',
                                'label' => false,
                            ));
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                         <?php
                            echo $this->Form->input('tel', array(
                                'placeholder' => 'Phone',
                                'class' => 'form-control',
                                'label' => false,
                            ));
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                         <?php
                            echo $this->Form->input('password', array(
                                'placeholder' => 'Password',
                                'class' => 'form-control',
                                'label' => false,
                            ));
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                         <?php
                            echo $this->Form->input('confirm_pwd', array(
                                'placeholder' => 'Confirm Password',
                                'class' => 'form-control',
                                'label' => false,
                            ));
                        ?>
                    </div>
                </div>
                <div class="box-footer">
                    <?php
                        echo $this->Form->submit('Save', array(
                            'class' => 'btn btn-primary',
                        ));
                    ?>
                </div>
            <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</section>
