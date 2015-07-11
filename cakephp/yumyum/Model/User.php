<?php
/**
 * Created by PhpStorm.
 * User: azegami
 * Date: 7/4/15
 * Time: 19:41
 */
App::uses('AppModel', 'Model');

class User extends AppModel {

    public $name = 'User';
    public $useTable = 'gmo_user_tb';
    public $primaryKey = 'gmo_id';

}