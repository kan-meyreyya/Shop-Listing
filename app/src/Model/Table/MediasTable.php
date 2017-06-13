<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class MediasTable extends Table
{
    public function initialize(array $config) {
        parent::initialize($config);
        $this->table('medias');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');

        $this->belongsTo('Products')
            ->setForeignKey('product_id')
            ->setJoinType('INNER');

        $this->belongsTo('Users')
            ->setForeignKey('user_id')
            ->setJoinType('INNER');
    }
}