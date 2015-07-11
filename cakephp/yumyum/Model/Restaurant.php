<?php
/**
 * Created by PhpStorm.
 * User: azegami
 * Date: 6/22/15
 * Time: 23:07
 */
App::uses('AppModel', 'Model');

class Restaurant extends AppModel {
    //public $name = "LunchData";

    public $useTable = 'restaurant_tb';

    //var $name = 'Restaurant';
    var $actsAs = array(
        'UploadPack.Upload' => array(
            'image' => array(
                'styles' => array(
                    'thumb' => '80x80'
                ),
                "path" => ":webroot/upload/images/:id/:basename.:extension"
            )
        )
    );
}
