<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Language" content="ja">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no">
    <meta name="copyright" content="(C) GTB Inc. All Rights Reserved." />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>Yum Yum | byGMO</title>
    <link href='http://fonts.googleapis.com/css?family=Amatic+SC' rel='stylesheet' type='text/css'>
    <?php echo $this->Html->css('style.css'); ?>
    <?php echo $this->Html->css('animate.css'); ?>
    <?php echo $this->Html->css('hover.css'); ?>
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <?php echo $this->Html->script('index.js'); ?>

    <script>
        var map;
        var gmoLatlng= new google.maps.LatLng(35.65645560000001, 139.6994178); //セルリワンタワー
        var marker_list = new google.maps.MVCArray();

        var directionsService =  new google.maps.DirectionsService() ;
        var directionsDisplay = new google.maps.DirectionsRenderer();

        function initialize() {
            var opts = {
                zoom: 17,
                center: gmoLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("map_canvas"), opts);


            var mopts = {
                positon: gmoLatlng,
                map: map,
                icon: {
                    url: "/img/gmo_icon.jpg",
                    scaledSize: new google.maps.Size(500 / 12, 500 / 12)
                }
            };


            var marker = new google.maps.Marker(mopts);
            marker.setPosition(gmoLatlng);
            marker.setMap(map);

            //directionsDisplay.setMap(map);

            <?php foreach($datas as $data):?>
            marker = addMarker(<?php echo $data['Restaurant']['lat']?>,<?php echo $data['Restaurant']['lng']?>);
            setInfoWindow(marker,"<?=$data['Restaurant']['name']?>");
            <?php endforeach;?>


        }

        function addMarker(lat,lng) {
            var position = new google.maps.LatLng(lat, lng);
            var marker = new google.maps.Marker({
                position: position,
                map: map,
                draggable: false,
                animation: google.maps.Animation.DROP,
                icon: {
                    url: "/img/pin_icon.png"
                    //scaledSize: new google.maps.Size(500 , 500 )
                }
            });
            marker_list.push(marker);

            return marker;

        }

        function setInfoWindow(marker, message){
            var isInfoWindowFlg = false; //吹き出しがあるかないか
            google.maps.event.addListener(marker, 'click', function(event){

                if(!isInfoWindowFlg) {
                    var infoWindow = new google.maps.InfoWindow({
                        content: '<a href="">'+message+'</a>'
                    })

                    infoWindow.open(map,marker);
                    isInfoWindowFlg = true;
                }

                google.maps.event.addListener(infoWindow, 'closeclick', function(){
                    //閉じた場合の処理を記載
                    isInfoWindowFlg = false;
                });
            });

        }

        function removeMarker(){
            marker_list.forEach(function(marker, idx) {
                marker.setMap(null);
            });
        }

        function searchAjax() {

            var params = $('#search').serialize();
            alert(params);
            $.ajax({
                type:  "get",
                url:   "/ajax/search/",
                data:  params,
                dataType : 'json',
                success: function(json) {
                    removeMarker();
                    // alert(JSON.stringify(json));
                    // alert(JSON.stringify(json.result));
                    var content ='';
                    for(var index in json.result){
                        var restaurant = json.result[index].Restaurant;
                        var marker = addMarker(restaurant.lat,restaurant.lng);
                        setInfoWindow(marker,restaurant.name);

                        content += '<div class="shop_list--block__content">' +
                            '<a href="#"><img src="'+restaurant.main_image+'" alt="肉割烹 将泰庵[和牛炙り鉄火丼]" />' +
                            '<ul>'+
                            '<li>店名：'+restaurant.name+'</li>'+
                            '<li>住所：'+restaurant.address +'</li>'+
                            '<li>セルリアンからの距離：徒歩'+restaurant.distance+'分程度</li>'+
                            '<li>営業時間(ランチ)：11:00~15:00</li>'+
                            '<li>座席数：全50席（ランチタイム全席禁煙）</li>'+
                            '<li>平均ランチ価格：¥'+restaurant.money+'</li>'+
                            '<li>おすすめメニュー：和牛炙り鉄火丼</li>'+
                            '</ul>'+
                            '<i class="fa fa-angle-right fa-5x"></i>'+
                            '</a>'+
                            '</div>'

                    }

                    $(function(){
                        $('.shop_list--block div').remove( '.shop_list--block__content' );
                        $(content).insertAfter('.shop_list--block div');
                    });

                },
                error: function(e) {
                    alert('通信失敗'+e);
                }
            });
        }

    </script>
</head>
<body onload="initialize()">
<div id="fade">
    <div class="logo_area">
        <img class="animated swing" src="/img/logo.png" alt="" />
        <h2>Yum Yum</h2>
    </div>
</div>

<header>
    <h1><a href="index.html">Yum Yum<img src="/img/logo.png" alt="" /></a></h1>

    <div class="main_menu">
        <ul>
            <li><a class="hvr-fade" href="#"><i class="fa fa-bookmark-o"></i>特集</a></li>
            <li>/</li>
            <li><a class="hvr-fade" href="#"><i class="fa fa-pencil-square-o"></i>投稿</a></li>
            <li>/</li>
            <li><a class="hvr-fade" href="#"><i class="fa fa-power-off"></i>ログイン</a></li>
        </ul>
    </div>
</header>

<div class="main_contener">
    <div class="sub_manu">
        <form id="search" method="get" >
            <h3><i class="fa fa-search"></i>お店を探す</h3>
            <ul class="sub_manu--list">
                <li>
                    <span>お店までの距離（時間）</span><br>
                    <div class="select_area">
                        <select name="distance" class="distance">
                            <option value="9999">指定なし</option>
                            <option value="5">5分</option>
                            <option value="10">10分</option>
                            <option value="15">15分</option>
                        </select>
                    </div>
                </li>

                <li>
                    <span>料理のジャンル</span><br>
                    <div class="select_area">
                        <select name="genre"  class="genre">
                            <option value="9999">指定なし</option>
                            <option value="1">和食</option>
                            <option value="2">中華料理</option>
                            <option value="3">イタリアン</option>
                            <option value="4">フレンチ</option>
                            <option value="5">カレー</option>
                            <option value="6">ラーメン</option>
                            <option value="7">その他</option>
                        </select>
                    </div>
                </li>
                <li>
                    <span>価格（１人あたり）</span><br>
                    <div class="select_area">
                        <select name="min" class="price">
                            <option value="0">指定なし</option>
                            <option value="500">¥500</option>
                            <option value="1000">¥1,000</option>
                            <option value="1500">¥1,500</option>
                            <option value="2000">¥2,000</option>
                        </select>
                        ~
                        <select name="max" class="price">
                            <option value="9999">指定なし</option>
                            <option value="500">¥500</option>
                            <option value="1000">¥1,000</option>
                            <option value="1500">¥1,500</option>
                            <option value="2000">¥2,000</option>s
                        </select>
                    </div>
                </li>
            </ul>
            <h3><i class="fa fa-heart-o"></i>こだわり条件</h3>
            <ul class="sub_manu--about">
                <li><input type="checkbox" id="c1"><label for="c1">日替わりメニュー有</label></li>
                <li><input type="checkbox" id="c2"><label for="c2">男性にオススメ</label></li>
                <li><input type="checkbox" id="c3"><label for="c3">女性にオススメ</label></li>
                <li><input type="checkbox" id="c4"><label for="c4">今月の人気店</label></li>
                <li><input type="checkbox" id="c5"><label for="c5">星が多い店</label></li>
                <li><input type="checkbox" id="c6"><label for="c6">Wi-Fiが使える</label></li>
                <li>
                    <span>人数（座席数）</span><br>
                    <div class="select_area">
                        <select name="seat" class="seat">
                            <option value="9999">指定なし</option>
                            <option value="01">1~2名</option>
                            <option value="02">3~4名</option>
                            <option value="03">5~6名</option>
                            <option value="04">7名以上</option>
                        </select>
                    </div>
                </li>
                <li>
                    <span>料理提供時間</span><br>
                    <div class="select_area">
                        <select name="time" class="time">
                            <option value="9999">指定なし</option>
                            <option value="5">5分以内</option>
                            <option value="10">10分以内</option>
                            <option value="15">15分以内</option>
                            <option value="20">20分以内</option>
                        </select>
                    </div>
                </li>
            </ul>
            <input class="" type="submit" onclick="searchAjax(); return false;" value="検　索">
        </form>
    </div>

    <div class="map_area">
        <div class="map_display"  ></div>
        <div id="map_canvas" class="yum_map"  ></div>
        <!-- <iframe class="yum_map" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3241.8296280479017!2d139.699413!3d35.65656899999999!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sja!2sjp!4v1435378715394" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
        <div class="shop_list--block" style="display: none;">
            <div class="sort_area">
                (全5件)並び順：
                <select name="sort" class="sort">
                    <option value="00">指定なし</option>
                    <option value="01">人気順</option>
                    <option value="02">距離が近い順</option>
                    <option value="03">距離が遠い順</option>
                    <option value="04">座席が少ない順</option>
                    <option value="05">座席が多い順</option>
                </select>
            </div>
            <div class="shop_list--block__content">
                <a href="#"><img src="/img/img_001.jpg" alt="肉割烹 将泰庵[和牛炙り鉄火丼]" />
                    <ul>
                        <li>店名：肉割烹 将泰庵</li>
                        <li>住所：〒123-4567　東京都渋谷区桜丘町2-3-4</li>
                        <li>セルリアンからの距離：徒歩５分程度</li>
                        <li>営業時間(ランチ)：11:00~15:00</li>
                        <li>座席数：全50席（ランチタイム全席禁煙）</li>
                        <li>平均ランチ価格：¥1,000</li>
                        <li>おすすめメニュー：和牛炙り鉄火丼</li>
                    </ul>
                    <i class="fa fa-angle-right fa-5x"></i>
                </a>
            </div>
            <div class="shop_list--block__content">
                <a href="#"><img src="/img/img_002.jpg" alt="" />
                    <ul>
                        <li>店名：てすてす</li>
                        <li>住所：〒123-4567　東京都渋谷区桜丘町2-3-4</li>
                        <li>セルリアンからの距離：徒歩7分程度</li>
                        <li>営業時間(ランチ)：10:00~14:00</li>
                        <li>座席数：全50席（ランチタイム全席禁煙）</li>
                        <li>平均ランチ価格：¥800</li>
                        <li>おすすめメニュー：ヘルシーなおかゆ</li>
                    </ul>
                    <i class="fa fa-angle-right fa-5x"></i>
                </a>
            </div>
            <div class="shop_list--block__content">
                <a href="#"><img src="/img/img_003.jpg" alt="" />
                    <ul>
                        <li>店名：PUBLIC HOUSE</li>
                        <li>住所：〒123-4567　東京都渋谷区桜丘町2-3-4</li>
                        <li>セルリアンからの距離：徒歩10分程度</li>
                        <li>営業時間(ランチ)：10:00~14:00</li>
                        <li>座席数：全50席（分煙席・喫煙可）</li>
                        <li>平均ランチ価格：¥1,000</li>
                        <li>おすすめメニュー：チキン南蛮プレート</li>
                    </ul>
                    <i class="fa fa-angle-right fa-5x"></i>
                </a>
            </div>
            <div class="shop_list--block__content">
                <a href="#"><img src="/img/img_002.jpg" alt="" />
                    <ul>
                        <li>店名：てすてす</li>
                        <li>住所：〒123-4567　東京都渋谷区桜丘町2-3-4</li>
                        <li>セルリアンからの距離：徒歩7分程度</li>
                        <li>営業時間(ランチ)：10:00~14:00</li>
                        <li>座席数：全50席（ランチタイム全席禁煙）</li>
                        <li>平均ランチ価格：¥800</li>
                        <li>おすすめメニュー：ヘルシーなおかゆ</li>
                    </ul>
                    <i class="fa fa-angle-right fa-5x"></i>
                </a>
            </div>
            <div class="shop_list--block__content">
                <a href="#"><img src="/img/img_001.jpg" alt="肉割烹 将泰庵[和牛炙り鉄火丼]" />
                    <ul>
                        <li>店名：肉割烹 将泰庵</li>
                        <li>住所：〒123-4567　東京都渋谷区桜丘町2-3-4</li>
                        <li>セルリアンからの距離：徒歩５分程度</li>
                        <li>営業時間(ランチ)：11:00~15:00</li>
                        <li>座席数：全50席（ランチタイム全席禁煙）</li>
                        <li>平均ランチ価格：¥1,000</li>
                        <li>おすすめメニュー：和牛炙り鉄火丼</li>
                    </ul>
                    <i class="fa fa-angle-right fa-5x"></i>
                </a>
            </div>
        </div>

        <p class="open_close--bt"></p>
        <h4 class="special_edition--ttl"><i class="fa fa-bookmark-o"></i>特集</h4>
        <div class="special_edition--block">
            <ul>
                <li class="special_edition--block__list">
                    <a href="#"><img src="/img/img_001.jpg" alt="" />
                        <span>和牛炙り鉄火丼</span>
                    </a>
                </li>
                <li class="special_edition--block__list">
                    <a href="#"><img src="/img/img_002.jpg" alt="" />
                        <span>ヘルシーなおかゆ</span>
                    </a>
                </li>
                <li class="special_edition--block__list">
                    <a href="#"><img src="/img/img_003.jpg" alt="" />
                        <span>チキン南蛮</span>
                    </a>
                </li>
                <li class="special_edition--block__list">
                    <a href="#"><img src="/img/img_004.jpg" alt="" />
                        <span>タコライス</span>
                    </a>
                </li>
                <li class="special_edition--block__list">
                    <a href="#"><img src="/img/img_001.jpg" alt="" />
                        <span>和牛炙り鉄火丼</span>
                    </a>
                </li>
                <li class="special_edition--block__list">
                    <a href="#"><img src="/img/img_002.jpg" alt="" />
                        <span>ヘルシーなおかゆ</span>
                    </a>
                </li>
                <li class="special_edition--block__list">
                    <a href="#"><img src="/img/img_003.jpg" alt="" />
                        <span>チキン南蛮</span>
                    </a>
                </li>
                <li class="special_edition--block__list">
                    <a href="#"><img src="/img/img_004.jpg" alt="" />
                        <span>タコライス</span>
                    </a>
                </li>
                <li class="special_edition--block__list">
                    <a href="#"><img src="/img/img_001.jpg" alt="" />
                        <span>和牛炙り鉄火丼</span>
                    </a>
                </li>
                <li class="special_edition--block__list">
                    <a href="#"><img src="/img/img_002.jpg" alt="" />
                        <span>ヘルシーなおかゆ</span>
                    </a>
                </li>
                <li class="special_edition--block__list">
                    <a href="#"><img src="/img/img_003.jpg" alt="" />
                        <span>チキン南蛮</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</body>
</html>
