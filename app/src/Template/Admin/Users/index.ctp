
<?php //echo '<pre>'.print_r($user, true).'</pre>'; ?>
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
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Create Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($user) : foreach ($user as $item) : ;?>
                                <tr>
                                    <td><?php echo $item['User']['username']; ?></td>
                                </tr>
                            <?php endforeach; endif; ?>
                        </tbody>
                    </tbody></table>
                </div>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
