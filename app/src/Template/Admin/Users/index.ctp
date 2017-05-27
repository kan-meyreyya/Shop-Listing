<<<<<<< HEAD

<style type="text/css">
    .box {
        margin-bottom: 0px;
        border-top: 0px;
        box-shadow: none;
    }
    .overlay {
        display: none;
    }
</style>

=======

<?php //echo '<pre>'.print_r($user, true).'</pre>'; ?>
>>>>>>> 5fed43cc633f3e7f8f483769591f73b8f030cf54
<section class="content-header">
    <h1>User List</h1>
    <ol class="breadcrumb">
        <li>
            <?php
            echo $this->Html->link('<i class="fa fa-dashboard"></i> Home', 'admin/homes', array(
                'escape' => false,
            ));
            ?>
        </li>
        <li class="active">User</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <?php
                            echo $this->Html->link('<i class="fa fa-users"></i> Add User', 'admin/users/add', array(
                                'class' => 'btn btn-default',
                                'escape' => false,
                            ));
                        ?>
                    </div>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 230px;">
<<<<<<< HEAD
                            <?php
                                echo $this->Form->create('user', array(
                                    'role' => 'form',
                                    'name' => 'form_search',
                                    'class' => 'form-inline',
                                    'type' => 'get',
                                ));
                            ?>
                            <?php
                                echo $this->Form->input('keyword', array(
                                    'class' => 'form-control pull-right',
                                    'placeholder' => 'username or role',
                                    'label' => false,
                                    'templates' => array(
                                        'inputContainer' => '{{content}}'
                                    ),
                                ));
                            ?>
                            <?php echo $this->Form->end(); ?>
=======
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
>>>>>>> 5fed43cc633f3e7f8f483769591f73b8f030cf54
                        </div>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
<<<<<<< HEAD
                                <th><?php echo $this->Paginator->sort('username'); ?></th>
                                <th><?php echo $this->Paginator->sort('email'); ?></th>
                                <th><?php echo $this->Paginator->sort('phone'); ?></th>
                                <th><?php echo $this->Paginator->sort('role'); ?></th>
                                <th><?php echo $this->Paginator->sort('created'); ?></th>
=======
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Create Date</th>
>>>>>>> 5fed43cc633f3e7f8f483769591f73b8f030cf54
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($user) : foreach ($user as $item) : ;?>
                                <tr>
<<<<<<< HEAD
                                    <td><?php echo h($item->username) ?></td>
                                    <td><?php echo h($item->email); ?></td>
                                    <td><?php echo h($item->phone); ?></td>
                                    <td><?php echo h($item->role); ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($item['created'])); ?></td>
                                    <td>
                                        <?php
                                            echo $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i> Edit', 'admin/users/edit/' . $item['id'], array(
                                                'class' => 'btn btn-sm btn-primary',
                                                'escape' => false,
                                            ));
                                        ?>
                                        <?php
                                            echo $this->Form->button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                'class' => 'btn btn-danger btn-sm',
                                                'id' => 'btn_delete',
                                                'data-id' => h($item->id),
                                                'escape' => false,
                                            ));
                                        ?>
                                    </td>
=======
                                    <td><?php echo $item['User']['username']; ?></td>
>>>>>>> 5fed43cc633f3e7f8f483769591f73b8f030cf54
                                </tr>
                            <?php endforeach; endif; ?>
                        </tbody>
                    </tbody></table>
                </div>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
<<<<<<< HEAD
                        <?php echo $this->Paginator->first('<< ' . __('first')) ?>
                        <?php echo $this->Paginator->prev('< ' . __('previous')) ?>
                        <?php echo $this->Paginator->numbers() ?>
                        <?php echo $this->Paginator->next(__('next') . ' >') ?>
                        <?php echo $this->Paginator->last(__('last') . ' >>') ?>
=======
                        <li><a href="#">«</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">»</a></li>
>>>>>>> 5fed43cc633f3e7f8f483769591f73b8f030cf54
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<<<<<<< HEAD
<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirm Message</h4>
            </div>
            <div class="modal-body box">
                <p>Do you want to delete this user?</p>
                <?php echo $this->Form->hidden('id', array('id' => 'id')); ?>
                <div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <?php
                    echo $this->Form->button('Yes', array(
                        'class' => 'btn btn-primary',
                        'id' => 'btn_yes',
                    ));
                ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(e) {

        $('body').on('click', '#btn_delete', function(e) {
            var modal = $('body').find('#modal_delete');
            $(modal).find('#id').val($(this).data('id'));
            $(modal).modal('show');
        });

        $('body').on('click', '#btn_yes', function(e) {
            e.preventDefault();
            console.log($('#id').val());
            $('.overlay').show();

            $.ajax({
                'type': 'post',
                'url': '<?php echo $this->Url->build('/admin/users/delete/'); ?>',
                'dataType': 'json',
                'data': {'id': $('#id').val(), '_csrfToken': '<?php echo $this->request->getParam('_csrfToken'); ?>'}
            }).done(function(data) {
                if (data.status === 'error') {
                    $('#modal_delete').find('.modal-body').find('p').html(data.message);
                } else {
                    window.location.href = '<?php echo $this->Url->build('/admin/users'); ?>';
                }
                $('.overlay').hide();
            });
        });

        $('#modal_delete').on('hidden.bs.modal', function (e) {
            $(this).find('p').html('Do you want to delete this user?');
        });
    });
</script>
=======
>>>>>>> 5fed43cc633f3e7f8f483769591f73b8f030cf54
