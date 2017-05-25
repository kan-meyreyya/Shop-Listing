
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <?php
                    echo $this->Form->create(isset($user) ? $user : '', array(
                        'role' => 'form',
                        'autocomplete' => 'off',
                    ));
                ?>
                <div class="box-body">
                    <div class="form-group">
                        <label>Username</label>
                        <?php
                            echo $this->Form->input('username', array(
                                'placeholder' => 'Username',
                                'class' => 'form-control',
                                'label' => false,
                                'templates' => array(
                                    'inputContainerError' => '<div class="col-sm-10 has-error">{{content}}<label class="control-label" for="inputError">{{error}}</label></div>',
                                )
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
                                'templates' => array(
                                    'inputContainerError' => '<div class="col-sm-10 has-error">{{content}}<label class="control-label" for="inputError">{{error}}</label></div>',
                                )
                            ));
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                         <?php
                            echo $this->Form->input('phone', array(
                                'placeholder' => 'Phone',
                                'type' => 'tel',
                                'class' => 'form-control',
                                'label' => false,
                                'templates' => array(
                                    'inputContainerError' => '<div class="col-sm-10 has-error">{{content}}<label class="control-label" for="inputError">{{error}}</label></div>',
                                )
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
                                'templates' => array(
                                    'inputContainerError' => '<div class="col-sm-10 has-error">{{content}}<label class="control-label" for="inputError">{{error}}</label></div>',
                                )
                            ));
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                         <?php
                            echo $this->Form->input('confirm_pwd', array(
                                'placeholder' => 'Confirm Password',
                                'class' => 'form-control',
                                'label' => false,
                                'templates' => array(
                                    'inputContainerError' => '<div class="col-sm-10 has-error">{{content}}<label class="control-label" for="inputError">{{error}}</label></div>',
                                )
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
