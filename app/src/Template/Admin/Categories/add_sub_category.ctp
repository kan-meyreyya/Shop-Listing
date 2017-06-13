
<style>
    .wrapper-box {
        width: 50%;
    }
    .txt-n-s {
        display: inline-block;
        width: 70%;
    }
</style>

<section class="content-header">
    <h1>Add Sub Category</h1>
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
        <li>Category</li>
        <li class="active">Sub Category</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="wrapper-box">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <?php
                            echo $this->Form->button('<i class="fa fa-plus"></i> Add item', array(
                                'class' => 'btn btn-default',
                                'id' => 'btn_add',
                                'escape' => false,
                            ));
                        ?>
                    </div>
                    <div class="box-body">
                        <ul class="todo-list ui-sortable">
                            <?php if ($node) : foreach ($node as $item) : ;?>
                                <li data-id="<?php echo $item->id; ?>">
                                    <span class="handle ui-sortable-handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <span class="text"><?php echo h($item->name); ?></span>
                                    <div class="tools">
                                        <i class="fa fa-edit edit-icon" data-target="false"></i>
                                        <i class="fa fa-trash-o delete-icon"></i>
                                    </div>
                                </li>
                            <?php endforeach; endif; ?>
                        </ul>
                    </div>
                    <div class="box-footer">
                        <?php
                            echo $this->Form->button('Save', array(
                                'class' => 'btn btn-primary pull-right',
                                'id' => 'btn_save',
                            ));
                        ?>
                    </div>
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
            <div class="modal-body">
                <p>Do you want to delete?</p>
                <?php
                    echo $this->form->hidden('id', array(
                        'id' => 'id',
                    ));
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary btn-yes">Yes</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(e) {
        $('body').on('click', '#btn_add', function(e) {
            var content = $('body').find('.box-body .todo-list');
            var li  = '<li data-id=""><span class="handle ui-sortable-handle">' +
                      '<i class="fa fa-ellipsis-v" style="padding-right:3px"></i><i class="fa fa-ellipsis-v"></i>' +
                      '</span><input type="textbox" name="txt_category" class="form-control txt-n-s"/><span class="text-error"></span>' +
                      '<div class="tools">' +
                      '<i class="fa fa-trash-o delete-icon"></i></div></li>';
            $(content).append(li);
        });

        $('body').on('click', '.edit-icon', function(e) {
            var params = {
                target: $(this).attr('data-target'),
                li: $(this).closest('li'),
                text_box: '<input type="textbox" name="txt_category" value="' + $(this).closest('li').find('.text').text() + '" class="form-control"/>'
            };
            if (params.target === 'false') {
                $(params.li).append(params.text_box);
                $(this).attr('data-target', 'true');
            }
            $(params.li).find('.text').addClass('sp-edit');
        });

        $('body').on('click', '.btn-yes', function(e) {
            var params = {
                id: $('#modal_delete').find('#id').val(),
                _csrfToken: '<?php echo $this->request->getParam('_csrfToken'); ?>'
            };
            $.post('<?php echo $this->Url->build('/admin/categories/delete_node'); ?>', params, function(data) {
                location.reload();
            }, 'json');
        });

        $('body').on('click', '.delete-icon', function(e) {
            var params = {
                id: $(this).closest('li').data('id'),
                _csrfToken: '<?php echo $this->request->getParam('_csrfToken'); ?>'
            };
            if (params.id === '') {
                $(this).closest('li').remove();
            } else {
                $('#modal_delete').find('#id').val(params.id);
                $('#modal_delete').modal('show');
            }
        });

        $('body').on('click','#btn_save', function(e) {
            var data = new Array();
            var li = $('body').find('.todo-list li');
            var _csrfToken = '<?php echo $this->request->getParam('_csrfToken'); ?>';
            var url = window.location.href;
            var hash = url.split('?')[1];
            var parent_id = hash.split('=')[1];

            if (li.length == 0) {
                alert('Please add new item!');
            } else {
                var text_length = $(li).find('input[name="txt_category"]');
                $.each(text_length, function(i, v) {
                    if ($(this).val() == '') {
                        $(this).closest('li').find('.text-error').addClass('text-red').html('').append('* not be blank!');
                    } else {
                        $(this).closest('li').find('.text-error').removeClass('text-red').html('');
                        var arr = {
                            id: $(this).closest('li').attr('data-id'),
                            name: $(this).val()
                        };
                        data.push(arr);
                    }
                });

                if (text_length.length == 0) {
                    alert('please edit or add new item!');
                } else if (text_length.length == data.length) {
                    $.post('<?php echo $this->Url->build('/admin/categories/add_sub_category'); ?>', {'data': data, '_csrfToken': _csrfToken, 'parent_id': parent_id}, function(data) {
                        location.reload();
                    }, 'json');
                }
            }
        });
    });
</script>