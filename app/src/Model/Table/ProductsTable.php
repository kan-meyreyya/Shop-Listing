<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProductsTable extends Table
{
    public function initialize(array $config) {
        parent::initialize($config);
        $this->table('products');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');

        $this->belongsTo('Users')
            ->setForeignKey('user_id')
            ->setJoinType('INNER');

        $this->belongsTo('Categories')
            ->setForeignKey('category_id')
            ->setJoinType('INNER');

        $this->hasMany('Medias')
            ->setForeignKey('product_id')
            ->setDependent(true);
    }

    public function validationCreate(Validator $validator)
    {
        $validator
            ->requirePresence('name')
            ->notEmpty('name', 'please enter product name!');

        $validator
            ->requirePresence('description')
            ->notEmpty('description', 'please enter product descrition!');

        $validator
            ->requirePresence('price')
            ->notEmpty('price', 'please enter product price!')
            ->add('price', array(
                'money' => array(
                    'rule' => array('money', 'left'),
                    'message' => 'please input price for product!',
                )
            ));

        return $validator;
    }

    public function renameFile($name)
    {
        $exp = array();
        $exp = explode('.', $name);
        $file_name = date('YmdHis') . '.' .$exp[1];
        
        return $file_name;
    }

    public function uploadFile($file_tmp, $path, $name)
    {
        move_uploaded_file($file_tmp, WWW_ROOT . 'img/uploads/' . $path . '/' . $name);
    }
}