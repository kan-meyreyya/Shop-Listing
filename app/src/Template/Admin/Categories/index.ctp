
<section class="content-header">
    <h1>Category List</h1>
    <ol class="breadcrumb">
        <li>
            <?php
                echo $this->Html->link('<i class="fa fa-dashboard"></i> Home', array(
                    'controller' => 'homes',
                    'action' => 'index',
                ), array(
                    'escape' => false,
                ));
            ?>
        </li>
        <li class="active">Category</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <?php
                            echo $this->Html->link(
                                '<i class="fa fa-users"></i> Add Category', array(
                                    'controller' => 'categories',
                                    'action' => 'add',
                                ), array(
                                    'class' => 'btn btn-default',
                                    'escape' => false,
                                )
                                );
                        ?>
                    </div>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 230px;">
                            <?php
                                echo $this->Form->create('category', array(
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
                        </div>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><?php echo $this->Paginator->sort('username'); ?></th>
                                <th><?php echo $this->Paginator->sort('email'); ?></th>
                                <th><?php echo $this->Paginator->sort('phone'); ?></th>
                                <th><?php echo $this->Paginator->sort('role'); ?></th>
                                <th><?php echo $this->Paginator->sort('created'); ?></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($category) : foreach ($category as $item) : ;?>
                                <tr>
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
                                </tr>
                            <?php endforeach; endif; ?>
                        </tbody>
                    </tbody></table>
                </div>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <?php echo $this->Paginator->first('<< ' . __('first')) ?>
                        <?php echo $this->Paginator->prev('< ' . __('previous')) ?>
                        <?php echo $this->Paginator->numbers() ?>
                        <?php echo $this->Paginator->next(__('next') . ' >') ?>
                        <?php echo $this->Paginator->last(__('last') . ' >>') ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
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