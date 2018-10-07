<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="generator" content="Responsive Bootstrap Builder 2.0.165">
    <title>Index</title>
    <link rel="stylesheet" href="css/bootstrap3.min.css">
    <link rel="stylesheet" href="css/wireframe-theme.min.css">
    <script>
    document.createElement("picture");
    </script>
    <script src="js/picturefill.min.js" class="picturefill" async="async"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/navbar.css">
</head>

<body>

<?php
use App\analysze\guestip;

$counter = intval(file_get_contents("counter.dat"));

if (!isset($_COOKIE['visitor'])) {
$counter++;
$fp = fopen("counter.dat", "w");
flock($fp, LOCK_EX); // do an exclusive lock
fwrite($fp, $counter);
flock($fp, LOCK_UN); // release the lock
fclose($fp);
setcookie("visitor", 1, time()+3600);


$clientIP = false;
if (array_key_exists('HTTP_CLIENT_IP', $_SERVER))
$clientIP = $_SERVER['HTTP_CLIENT_IP'];

$checkForProxy = false;
if (array_key_exists('HTTP_X_FORWARDED_FOR',$_SERVER))
$checkForProxy = $_SERVER['HTTP_X_FORWARDED_FOR'];

$remote_addr = false;
if (array_key_exists('REMOTE_ADDR',$_SERVER))
$remote_addr = $_SERVER['REMOTE_ADDR'];

$guestip = guestip::create(array('HTTP_CLIENT_IP' => $clientIP,
'HTTP_X_FORWARDED_FOR' => $checkForProxy,
'REMOTE_ADDR' => $remote_addr));


}

?>
    <div class="row row-3">
        <div class="col-xs-12">
            <div class="responsive-picture picture-1">
                <picture><img alt="Placeholder Picture" srcset="http://www.diylife.com.tw/ezfiles/diylife/img/pictures/diylogo1.gif" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7">
                </picture>
            </div>
            <div class="html-element html-element-2">
                <ul class="nav nav-pills">
                    ...<p>造訪人次:{{$counter}}</p>
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="/shop_laravel/public/merchandise/showCart">購物車</a>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li ><a href="/shop_laravel/public/transaction">購買紀錄 <span class="sr-only">(current)</span></a></li>
                                    <li><a href="#">Link</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"style = "color: white;">會員 <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                        @if(session()->has('user_id'))
                                            <li><a href="/shop_laravel/public/user/auth/sign-out">登出</a></li>
                                        @else
                                        <li><a href="/shop_laravel/public/user/auth/sign-up">註冊</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="/shop_laravel/public/user/auth/sign-in">登入</a></li>
                                        @endif
                                        
                                        </ul>
                                    </li>
                                </ul>
                                
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="#">Link</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                    
    
 
</ul></div>
    </div>
  </div>
  <div class="row ">
    <div class="col-xs-2 column-1 ">
      <div class="html-element html-element-1 "><h4 class="sidebar-title ">商品分類</h4>
  
    <ul>
      <li class="category-all-goods ">
        <strong class="category-current "><a href="/shop_laravel/public/merchandise">全部商品</a></strong>


      </li>

      <li>

        <a href="0" target="_top ">精選 / 特價商品 </a>
      </li>
      <li>

        <a href="01 " target="_top ">電動工具 - 充電式 </a>
      </li>
      <li>

        <a href="02 " target="_top ">電動工具 - 插電式 </a>
      </li>
      </div>
    </div>

     <div class="col-xs-8 ">
        @yield('content')
    </div>




    <footer><div class="col-xs-2 ">
      <h1 class="heading-2 "><span class="heading-text-2 ">連絡方式</span>
      </h1>
      <p class="paragraph paragraph-1 ">連絡電話:0917511067<br>mail:abc123123437@gmail.com<br>
      </p>
    </div></footer>
  </div>
  <script src="js/jquery.min.js "></script>
  <script src="js/bootstrap.min.js "></script>
</body>

</html>