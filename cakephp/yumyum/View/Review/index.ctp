<html><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
    <title>sample</title>
    <!-- google map v3 読み込み -->
    <script type="text/javascript" async="" src="https://ssl.google-analytics.com/ga.js"></script><script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBZhBrehOticNEx0I-EMODgMxntOXZyD64&amp;sensor=false"></script><script src="http://maps.gstatic.com/maps-api-v3/api/js/21/6/intl/ja_ALL/main.js"></script>
    <script>

        var latlng;
        function getLatLng(place,form) {

            // ジオコーダのコンストラクタ
            var geocoder = new google.maps.Geocoder();

            // geocodeリクエストを実行。
            // 第１引数はGeocoderRequest。住所⇒緯度経度座標の変換時はaddressプロパティを入れればOK。
            // 第２引数はコールバック関数。
            geocoder.geocode({
                address: place
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    // 結果の表示範囲。結果が１つとは限らないので、LatLngBoundsで用意。
                    var bounds = new google.maps.LatLngBounds();

                    for (var i in results) {
                        if (results[i].geometry) {

                            // 緯度経度を取得
                            latlng = results[i].geometry.location;

                            document.register.elements["data[Restaurant][lat]"].value = latlng.lat();
                            document.register.elements["data[Restaurant][lng]"].value = latlng.lng();
                            form.submit();


                        }
                    }

                    // 範囲を移動
                    map.fitBounds(bounds);

                } else if (status == google.maps.GeocoderStatus.ERROR) {
                    alert("サーバとの通信時に何らかのエラーが発生！");
                } else if (status == google.maps.GeocoderStatus.INVALID_REQUEST) {
                    alert("リクエストに問題アリ！geocode()に渡すGeocoderRequestを確認せよ！！");
                } else if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
                    alert("短時間にクエリを送りすぎ！落ち着いて！！");
                } else if (status == google.maps.GeocoderStatus.REQUEST_DENIED) {
                    alert("このページではジオコーダの利用が許可されていない！・・・なぜ！？");
                } else if (status == google.maps.GeocoderStatus.UNKNOWN_ERROR) {
                    alert("サーバ側でなんらかのトラブルが発生した模様。再挑戦されたし。");
                } else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
                    alert("見つかりません");
                } else {
                    alert("えぇ～っと・・、バージョンアップ？");
                }

                return false;
            });
        }

        function checkForm(form) {

           return getLatLng(document.register.elements["data[Restaurant][address]"].value,form);

        }
    </script>
<script type="text/javascript" charset="UTF-8" src="http://maps.gstatic.com/maps-api-v3/api/js/21/6/intl/ja_ALL/common.js"></script><script type="text/javascript" charset="UTF-8" src="http://maps.gstatic.com/maps-api-v3/api/js/21/6/intl/ja_ALL/util.js"></script><script type="text/javascript" charset="UTF-8" src="http://maps.gstatic.com/maps-api-v3/api/js/21/6/intl/ja_ALL/stats.js"></script></head>
<body>
<header>
  <h1><a href="index.html">Yum Yum<img src="/img/logo.png" alt="" /></a></h1>
  <div class="main_menu">
    <ul>
      <li><a class="hvr-fade" href="#"><i class="fa fa-bookmark-o"></i>特集</a></li>
      <li>/</li>
      <li><a class="hvr-fade" href="#"><i class="fa fa-search"></i>お店を検索</a></li>
      <li>/</li>
      <li><a class="hvr-fade" href="#"><i class="fa fa-power-off"></i>ログアウト</a></li>
    </ul>
  </div>
</header>

<div class="main_contener">
  <div class="shop_regist">
  <p class="shop_regist--head">お店のレビュー</p>
    <form action="/form/add/" name="register" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <div class="shop_regist--form">

            <span>お店の評価</span><br>
            <div class="select_area">
                <select name="data[Restaurant][distance]">
                    <option value="5">★★★★★</option>
                    <option value="4">★★★★</option>
                    <option value="3">★★★</option>
                    <option value="2">★★</option>
                    <option value="1">★</option>
                </select>
            </div>

            <span>コメント</span><br>
            <textarea name="" id="" cols="60" rows="10"></textarea><br>

            <input type="button" onclick="checkForm(this.form);" value="レビューする">
            <input type="hidden" name="data[Restaurant][lat]" value="">
            <input type="hidden" name="data[Restaurant][lng]" value="">
        </div>
    </form>
</div>
</body></html>
