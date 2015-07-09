<?php
/**
 * Created by PhpStorm.
 * User: azegami
 * Date: 6/21/15
 * Time: 23:19
 */
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class TopController extends AppController {

    public function index() {
        $this->autoLayout = false;
        // $this->modelClass = null;
        $this->loadModel('Restaurant');
        $datas = $this->Restaurant->find('all');
        $this->set("datas", $datas);
    }

    public $name = "Top";
    public $components = array(
        'Session');

   public function login(){
       $this->autoRender = false;
      // debug($this->Auth->login($this->data));
       print_r($this->request->data);


       if ($this->Auth->login()) {

            $this->redirect($this->Auth->redirectUrl());

        } else {

            //$this->Session->setFlash(__('Invalid username or password, try again'));
            echo "bbb";
        }

   }

    public function logout(){
        $this->Auth->logout();
        $this->Session->destroy(); //セッションを完全削除
        $this->Session->setFlash(__('ログアウトしました'));
        $this->redirect(array('action' => 'test'));
    }

    public function test(){
        $user = $this->Auth->user();

        if(is_null($user)){
            //ログインしていない場合
            $this->set('data','ログインなし');
        }else{
            //ログインしている場合
            $this->set('data','ログインあり');
        }
    }

    public function mypage(){

    }




}
