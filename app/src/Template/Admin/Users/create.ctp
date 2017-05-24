
<section class="content-header">
    <h1><?php echo ($this->request->action === 'create') ? 'Add New User' : 'Edit User'; ?></h1>
    <ol class="breadcrumb">
        <li>
            <?php
                echo $this->Html->link('<i class="fa fa-dashboard"></i> Home', 'admin/homes', array(
                    'escape' => false,
                ));
            ?>
        </li>
        <li>User</li>
        <li class="active"><?php echo ($this->request->action === 'create') ? 'Create' : 'Edit'; ?></li>
    </ol>
</section>
<?php echo $this->element('Admin/user'); ?>
