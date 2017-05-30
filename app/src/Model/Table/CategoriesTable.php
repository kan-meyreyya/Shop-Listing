<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CategoriesTable extends Table
{
    public function initialize(array $config) {
        parent::initialize($config);
        $this->table('categories');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');

        $this->belongsTo('Users')
            ->setForeignKey('user_id')
            ->setJoinType('INNER');
    }
}