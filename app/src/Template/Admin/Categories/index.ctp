
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
                            echo $this->Form->input(
                                '<i class="fa fa-plus" aria-hidden="true"></i> Add Category', array(
                                'class' => 'btn btn-default btn_modal',
                                'escape' => false,
                                'type' => 'button',
                                'label' => false,
                                'data-target' => 'new',
                            ));
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
                                    'placeholder' => 'category name',
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
                                <th>Count Child</th>
                                <th><?php echo $this->Paginator->sort('created'); ?></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($category) : foreach ($category as $item) : ;?>
                                <tr data-name="<?php echo h($item->name); ?>" data-id="<?php echo $item->id; ?>">
                                    <td>
                                        <?php echo h($item->name); ?>
                                    </td>
                                    <td>
                                        <?php echo h($item->count_node); ?>
                                    </td>
                                    <td><?php echo date('d-m-Y', strtotime($item['created'])); ?></td>
                                    <td>
                                        <?php
                                            echo $this->Form->button('<i class="fa fa-pencil" aria-hidden="true"></i> Edit', array(
                                                'class' => 'btn btn-sm btn-primary',
                                                'id' => 'btn_edit',
                                                'data-id' => h($item->id),
                                                'data-id' => $item->id,
                                                'escape' => false,
                                            ));
                                        ?>
                                        <?php
                                            echo $this->Form->button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                'class' => 'btn btn-danger btn-sm',
                                                'id' => 'btn_delete',
                                                'escape' => false,
                                            ));
                                        ?>
                                        <?php
                                            echo $this->Form->button('<i class="fa fa-eye" aria-hidden="true"></i> Preview', array(
                                                'class' => 'btn btn-warning btn-sm',
                                                'data-id' => h($item->id),
                                                'id' => 'btn_preview',
                                                'escape' => false,
                                            ));
                                        ?>
                                        <?php
                                            echo $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Add Sub Category', array(
                                                    'controller' => 'categories',
                                                    'action' => 'add_sub_category',
                                                    '?' => array(
                                                        'parent_id' => h($item->id)
                                                    )
                                                ),
                                                array(
                                                    'class' => 'btn btn-default btn-sm',
                                                    'escape' => false,
                                                )
                                            );
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
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" data-backdrop='static'>
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body box">
                <?php
                    echo $this->Form->create('category', array(
                        'role' => 'form',
                        'id' => 'form_category',
                        'autocomplet' => 'off',
                    ));
                ?>
                <div class="form-group">
                    <label>Category Name</label>
                    <?php
                        echo $this->Form->input('name', array(
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => 'Please Enter Category Name',
                            'templates' => array(
                                'inputContainer' => '<div id="errorMsg">{{content}}</div>'
                            )
                        ));
                    ?>
                </div>
                <?php
                    echo $this->Form->hidden('target', array(
                        'id' => 'target',
                        'value' => '',
                    ));
                ?>
                <?php
                    echo $this->Form->hidden('id', array(
                        'id' => 'category_id',
                    ));
                ?>
                <?php echo $this->Form->end(); ?>
                <div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <?php
                    echo $this->Form->button('Save', array(
                        'class' => 'btn btn-primary',
                        'id' => 'btn_save',
                    ));
                ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="modalDelete" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Category</h4>
            </div>
            <div class="modal-body">
                <p>
                    Do you want to delete this category?<br>
                    If you delete all nodes will be delete too.
                </p>
                <?php
                    echo $this->Form->hidden('id', array(
                        'id' => 'id',
                        'value' => '0',
                    ));
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary delete_confirm_yes">Yes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="modalPreview" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(e) {
        $('body').on('click', '.btn_modal', function(e) {
            var title = '';
            var modal = $('body').find('#modal_add');

            $(modal).find('.modal-title').append('Create New Category');
            $(modal).find('#name').val('');
            $(modal).find('#target').val('new');
            $('#modal_add').modal('show');
        });

        $('body').on('click', '#btn_save', function(e) {
            $('.overlay').show();
            $('#errorMsg').find('label').remove();
            $('#errorMsg').removeClass('has-error');

            var params = {
                name: $('#name').val(),
                id: $('#category_id').val(),
                target: $('#modal_add').find('#target').val(),
                url: '<?php echo $this->Url->build('/admin/categories/add'); ?>',
                _csrfToken: '<?php echo $this->request->getParam('_csrfToken'); ?>'
            };

            if (params.target === 'edit') {
                params.url = '<?php echo $this->Url->build('/admin/categories/edit'); ?>';
            }

            $.post(params.url, params, function(data) {
                $('.overlay').hide();
                label = '<label class="control-label"><div class="error-message">' + data.message + '</div></label>';
                if (data.status === 'error') {
                    $('#errorMsg').addClass('has-error');
                    $('#errorMsg').append(label);
                } else {
                    window.location.href = '<?php echo $this->Url->build('/admin/categories'); ?>';
                }
            }, 'json');
        });

        $('body').on('click', '#btn_edit', function(e) {
            var params = {
                name: $(this).closest('tr').data('name'),
                id: $(this).closest('tr').data('id')
            };

            $('#modal_add').find('.modal-title').html('Update Category');
            $('#modal_add').find('#name').val(params.name);
            $('#modal_add').find('#category_id').val(params.id);
            $('#modal_add').find('#target').val('edit');
            $('#modal_add').modal('show');
        });

        $('body').on('click', '#btn_delete', function(e) {
            var modal = $('#modalDelete');
            $(modal).find('#id').val($(this).closest('tr').data('id'));
            $(modal).modal('show');
        });

        $('body').on('click', '#btn_preview', function(e) {
            var params = {
                id: $(this).closest('tr').data('id'),
                url: '<?php echo $this->Url->build('/admin/categories/get_sub_category'); ?>',
            };
            $.get(params.url, params, function(data) {
                console.log(data);
                $('#modalPreview .modal-body').html(data);
                $('#modalPreview .modal-title').append('Preview Sub Category');
                $('#modalPreview').modal('show');
            }, 'html');
        });

        $('body').on('click', '.delete_confirm_yes', function(e) {
            $('.overlay').show();
            var param = {
                id: $('#modalDelete').find('#id').val(),
                _csrfToken: '<?php echo $this->request->getParam('_csrfToken'); ?>'
            };

            $.post('<?php echo $this->Url->build('/admin/categories/delete/'); ?>', param, function(data) {
                $('.overlay').hide();
                window.location.href = '<?php echo $this->Url->build('/admin/categories/'); ?>';
            });
        });

        $('#modal_add, #modalPreview').on('hidden.bs.modal', function (e) {
            $(this).find('.modal-title').html('');
            $('#errorMsg, #select_cat').find('label').remove();
            $('#errorMsg, #select_cat').removeClass('has-error');
        });
    });
</script>