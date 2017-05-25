<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('users');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
    }

    public function validationCreate(Validator $validator) {
        $validator
            ->requirePresence('username')
            ->notEmpty('username', 'Please input username!');

        $validator
            ->requirePresence('email')
            ->notEmpty('email', 'Please input email!');

        $validator
            ->requirePresence('phone')
            ->notEmpty('phone', 'Please input phone number!');

        $validator
            ->requirePresence('password')
            ->notEmpty('password', 'Please input password!')
            ->add('password', array(
                'match' => array(
                    'rule' => array('compareWith', 'confirm_pwd'),
                    'message' => 'Your password is not match with comfirm field!',
                )
            ))
            ->add('password', array(
                'length' => array(
                    'rule' => array('minLength', 6),
                    'message' => 'Your password at lease 6 characters!',
                )
            ));

        $validator
            ->requirePresence('confirm_pwd')
            ->notEmpty('confirm_pwd', 'Please input your password agian!')
            ->add('confirm_pwd', array(
                'match' => array(
                    'rule' => array('compareWith', 'password'),
                    'message' => 'Your password is not match with password field!',
                )
            ))
            ->add('confirm_pwd', array(
                'length' => array(
                    'rule' => array('minLength', 6),
                    'message' => 'Your password at lease 6 characters!',
                )
            ));

        return $validator;
    }
}