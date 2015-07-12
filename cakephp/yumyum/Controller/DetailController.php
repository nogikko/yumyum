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
        $this->loadModel('Comment');
        $this->loadModel('Favorite');


        $data = $this->Restaurant->find('first', array('conditions' => array ('restaurant_id' => $id)));



        $comments = $this->Comment->find('all',array('conditions' => array ('restaurant_id' => $id),
            'order' => array('Comment.created desc')));

        $isFav = $this->Favorite->find('first',array('conditions' => array ('restaurant_id' => $id,'gmo_id' => $this->Auth->user('gmo_id'))));

        if($isFav){
          //  $this->log('isFav: '.$isFav);
            $this->set("isFav", true);
        }else{
          //  $this->log('なし');
            $this->set("isFav", false);
        }

        //print_r($data2);

        $this->set("data", $data);
        $this->set("comments", $comments);

    }

}
