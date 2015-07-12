<?php
/**
 * Created by PhpStorm.
 * User: azegami
 * Date: 7/7/15
 * Time: 14:14
 */
App::uses('AppController', 'Controller');

class MypageController extends AppController{

    function index() {
        //$this->autoRender = false;
        $this->autoLayout = false;
        // $this->modelClass = null;
        $this->loadModel('Favorite');
        $this->loadModel('Ever');
        $this->loadModel('Restaurant');


        $user_number = 528;

        //最近いった店検索
        $options = array(
            'fields' => '*',
            'joins' => array(
                array(
                    'table' => 'restaurant_tb',
                    'alias' => 'Restaurant',
                    'type' => 'Inner',
                    'conditions' => array(
                        'Ever.restaurant_id = Restaurant.restaurant_id',
                        'gmo_id = ? ' =>   $user_number
                    )),
            ),
        );



        //お気に入り検索
        $options2 = array(
            'fields' => '*',
            'joins' => array(
            array(
               'table' => 'restaurant_tb',
               'alias' => 'Restaurant',
               'type' => 'Inner',
               'conditions' => array(
               'Favorite.restaurant_id = Restaurant.restaurant_id',
                   'gmo_id = ? ' =>   $user_number
           )),
         ),
        );

        $result = $this->Ever->find('all', $options);
        $result2 = $this->Favorite->find('all', $options2);

        //print_r($result);
        $this->set("everdatas", $result);
        $this->set("favdatas", $result2);


    }

}