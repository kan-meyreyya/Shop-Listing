
<div clas="row">
    <div class="col-sm-6 col-lg-6 col-md-6">
        <div class="box box-primary" style="position: absolute; transform: translateX(50%) translateY(50%);">
            <div class="box-header with-border"><h3 class="box-title">Reset Password</h3></div>
            <?php
                echo $this->Form->create(isset($user) ? $user : '', array(
                    'role' => 'form',
                ));
            ?>
            <?php echo $this->Flash->render(); ?>
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <?php
                        echo $this->Form->input('email', array(
                            'class' => 'form-control',
                            'placeholder' => 'Enter email',
                            'label' => false,
                            'type' => 'email',
                            'templates' => array(
                                'inputContainer' => '{{content}}',
                                'inputContainerError' => '<div class="has-error">{{content}}<label class="control-label" for="inputError">{{error}}</label></div>',
                            ),
                        ));
                    ?>
                </div>
            </div>
            <div class="box-footer">
                <?php
                    echo $this->Form->submit('Send', array(
                        'class' => 'btn btn-primary',
                    ));
                ?>
            </div>
            <?php echo $this->Form->end(); ?>
          </div>
    </div>
</div>