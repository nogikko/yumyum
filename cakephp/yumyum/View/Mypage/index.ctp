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
        $(function() {
            $(".favorite").css('display','none');
            $(".tab .favorite_tab").click(function() {
                $(".recently").css('display','none');
                $(".favorite").css('display','block');
                $(".tab .recently_tab").removeClass('select_tab');
                $(this).addClass('select_tab');
            });
            $(".tab .recently_tab").click(function() {
                $(".favorite").css('display','none');
                $(".recently").css('display','block');
                $(".tab .favorite_tab").removeClass('select_tab');
                $(this).addClass('select_tab');
            });
        });
    </script>
</head>
<body>
<header>
    <h1><a href="/">Yum Yum<img src="/img/logo.png" alt="" /></a></h1>
    <div class="main_menu">
        <ul>
            <li><a class="hvr-fade" href="#"><i class="fa fa-bookmark-o"></i>特集</a></li>
            <li>/</li>
            <li><a class="hvr-fade" href="#"><i class="fa fa-search"></i>お店を検索</a></li>
            <li>/</li>
            <li><a class="hvr-fade" href="/login/logout/"><i class="fa fa-power-off"></i>ログアウト</a></li>

        </ul>
    </div>
</header>

<div class="main_contener">
    <div class="myinfo_area">
<p class="myinfo_area--head">マイページ</p>
        <div class="left_column">
            <div class="profile_img">
                <img src="/img/aze.png" alt="あぜさん" />
            </div>
            <div class="my_name"><p>畔上　剛</p></div>
            <div class="mypage_bt">
                <div class="uploadButton">
                    プロフィール画像を変更
                    <input type="file" onchange="uv.style.display='inline-block'; uv.value = this.value;" />
                    <input type="text" id="uv" class="uploadValue" disabled />
                </div>
            </div>
            <div class="mypage_bt">
                <a class="shop_add" href="/form/"><i class="fa fa-pencil-square-o"></i> お店を登録する</a>
            </div>
            <div class="mypage_bt">
                <a class="shop_review" href="/review/"><i class="fa fa-search"></i> お店を検索</a>
            </div>
        </div><!-- left END -->
        <div class="right_column">
            <ul class="tab">
                <li class="recently_tab select_tab"><i class="fa fa-flag"></i> 最近行ったお店</li>
                <li class="favorite_tab"><i class="fa fa-heart"></i> お気に入りのお店</li>
            </ul>
            <div class="recently">
                <ul>
                    <?php foreach($everdatas as $data):?>
                        <li class="recently_list"><a href=""><img src= <?=$data['Restaurant']['image_file_name']?> alt="" /><span><?=$data['Restaurant']['name']?></span></a></li>
                    <?php endforeach;?>
                   <!-- <li class="recently_list"><a href="detail"><img src="/img/img_001.jpg" alt="" /><span>和牛炙り鉄火丼</span></a></li>
                    <li class="recently_list"><a href="detail"><img src="/img/img_003.jpg" alt="" /><span>チキン南蛮</span></a></li>
                    <li class="recently_list"><a href="detail"><img src="/img/img_004.jpg" alt="" /><span>チキン南蛮</span></a></li>
                    <li class="recently_list"><a href="detail"><img src="/img/img_002.jpg" alt="" /><span>ヘルシーなおかゆ</span></a></li>
                    <li class="recently_list"><a href="detail"><img src="/img/img_003.jpg" alt="" /><span>チキン南蛮</span></a></li>
                    <li class="recently_list"><a href="detail"><img src="/img/img_004.jpg" alt="" /><span>タコライス</span></a></li>
                    <li class="recently_list"><a href="detail"><img src="/img/img_001.jpg" alt="" /><span>和牛炙り鉄火丼</span></a></li>
                    <li class="recently_list"><a href=""><img src="/img/img_002.jpg" alt="" /><span>ヘルシーなおかゆ</span></a></li>
                    <li class="recently_list"><a href=""><img src="/img/img_002.jpg" alt="" /><span>ヘルシーなおかゆ</span></a></li>
                    <li class="recently_list"><a href=""><img src="/img/img_003.jpg" alt="" /><span>チキン南蛮</span></a></li>
                    <li class="recently_list"><a href=""><img src="/img/img_001.jpg" alt="" /><span>和牛炙り鉄火丼</span></a></li>-->
                </ul>
            </div>
            <div class="favorite">
                <ul>
                    <?php foreach($favdatas as $data):?>
                        <li class="recently_list"><a href=""><img src= <?=$data['Restaurant']['image_file_name']?> alt="" /><span><?=$data['Restaurant']['name']?></span></a></li>
                    <?php endforeach;?>
                    <!--<li class="favorite_list"><a href="detail"><img src="/img/img_003.jpg" alt="" /><span>チキン南蛮</span></a></li>
                    <li class="favorite_list"><a href="detail"><img src="/img/img_002.jpg" alt="" /><span>タコライス</span></a></li>
                    <li class="favorite_list"><a href="detail"><img src="/img/img_001.jpg" alt="" /><span>和牛炙り鉄火丼</span></a></li>
                    <li class="favorite_list"><a href="detail"><img src="/img/img_002.jpg" alt="" /><span>ヘルシーなおかゆ</span></a></li>
                    <li class="favorite_list"><a href=""><img src="/img/img_002.jpg" alt="" /><span>タコライス</span></a></li>
                    <li class="favorite_list"><a href=""><img src="/img/img_001.jpg" alt="" /><span>和牛炙り鉄火丼</span></a></li>
                    <li class="favorite_list"><a href=""><img src="/img/img_002.jpg" alt="" /><span>ヘルシーなおかゆ</span></a></li>
                    <li class="favorite_list"><a href=""><img src="/img/img_001.jpg" alt="" /><span>和牛炙り鉄火丼</span></a></li>
                    <li class="favorite_list"><a href=""><img src="/img/img_002.jpg" alt="" /><span>タコライス</span></a></li>-->
                    <li class="favorite_list"></li>
                </ul>
            </div>
        </div><!-- right END -->
        <div style="clear: both;"></div>
    </div>
</div>

</body>
</html>
