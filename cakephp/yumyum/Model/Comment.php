<?php
/**
 * Created by PhpStorm.
 * User: azegami
 * Date: 7/11/15
 * Time: 23:03
 */

App::uses('AppModel', 'Model');

class Comment  extends AppModel {
    public $useTable = 'comment_tb';

    public $belongsTo = array(
        'User'=>array(
            'table' => 'gmo_user__tb',
            'className' => 'User',
            'foreignKey'=> 'gmo_id',
            'alias' => 'User',
            'type'=>'Inner',
            'fields' => array('User.gmo_id', 'User.name'),
            'dependent'=> true
        )
    );
}