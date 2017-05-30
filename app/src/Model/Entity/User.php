<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{
    protected $_accessible = array(
        '*' => true,
        'id' => false,
    );

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }

    protected function _setUsername($username)
    {
        return $username;
    }

    protected function _setEmail($email)
    {
        return $email;
    }

    protected function _setPhone($phone)
    {
        return $phone;
    }
}
