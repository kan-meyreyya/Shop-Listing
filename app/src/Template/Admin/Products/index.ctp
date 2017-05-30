
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
                                <th><?php echo $this->Paginator->sort('created'); ?></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($product) : foreach ($product as $item) : ;?>
                                <tr>
                                    <td><?php echo h($item->name) ?></td>
                                    <td><?php echo h($item->price); ?></td>
                                    <td><?php echo h($item->description); ?></td>
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