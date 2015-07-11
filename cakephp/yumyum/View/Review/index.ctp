<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
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
    <script type="text/javascript" charset="UTF-8" src="http://maps.gstatic.com/maps-api-v3/api/js/21/6/intl/ja_ALL/common.js"></script>
    <script type="text/javascript" charset="UTF-8" src="http://maps.gstatic.com/maps-api-v3/api/js/21/6/intl/ja_ALL/util.js"></script>
    <script type="text/javascript" charset="UTF-8" src="http://maps.gstatic.com/maps-api-v3/api/js/21/6/intl/ja_ALL/stats.js"></script>
</head>
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
      <?php echo $this->Form->create(false, array('type' => 'post', 'action' => '/add/')); ?>
    <!-- <form action="/review/add/" name="register" method="post" accept-charset="utf-8"> -->
        <div class="shop_regist--form">

            <span>お店の評価</span><br>
            <div class="select_area">
                <!--   <select name="star">
                    <option value="5">★★★★★</option>
                    <option value="4">★★★★</option>
                    <option value="3">★★★</option>
                    <option value="2">★★</option>
                    <option value="1">★</option>
                </select> -->

                <?php echo $this->Form->select('Comment.star',
                    array(
                        '5' => '★★★★★',
                        '4' => '★★★★',
                        '3' => '★★★',
                        '2' => '★★',
                        '1' => '★'),
                array('empty'=>false)
                ); ?>
            </div>

            <span>コメント</span><br>
            <!-- <textarea name="message" id="" cols="60" rows="10"></textarea> -->
            <?php echo $this->Form->textarea('Comment.message',array('cols' => '60','rows' => '10')); ?>
            <br>
            <?php echo $this->Form->input('Comment.restaurant_id',array('type' => 'hidden','value' => $restaurant_id)); ?>
            <input type="submit" value="レビューする">

        </div>
   <!--  </form>
      <?php echo $this->Form->end(); ?>

</div>
</body></html>
