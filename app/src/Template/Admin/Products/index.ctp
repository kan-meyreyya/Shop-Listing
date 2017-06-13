
<style>
    .box {
        margin-bottom: 0px;
        box-shadow: none;
        border: none;
    }
</style>

<section class="content-header">
    <h1>Product List</h1>
    <ol class="breadcrumb">
        <li>
            <?php
                echo $this->Html->link(
                    '<i class="fa fa-dashboard"></i> Home', array(
                        'controller' => 'homes',
                        'action' => 'index',
                    ), array('escape' => false,)
                );
            ?>
        <li class="active">Products</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1" data-toggle="tab" aria-expanded="true">Publish
                            <span class="pull-right-container">
                                <small class="label bg-blue"><?php echo $total_active; ?></small>
                            </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#tab_2" data-toggle="tab" aria-expanded="false">Trash
                            <span class="pull-right-container">
                                <small class="label bg-red"><?php echo $total_deactive; ?></small>
                            </span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box">
                            <div class="box-header">
                                <div class="box-title">
                                    <?php
                                    echo $this->Html->link(
                                        '<i class="fa fa-plus" aria-hidden="true"></i> Add Product', array(
                                        'controller' => 'products',
                                        'action' => 'add',
                                        ), array(
                                        'class' => 'btn btn-default',
                                        'escape' => false,
                                    ));
                                    ?>
                                </div>
                                <div class="box-tools">
                                    <div class="input-group input-group-sm" style="width: 230px;">
                                        <?php
                                        echo $this->Form->create('products', array(
                                            'role' => 'form',
                                            'name' => 'form_search',
                                            'class' => 'form-inline',
                                            'type' => 'get',
                                        ));
                                        ?>
                                        <?php
                                        echo $this->Form->input('keyword', array(
                                            'class' => 'form-control pull-right',
                                            'placeholder' => 'product name or price',
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
                                            <th><?php echo $this->Paginator->sort('name'); ?></th>
                                            <th><?php echo $this->Paginator->sort('price'); ?></th>
                                            <th><?php echo $this->Paginator->sort('description'); ?></th>
                                            <th><?php echo $this->Paginator->sort('category_id'); ?></th>
                                            <th><?php echo $this->Paginator->sort('created'); ?></th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($products) : foreach ($products as $item) :; ?>
                                                <tr data-id="<?php echo $item->id; ?>" data-target="publish">
                                                    <td><?php echo h($item->name) ?></td>
                                                    <td><?php echo $this->Number->currency($item->price, 'USD') ?></td>
                                                    <td><?php echo h($item->description); ?></td>
                                                    <td><?php echo h($item->category_name); ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($item->created)); ?></td>
                                                    <td>
                                                        <?php
                                                        echo $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i> Edit', array(
                                                            'controller' => 'products',
                                                            'action' => 'edit', h($item->id),
                                                            ), array(
                                                            'class' => 'btn btn-sm btn-primary',
                                                            'escape' => false,
                                                            )
                                                        );
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
                                            <?php endforeach;
                                        endif; ?>
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
                    <div class="tab-pane" id="tab_2">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->Paginator->sort('name'); ?></th>
                                        <th><?php echo $this->Paginator->sort('price'); ?></th>
                                        <th><?php echo $this->Paginator->sort('description'); ?></th>
                                        <th><?php echo $this->Paginator->sort('category_id'); ?></th>
                                        <th><?php echo $this->Paginator->sort('created'); ?></th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($products_deactive) : foreach ($products_deactive as $item) :; ?>
                                        <tr data-id="<?php echo $item->id; ?>" data-target="restore">
                                            <td><?php echo h($item->name) ?></td>
                                            <td><?php echo $this->Number->currency($item->price, 'USD') ?></td>
                                            <td><?php echo h($item->description); ?></td>
                                            <td><?php echo h($item->category_name); ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($item->created)); ?></td>
                                            <td>
                                                <?php
                                                    echo $this->Form->button('<i class="fa fa-undo" aria-hidden="true"></i> Restore', array(
                                                        'class' => 'btn btn-sm btn-info',
                                                        'id' => 'btn_restore',
                                                        'escape' => false,
                                                    ));
                                                ?>
                                                <?php
                                                    echo $this->Form->button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete Forever', array(
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'id' => 'btn_delete_db',
                                                        'data-id' => h($item->id),
                                                        'escape' => false,
                                                    ));
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; endif; ?>
                                </tbody>
                            </table>
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
        </div>
    </div>
</section>

<div class="modal fade" id="modal_msg" tabindex="-1" data-backdrop="static" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirm Message</h4>
            </div>
            <div class="modal-body box">
                <p>Do you want to delete this product?</p>
                <?php echo $this->Form->hidden('id', array('id' => 'id')); ?>
                <?php echo $this->Form->hidden('target', array('id' => 'target')); ?>
                <div class="overlay" style="display:none;"><i class="fa fa-refresh fa-spin"></i></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" id="btn_yes">Yes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_restore" tabindex="-1" data-backdrop="static" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Restore Product</h4>
            </div>
            <div class="modal-body box">
                <p>Are you sure?</p>
                <?php echo $this->Form->hidden('id', array('id' => 'id')); ?>
                <div class="overlay" style="display:none;"><i class="fa fa-refresh fa-spin"></i></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" id="btn_yes_restore">Yes</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(e) {
        $('body').on('click', '#btn_delete, #btn_delete_db', function(e) {
            $('#modal_msg').find('#id').val($(this).closest('tr').data('id'));
            $('#modal_msg').find('#target').val($(this).closest('tr').data('target'));
            $('#modal_msg').modal('show');
        });

        $('#modal_msg, #modal_restore').on('hidden.bs.modal', function (e) {
            $('#modal_msg').find('#id').val('');
            $('#modal_msg').find('#target').val('');
        });

        $('body').on('click', '#btn_yes', function(e) {
            $('.overlay').show();
            var params = {
                id: $('#modal_msg').find('#id').val(),
                target: $('#modal_msg').find('#target').val(),
                _csrfToken: '<?php echo $this->request->getParam('_csrfToken'); ?>',
            };
            $.post('<?php echo $this->Url->build('/admin/products/delete'); ?>', params, function(data) {
                $('.overlay').hide();
                location.reload();
            }, 'json');
        });

        $('body').on('click', '#btn_restore', function(e) {
            $('#modal_restore').find('#id').val($(this).closest('tr').data('id'));
            $('#modal_restore').modal('show');
        });

        $('body').on('click', '#btn_yes_restore', function(e) {
            $('.overlay').show();
            var params = {
                id: $('#modal_restore').find('#id').val(),
                _csrfToken: '<?php echo $this->request->getParam('_csrfToken'); ?>'
            };

            $.post('<?php echo $this->Url->build('/admin/products/restore/'); ?>', params, function(data) {
                $('.overlay').hide();
                location.reload();
            });
        });
    });
</script>