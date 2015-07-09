<?php
/**
 * Created by PhpStorm.
 * User: azegami
 * Date: 6/21/15
 * Time: 23:19
 */
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class EditionController extends AppController {

    public function index() {
        $this->autoLayout = false;
    }

 public function edition() {
        $this->autoLayout = false;
    }

}
