
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

</head>
<body>
<header>
  <h1><a href="/">Yum Yum<img src="/img/logo.png" alt="" /></a></h1>
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
  <div class="logo_area">
    <p class="welcome_message">ようこそ、Yum Yumへ<br><img src="/img/logo.png" alt="" /></p>
<form action="/login/login" method="post">
    <div class="login_area">
      <p class="user_id">ID:
        <input type="text" name="data[User][gmo_id]" placeholder="社員番号を入力してください" />
      </p>
      <p class="user_id">PASSWORD:
        <input type="text" name="data[User][pass]" placeholder="パスワードを入力してください" />
      </p>
<input type="submit" value="ログイン">
    </div>
</form>
    <p class="ex_text">
      Yum Yumを最大限に楽しみたい方は、こちらからログインしてください。<br>
      ログインID・パスワードがわからない場合は、各社総務部・管理部にお問い合わせください。

    </p>
  </div>

</div>

</body>
</html>
