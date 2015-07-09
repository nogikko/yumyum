<?php
/**
 * Created by PhpStorm.
 * User: azegami
 * Date: 7/7/15
 * Time: 15:13
 */

App::uses('AppModel', 'Model');

class Favorite  extends AppModel {
    public $useTable = 'favorite_tb';
}