<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Category extends Entity
{
    protected $_accessible = array(
        '*' => true,
        'id' => false,
    );

    protected function _setName($name)
    {
        return $name;
    }

    protected function _setProductId($product_id)
    {
        return $product_id;
    }

    protected function _setIsDeleted($is_deleted)
    {
        return $is_deleted;
    }
}