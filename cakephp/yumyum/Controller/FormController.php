<?php
/**
 * Created by PhpStorm.
 * User: azegami
 * Date: 7/8/15
 * Time: 01:10
 */

App::uses('AppController', 'Controller');

class FormController extends AppController{

    public $uses = array('Restaurant');
    public $helpers = array('Form', 'UploadPack.Upload');

    function index() {
        //$this->autoRender = false;
        $this->autoLayout = false;
    }

    function add() {
        $this->autoLayout = false;
        $this->autoRender = false;
        $this->log($this->data);
        $this->log($_POST);
        if (!empty($this->data)) {
            $this->log($this->data);
            $this->Restaurant->create($this->data);
            if ($this->Restaurant->save($this->data)) {

                $this->redirect('/top/');
                //  $this->redirect('/users/show/'.$this->User->id);
            }else{
                $this->log("not save");
            }
        }

       /* function show($id) {
            // $this->set('user', $this->User->findById($id));
        }*/
    }

}
