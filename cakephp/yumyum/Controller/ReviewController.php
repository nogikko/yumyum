<?php
/**
 * Created by PhpStorm.
 * User: azegami
 * Date: 6/21/15
 * Time: 23:19
 */
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class ReviewController extends AppController {

    public function index() {
        $this->autoLayout = false;
        $restaurant_id = $this->request->query['id'];
        $this->set('restaurant_id',$restaurant_id);
    }

    public function add() {
        $this->loadModel('Comment');
        $this->autoRender = false;
        $this->autoLayout = false;
        $this->request->data['Comment'] += array('gmo_id' => $this->Auth->user('gmo_id'));


        //var_dump($this->request->data);
        //var_dump($this->Auth->user('gmo_id'));

        if ($this->Comment->save($this->request->data)) {
            // メッセージをセットしてリダイレクトする
            //$this->Session->setFlash('Recipe Saved!');
            //return $this->redirect('/recipes');
            var_dump("成功");
        }
    }

}
