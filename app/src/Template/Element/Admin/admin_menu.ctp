
<?php
    $session = $this->request->session();
    $role = $session->read('Auth.User.role');
    $controller = $this->request->controller;
    $arr = array(
        'Users',
        'Products',
        'Categories',
        'Homes',
    );
    $active = in_array($controller, $arr) ? 'active' : '';
?>

<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="<?php if($controller === 'Homes') echo $active; ?>">
                <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fa fa-dashboard')) . $this->Html->tag('span', 'Dashboard'),
                            'homes', array('escape' => false)
                    );
                ?>
            </li>
            <li class="<?php if($controller === 'Users') echo $active; ?>">
                <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fa fa-users')) . $this->Html->tag('span', 'Users'), array(
                            'controller' => 'users',
                            'action' => 'index'
                        ), array(
                            'escape' => false
                        )
                    );
                ?>
            </li>
            <li class="<?php if($controller === 'Products') echo $active; ?>">
                <?php
                    echo $this->Html->link('<i class="fa fa-thumb-tack" aria-hidden="true"></i> Product',
                        array(
                            'controller' => 'products',
                            'action' => 'index',
                        ), array(
                            'escape' => false,
                        )
                    );
                ?>
            </li>
            <li class="<?php if($controller === 'Categories') echo $active; ?>">
                <?php
                    echo $this->Html->link('<i class="fa fa-tags" aria-hidden="true"></i> Category',
                        array(
                            'controller' => 'categories',
                            'action' => 'index',
                        ), array(
                            'escape' => false,
                        )
                    );
                ?>
            </li>
        </ul>
    </section>
</aside>
