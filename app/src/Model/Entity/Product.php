<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Product extends Entity
{
    protected $_accessible = array(
        '*' => true,
        'id' => false,
    );

    protected function _setName($name)
    {
        return $name;
    }

    protected function _setDescription($description)
    {
        return $description;
    }

    protected function _setPrice($price)
    {
        return $price;
    }

    protected function _setUserId($user_id)
    {
        return $user_id;
    }

    protected function _setCategoryId($category_id)
    {
        return $category_id;
    }
}
