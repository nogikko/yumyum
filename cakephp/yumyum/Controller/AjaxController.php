<?php
/**
 * Created by PhpStorm.
 * User: azegami
 * Date: 6/24/15
 * Time: 00:20
 */

App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class AjaxController extends AppController {
    public function search() {
        $this->autoRender = false;

        if(!$this->request->is('ajax')) {
            throw new BadRequestException();
        }

        $this->loadModel('Restaurant');


        $search = array();
        $distance = $this->request->query['distance'];
        $category = $this->request->query['genre'];
        $minPrice = $this->request->query['min'];
        $maxPrice = $this->request->query['max'];

        //距離(時間)検索追加
        if($distance != 9999){
            $this->log('distance ' .$distance);
            $search = array_merge($search, array('distance BETWEEN 0 AND ? ' => array($distance)));
        }

        //カテゴリ検索追加
        if($category != 9999){
            $this->log('category ' .$category);
            $search = array_merge($search, array('category = ? ' => array($category)));
        }

        //価格検索追加
        $search = array_merge($search, array('money BETWEEN ? AND ? ' => array($minPrice, $maxPrice)));
        $this->log($minPrice);
        $this->log($maxPrice);



        $params = array('conditions' => $search);
        $result =$this->Restaurant->find('all', $params);

        //$result = $this->Restaurant->find('all');


        $status = !empty($result);
        if(!$status) {
            $error = array(
                'message' => 'データがありません',
                'code' => 404
            );
        }

        // JSON形式で返却。errorが定義されていない場合はstatusとresultの配列になる。
        return json_encode(compact('status', 'result', 'error'));

        // return $this->params['url']['checkbox1'];
    }

    public function checkfav() {
        $this->autoRender = false;
        $this->loadModel('Favorite');
        $data = array('Favorite' => array('gmo_id' => $this->Auth->user('gmo_id'), 'restaurant_id' => $this->data['restaurant_id']));
       //$this->log("aaaaa". $this->data['restaurant_id']);
        if ($this->Favorite->save($data)) {
            echo "成功";
        }else{
            echo "失敗";
        }

    }

    public function deletefav() {
        $this->autoRender = false;
        $this->loadModel('Favorite');
        $conditions = array('gmo_id' => $this->Auth->user('gmo_id'),'restaurant_id ' => $this->data['restaurant_id']);
        $this->Favorite->deleteAll($conditions);
        //$data = array('Favorite' => array('gmo_id' => $this->Auth->user('gmo_id'), 'restaurant_id' => $this->data['restaurant_id']));
        $this->log("aaaaa". $this->data['restaurant_id']);
        echo "ssss";
    }


}
