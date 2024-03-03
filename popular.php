<?php
require_once('./php/info.php'); 
$page = isset($_GET['page']) ? $_GET['page'] : 1;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="shortcut icon" href="<?=$base_url?>/img/favicon.ico">

    <title>List Anime Popular at Gogoanime</title>

    <meta name="robots" content="index, follow" />
    <meta name="description" content="List Anime Popular at Gogoanime">
    <meta name="keywords" content="List Popular, Anime Popular">
    <meta itemprop="image" content="<?=$base_url?>/img/logo.png" />

    <meta property="og:site_name" content="Gogoanime" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="List Anime Popular at Gogoanime" />
    <meta property="og:description" content="List Anime Popular at Gogoanime">
    <meta property="og:url" content="" />
    <meta property="og:image" content="<?=$base_url?>/img/logo.png" />
    <meta property="og:image:secure_url" content="<?=$base_url?>/img/logo.png" />

    <meta property="twitter:card" content="summary" />
    <meta property="twitter:title" content="List Anime Popular at Gogoanime" />
    <meta property="twitter:description" content="List Anime Popular at Gogoanime" />
    <meta name="referrer" content="origin">


    <link rel="canonical" href="<?=$base_url?><?php echo $_SERVER['REQUEST_URI'] ?>" />
    <link rel="alternate" hreflang="en-us" href="<?=$base_url?><?php echo $_SERVER['REQUEST_URI'] ?>" />



    <link rel="stylesheet" type="text/css" href="<?=$base_url?>/css/style.css" />
    <?php require_once('./php/advertisments/popup.html'); ?>

    <script type="text/javascript" src="<?=$base_url?>/js/libraries/jquery.js"></script>
    <script>
        var base_url = 'https://' + document.domain + '/';
        var base_url_cdn_api = 'https://ajax.gogo-load.com/';
        var api_anclytic = 'https://ajax.gogo-load.com/anclytic-ajax.html';
    </script>
    <script type="text/javascript" src="https://cdn.gogocdn.net/files/gogo/js/main.js"></script>
</head>

<body>
    <div class="clr"></div>
    <div id="wrapper_inside">
        <div id="wrapper">
            <div id="wrapper_bg">
            <?php require_once('./php/include/header.php'); ?>
                <section class="content">
                    <section class="content_left">

                        <div class="main_body">
                            <div class="anime_name anime_movies">
                                <i class="icongec-anime_movies i_pos"></i>
                                <h2>ANIME popular</h2>
                                <div class="anime_name_pagination">
                                    <div class="pagination">
                                        <ul class='pagination-list'><?php $pagination = file_get_contents("$apiLink/popularPage?page=$page");$pagination = json_decode($pagination, true); echo str_replace("active","selected",$pagination['pagination']) ?>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="last_episodes">
                            <ul class="items">
                               <?php
                                   $json = file_get_contents("$apiLink/popular?page=$page");
                                   $json = json_decode($json, true);
                                   foreach($json as $movies)  { 
                               ?>
                                       <li>
                                           <div class="img"><a href="/category/<?=$movies['animeId']?>" title="<?=$movies['animeTitle']?>"><img src="<?=$movies['imgUrl']?>" alt="<?=$movies['animeTitle']?>" /></a>
                                               </div><p class="name"><a href="/category/<?=$movies['animeId']?>" title="<?=$movies['animeTitle']?>"><?=$movies['animeTitle']?></a></p>
                                               <p class="released"><?=$movies['status']?></p>
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
                                                    <div class="end"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="viewport">
                                            <div class="overview">
                                            <?php require_once('./php/include/recentRelease.php'); ?>
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
                        <?php require_once('./php/include/sub-category.html'); ?>
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
    <script type="text/javascript" src="<?=$base_url?>/js/files/video.js"></script>
    <script type="text/javascript" src="<?=$base_url?>/js/files/jquery.tinyscrollbar.min.js"></script>
    <script type="text/javascript">
$(document).ready(function () {
  $('.btn-notice').click(function (e) {
    $('.bg-notice').hide();
    $(this).hide();
  });
});
</script>
<style type="text/css">
  @media only screen and (min-width: 387px) {
    .btn-notice {bottom:36px;}  
  }
  @media only screen and (max-width: 386px) {
    .btn-notice {bottom: 52px;}
  }
</style>
<div class="bg-notice" style="position:fixed;z-index:9999;background:#ffc119;bottom:0;text-align:center;color:#000;width:100%;padding:10px 0;font-weight:600;">We moved site to <a href="<?=$base_url?>" title="<?=$website_name?>" alt="<?=$website_name?>">Gogoanime</a>. Please bookmark new site. Thank you!</div><div class="btn-notice" style="position:fixed;z-index:9999;background:#00a651;color:#fff;cursor:pointer;right:0;padding:3px 8px;">x</div>
    <script>
        if (document.getElementById('scrollbar2')) {
            $('#scrollbar2').tinyscrollbar();
        }
    </script>
</body>

</html>