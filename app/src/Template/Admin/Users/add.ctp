
<<<<<<< HEAD
=======
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
>>>>>>> 5fed43cc633f3e7f8f483769591f73b8f030cf54
<?php echo $this->element('Admin/user'); ?>
