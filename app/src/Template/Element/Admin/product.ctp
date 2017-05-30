
<?php
    $templates = array(
        'inputContainer' => '{{content}}',
        'inputContainerError' => '<div class="has-error">{{content}}<label class="control-label" for="inputError">{{error}}</label></div>',
    );
?>
<section class="content-header">
    <h1><?php echo ($this->request->action === 'add') ? 'Add New Product' : 'Edit Product'; ?></h1>
    <ol class="breadcrumb">
        <li>
            <?php
                echo $this->Html->link(
                    '<i class="fa fa-dashboard"></i> Home', array(
                        'controller' => 'homes',
                        'action' => 'index',
                    ), array(
                        'escape' => false,
                    )
                );
            ?>
        </li>
        <li>Product</li>
        <li class="active"><?php echo ($this->request->action === 'add') ? 'Create' : 'Edit'; ?></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Flash->render(); ?>
            <div class="box box-primary">
                <?php
                    echo $this->Form->create(isset($product) ? $product : '', array(
                        'role' => 'form',
                        'autocomplete' => 'off',
                    ));
                ?>
                <div class="box-body col-md-6">
                    <div class="form-group">
                        <label>Product Name</label>
                        <?php
                            echo $this->Form->input('name', array(
                                'placeholder' => 'Product Name',
                                'class' => 'form-control',
                                'label' => false,
                                'templates' => $templates,
                            ));
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <?php
                            echo $this->Form->input('description', array(
                                'placeholder' => 'Product Description',
                                'type' => 'textarea',
                                'class' => 'form-control',
                                'label' => false,
                                'templates' => $templates,
                            ));
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                         <?php
                            echo $this->Form->input('price', array(
                                'placeholder' => 'Price',
                                'type' => 'number',
                                'class' => 'form-control',
                                'label' => false,
                                'templates' => $templates,
                            ));
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                         <?php
                            echo $this->Form->input('category_id', array(
                                'type' => 'select',
                                'class' => 'form-control',
                                'label' => false,
                                'templates' => $templates,
                                'options' => array()
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
