
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
<script>
$(function(){
  var favo_flg = true;
  $(".favo").click(function() {
    if (favo_flg) {
      $(this).removeClass('off');
      favo_flg = false;//---trueの時はfalseに
    }else{
      $(this).addClass('off');
      favo_flg = true;//---falseの時はtrueに
    }
  });

  var went_flg = true;
  $(".went").click(function() {
    if (went_flg) {
      $(this).removeClass('off');
      went_flg = false;//---trueの時はfalseに
    }else{
      $(this).addClass('off');
      went_flg = true;//---falseの時はtrueに
    }

  });
});



</script>
</head>
<body>
<header>
  <h1><a href="/">Yum Yum<img src="img/logo.png" alt="" /></a></h1>
  <div class="main_menu">
    <ul>
      <li><a class="hvr-fade" href="edition"><i class="fa fa-bookmark-o"></i>特集</a></li>
      <li>/</li>
      <li><a class="hvr-fade" href="/"><i class="fa fa-search"></i>お店を検索</a></li>
      <li>/</li>
      <li><a class="hvr-fade" href="login"><i class="fa fa-power-off"></i>ログイン</a></li>
    </ul>
  </div>
</header>

<div class="main_contener">
  <div class="detail_area">
<p class="detail_area--head">お店の詳細情報</p>
    <div class="left_column">
      <div class="shop_img">
        <img src="img/img_002.jpg" alt="ヘルシーなおかゆ" />
      </div>
      <div class="evaluation">
        <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i></p>
        <span> (3.5)</span>
        <span style="float: right;">レビュー：20件</span>
      </div>
      <div class="evaluation_bt">
        <button class="favo off"><i class="fa fa-heart-o"></i> お気に入り</button>
      </div>
      <div class="evaluation_bt">
	<input type='hidden' id='hidden_data' value='送信したい情報をここに記載'>
        <a href="mailto:?subject=from YumYum!ランチのお誘い&body=今からランチに行きませんか？" class="invites" id="mail" onclick"sendmail() "href="#" ><i class="fa fa-paper-plane-o"></i> ランチに誘う</a>
      </div>
    <div style="clear: both;"></div>
      <div class="evaluation_bt">
        <button class="went off"><i class="fa fa-flag"></i> ココ行ったよ！</button>
      </div>
      <div class="evaluation_bt">
        <button class="review" onclick="location.href='/review/'"><i class="fa fa-star-o"></i> レビューを書く</button>
      </div>
    </div><!-- left END -->
    <div class="right_column">
    <table class="shop_info">
      <caption><i class="fa fa-cutlery"></i> お店の情報</caption>
      <tbody>
          <tr>
            <th>店名</th>
            <td>ハノイのホイさん</td>
          </tr>

          <tr>
            <th>住所</th>
            <td>〒150-0042  東京都渋谷区宇田川町16-13 スペイン坂内田ビル2F</td>
          </tr>

          <tr>
            <th>電話番号</th>
            <td>050-5798-7175</td>
          </tr>

          <tr>
            <th>ランチタイム</th>
            <td>11:30～16:00</td>
          </tr>

          <tr>
            <th>料理ジャンル</th>
            <td>タイ料理（その他）</td>
          </tr>

          <tr>
            <th>平均予算</th>
            <td>850円</td>
          </tr>

          <tr>
            <th>総席数</th>
            <td>44席</td>
          </tr>

          <tr>
            <th>今月行った人</th>
            <td>23人</td>
          </tr>
      </tbody>
    </table>
    <div class="comm_review">
      <div class="comm_review--head"><i class="fa fa-comments-o"></i> みんなのレビュー</div>

      <div class="comm_review--area">
        <div class="comm_review--list">
          <img class="comm_review--list__user" src="img/aze.png" alt="あぜさん" />
          <div class="comm_review--list__comm">
            <p class="data">畔上 剛<small>@GMOクラウド</small><span>2015/07/07 13:23</span></p>
            <p class="text">
              店内は、スペインの酒蔵をイメージした白壁のかわいいお店。
              スペインの田舎町でのんびり食事をしているような異国情緒あふれる空間です。
              食材のほとんどをスペインから輸入して本場の味にこだわり、スペイン全土の代表的な料理や本場の家庭料理が楽しめます。
              特におすすめの特大マッシュルームのガーリックソテーやナバーラ産の極太ホワイトアスパラは美味！
            </p>
          </div>
        </div>

        <div class="comm_review--list">
          <img class="comm_review--list__user" src="img/aze.png" alt="あぜさん" />
          <div class="comm_review--list__comm">
            <p class="data">畔上 剛<small>@GMOクラウド</small><span>2015/07/07 13:23</span></p>
            <p class="text">
              店内は、スペインの酒蔵をイメージした白壁のかわいいお店。
              スペインの田舎町でのんびり食事をしているような異国情緒あふれる空間です。
              食材のほとんどをスペインから輸入して本場の味にこだわり、スペイン全土の代表的な料理や本場の家庭料理が楽しめます。
              特におすすめの特大マッシュルームのガーリックソテーやナバーラ産の極太ホワイトアスパラは美味！
            </p>
          </div>
        </div>

        <div class="comm_review--list last">
          <img class="comm_review--list__user" src="img/aze.png" alt="あぜさん" />
          <div class="comm_review--list__comm">
            <p class="data">畔上 剛<small>@GMOクラウド</small><span>2015/07/07 13:23</span></p>
            <p class="text">
              店内は、スペインの酒蔵をイメージした白壁のかわいいお店。
              スペインの田舎町でのんびり食事をしているような異国情緒あふれる空間です。
              食材のほとんどをスペインから輸入して本場の味にこだわり、スペイン全土の代表的な料理や本場の家庭料理が楽しめます。
              特におすすめの特大マッシュルームのガーリックソテーやナバーラ産の極太ホワイトアスパラは美味！
            </p>
          </div>
        </div>
      </div>
    </div>
    </div><!-- right END -->
    <div style="clear: both;"></div>
  </div>
</div>

</body>
</html>
