
<?php
    $templates = array(
        'inputContainer' => '{{content}}',
        'inputContainerError' => '<div class="has-error">{{content}}<label class="control-label" for="inputError">{{error}}</label></div>',
    );
?>
<section class="content-header">
    <h1><?php echo ($this->request->action === 'add') ? 'Add New User' : 'Edit User'; ?></h1>
    <ol class="breadcrumb">
        <li>
            <?php
                echo $this->Html->link('<i class="fa fa-dashboard"></i> Home', 'admin/homes', array(
                    'escape' => false,
                ));
            ?>
        </li>
        <li>User</li>
        <li class="active"><?php echo ($this->request->action === 'add') ? 'Create' : 'Edit'; ?></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Flash->render(); ?>
            <div class="box box-primary">
                <?php
                    echo $this->Form->create(isset($user) ? $user : '', array(
                        'role' => 'form',
                        'autocomplete' => 'off',
                    ));
                ?>
                <div class="box-body col-md-6">
                    <div class="form-group">
                        <label>Username</label>
                        <?php
                            echo $this->Form->input('username', array(
                                'placeholder' => 'Username',
                                'class' => 'form-control',
                                'label' => false,
                                'templates' => $templates,
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
                                'templates' => $templates,
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
                                'templates' => $templates,
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
                                'templates' => $templates,
                            ));
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                         <?php
                            echo $this->Form->input('confirm_pwd', array(
                                'placeholder' => 'Confirm Password',
                                'class' => 'form-control',
                                'type' => 'password',
                                'label' => false,
                                'templates' => $templates,
                                'value' => $user ? h($user->password) : '',
                            ));
                        ?>
                    </div>
                </div>
                <div class="clearfix"></div>
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
