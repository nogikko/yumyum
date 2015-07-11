<?php
/**
 * Created by PhpStorm.
 * User: azegami
 * Date: 6/21/15
 * Time: 23:19
 */
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class DetailController extends AppController {

    public function index() {
       // $this->autoRender = false;
        $this->autoLayout = false;
        $id = $this->request->query['id'];
        $this->log('id: '.$this->request->query['id']);
        $this->loadModel('Restaurant');

        $params = array('conditions' => array ('restaurant_id' => $id));
        $data = $this->Restaurant->find('first',$params);
       // print_r($data);
        $this->set("data", $data);

    }

}
