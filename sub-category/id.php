<?php 
require_once('../php/info.php'); 
$parts=parse_url($_SERVER['REQUEST_URI']); 
$page_url=explode('/', $parts['path']);
$id = $page_url[count($page_url)-1];
//$id = "winter-2022-anime";
$subCategory = str_replace("-", " ", $id);
$page = $_GET['page']; 
if ($page == ""){
    $page = 1;
}
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="<?=$base_url?>/img/favicon.ico">


        <title>List of <?=$subCategory?> at Gogoanime</title>

        <meta name="robots" content="noodp, noydir" />
        <meta name="description" content="List of <?=$subCategory?> at Gogoanime">
        <meta name="keywords" content="List genre Anime, Anime Movies">
        <meta itemprop="image" content="<?=$base_url?>/img/logo.png" />

        <meta property="og:site_name" content="Gogoanime" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="List of <?=$subCategory?> at Gogoanime" />
        <meta property="og:description" content="List of <?=$subCategory?> at Gogoanime">
        <meta property="og:url" content="" />
        <meta property="og:image" content="<?=$base_url?>/img/logo.png" />
        <meta property="og:image:secure_url" content="<?=$base_url?>/img/logo.png" />

        <meta property="twitter:card" content="summary" />
        <meta property="twitter:title" content="List of <?=$subCategory?> at Gogoanime" />
        <meta property="twitter:description" content="List of <?=$subCategory?> at Gogoanime" />

        <link rel="canonical" href="<?=$base_url?><?php echo $_SERVER['REQUEST_URI'] ?>" />
        <link rel="alternate" hreflang="en-us" href="<?=$base_url?><?php echo $_SERVER['REQUEST_URI'] ?>" />



        <link rel="stylesheet" type="text/css" href="<?=$base_url?>/css/style.css?v=7.1" />

        <script type="text/javascript" src="<?=$base_url?>/js/libraries/jquery.js"></script>
        <script>
                var base_url = 'https://' + document.domain + '/';
                var base_url_cdn_api = 'https://ajax.gogo-load.com/';
                var api_anclytic = 'https://ajax.gogo-load.com/anclytic-ajax.html';
        </script>
        <?php require_once('../php/advertisments/popup.html'); ?>
        <script type="text/javascript" src="https://cdn.gogocdn.net/files/gogo/js/main.js?v=7.1"></script>
</head>

<body>
        <div class="clr"></div>
        <div id="wrapper_inside">
                <div id="wrapper">
                        <div id="wrapper_bg">
                                <?php require_once('../php/include/header.php');?>
                                <section class="content">
                                        <section class="content_left">

                                                <div class="main_body">
                                                        <div class="anime_name anime_movies">
                                                                <i class="icongec-anime_movies i_pos"></i>
                                                                <h2><?=$subCategory?></h2>
                                                                <div class="anime_name_pagination">
                                                                        <div class="pagination">
                                                                                <ul class='pagination-list'><?php $pagination = file_get_contents("$apiLink/subCategoryPage/$id/$page");$pagination = json_decode($pagination, true); echo str_replace("active","selected",$pagination['pagination']) ?>
                                                                               
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="last_episodes">
                                                                <ul class="items">
                                                                <?php
                                                                    $json = file_get_contents("$apiLink/season/$id/$page");
                                                                    $json = json_decode($json, true);
                                                                    foreach($json as $genre)  { 
                                                                ?>
                                                                        <li>

                                                                                <div class="img">
                                                                                        <a href="/category/<?=$genre['animeId']?>"
                                                                                                title="<?=$genre['animeTitle']?>">
                                                                                                <img src="<?=$genre['imgUrl']?>"
                                                                                                        alt="<?=$genre['animeTitle']?>" />
                                                                                        </a>
                                                                                </div>
                                                                                <p class="name"><a href="/category/<?=$genre['animeId']?>" title="<?=$genre['animeTitle']?>"><?=$genre['animeTitle']?></a>
                                                                                </p>
                                                                                <p class="released"><?=$genre['status']?></p>
                                                                        </li>
                                                                <?php } ?>
                                                                </ul>
                                                        </div>
                                                </div>

                                        </section>
                                        <section class="content_right">
                                        

                                                <div class="clr"></div>
                                                <div class="main_body">
                                                        <div class="main_body_black">
                                                                <div class="anime_name ongoing">
                                                                        <i class="icongec-ongoing i_pos"></i>
                                                                        <h2>RECENT RELEASE</h2>
                                                                </div>
                                                                <div class="recent">
                                                                        <!-- begon -->
                                                                        <div id="scrollbar2">
                                                                                <div class="scrollbar">
                                                                                        <div class="track">
                                                                                                <div class="thumb">
                                                                                                        <div
                                                                                                                class="end">
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="viewport">
                                                                                        <div class="overview">
                                                                                                <?php require_once('../php/include/recentRelease.php'); ?>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        <!-- tao thanh cuon 1-->
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="clr"></div>
                                                <div id="load_ads_2">
                                                        <div id="media.net sticky ad" style="display: inline-block">
                                                        </div>
                                                </div>
                                                <style type="text/css">
                                                        #load_ads_2 {
                                                                width: 300px;
                                                        }

                                                        #load_ads_2.sticky {
                                                                position: fixed;
                                                                top: 0;
                                                        }

                                                        #scrollbar2 .viewport {
                                                                height: 1000px !important;
                                                        }
                                                </style>
                                                <script>
                                                        var leftamt;
                                                        function scrollFunction() {
                                                                var scamt = (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
                                                                var element = document.getElementById("media.net sticky ad");
                                                                if (scamt > leftamt) {
                                                                        var leftPosition = element.getBoundingClientRect().left;
                                                                        element.className = element.className.replace(/(?:^|\s)fixclass(?!\S)/g, '');
                                                                        element.className += " fixclass";
                                                                        element.style.left = leftPosition + 'px';
                                                                }
                                                                else {
                                                                        element.className = element.className.replace(/(?:^|\s)fixclass(?!\S)/g, '');
                                                                }
                                                        }
                                                        function getElementTopLeft(id) {
                                                                var ele = document.getElementById(id);
                                                                var top = 0;
                                                                var left = 0;
                                                                while (ele.tagName != "BODY") {
                                                                        top += ele.offsetTop;
                                                                        left += ele.offsetLeft;
                                                                        ele = ele.offsetParent;
                                                                }
                                                                return { top: top, left: left };
                                                        }
                                                        function abcd() {
                                                                TopLeft = getElementTopLeft("media.net sticky ad");
                                                                leftamt = TopLeft.top;
                                                                //leftamt -= 10;
                                                        }
                                                        window.onload = abcd;
                                                        window.onscroll = scrollFunction;
                                                </script>
                                                <?php require_once('../php/include/sub-category.html');?>
                                        </section>
                                </section>
                                <div class="clr"></div>
                                <footer>
                                        <div class="menu_bottom">
                                                <a href="/about-us.html">
                                                        <h3>Abouts us</h3>
                                                </a>
                                                <a href="/contact-us.html">
                                                        <h3>Contact us</h3>
                                                </a>
                                                <a href="/privacy.html">
                                                        <h3>Privacy</h3>
                                                </a>
                                        </div>
                                        <div class="croll">
                                                <div class="big"><i class="icongec-backtop"></i></div>
                                                <div class="small"><i class="icongec-backtop_mb"></i></div>
                                        </div>
                                </footer>
                        </div>
                </div>
        </div>
        <div id="off_light"></div>
        <div class="clr"></div>
        <div class="mask"></div>
            <script type="text/javascript" src="<?=$base_url?>/js/files/combo.js"></script>
    <script type="text/javascript" src="http://kitsunime.unaux.com/files/js/video.js"></script>
        <script type="text/javascript" src="<?=$base_url?>/js/files/jquery.tinyscrollbar.min.js"></script>
        <div class="notice-400" style=" z-index:99999;position: fixed;bottom: 0;text-align: center;width: 100%; left: 0;padding: 10px;background: #939393;color: white;">
        We moved site to <a href="<?=$base_url?>" title="Gogoanime" alt="Gogoanime"
          style="color: #ffc119"><?=$website_name?></a>. Please bookmark new site. Thank you!
        </div>
        <script>
                if (document.getElementById('scrollbar2')) {
                        $('#scrollbar2').tinyscrollbar();
                }
        </script>

</body>

</html>
