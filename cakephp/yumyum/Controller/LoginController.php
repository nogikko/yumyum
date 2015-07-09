<?php
/**
 * Created by PhpStorm.
 * User: azegami
 * Date: 6/21/15
 * Time: 23:19
 */
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class LoginController extends AppController {

    public function index() {
        $this->autoLayout = false;
    }

    public $components = array('Session');
    public function login(){
       $this->autoRender = false;
       // debug($this->Auth->login($this->data));
       print_r($this->request->data);


       if ($this->Auth->login()) {

            $this->redirect($this->Auth->redirectUrl());

        } else {
	    $this->redirect(array('action' => 'index'));
            //$this->Session->setFlash(__('Invalid username or password, try again'));
           // echo "loginできない";
        }

   }

    public function logout(){
        $this->Auth->logout();
        $this->Session->destroy(); //セッションを完全削除
        $this->Session->setFlash(__('ログアウトしました'));
        $this->redirect(array('controller' => 'top', 'action' => 'index'));
    }

}
