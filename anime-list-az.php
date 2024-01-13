<?php 
require_once('./php/info.php');
$parts=parse_url($_SERVER['REQUEST_URI']); 
$page_url=explode('/', $parts['path']);
$url = $page_url[count($page_url)-1];
//$url = "anime-list-R";
$aph = substr($url, -1);
$alphabet = substr($url, -1);
$page = $_GET['page']; 
if ($page == ""){
    $page = 1;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="<?=$base_url?>/img/favicon.ico">

    <title>List All Anime at Gogoanime | Anime List</title>

    <meta name="robots" content="index, follow" />
    <meta name="description" content="List All Anime  at Gogoanime | Anime List">
    <meta name="keywords" content="List All Anime  at Gogoanime | Anime List">
    <meta itemprop="image" content="<?=$base_url?>/img/logo.png" />

    <meta property="og:site_name" content="Gogoanime" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="List All Anime at Gogoanime | Anime List" />
    <meta property="og:description" content="List All Anime  at Gogoanime | Anime List">
    <meta property="og:url" content="" />
    <meta property="og:image" content="<?=$base_url?>/img/logo.png" />
    <meta property="og:image:secure_url" content="<?=$base_url?>/img/logo.png" />

    <meta property="twitter:card" content="summary" />
    <meta property="twitter:title" content="List All Anime at Gogoanime | Anime List" />
    <meta property="twitter:description" content="List All Anime  at Gogoanime | Anime List" />

    <link rel="canonical" href="<?=$base_url?><?php echo $_SERVER['REQUEST_URI'] ?>" />
    <link rel="alternate" hreflang="en-us" href="<?=$base_url?><?php echo $_SERVER['REQUEST_URI'] ?>" />
    <link rel="stylesheet" type="text/css" href="<?=$base_url?>/css/style.css" />
    <script type="text/javascript" src="<?=$base_url?>/js/libraries/jquery.js"></script>
    <?php require_once('./php/advertisments/popup.html'); ?>
    <script>
        var base_url = 'https://' + document.domain + '/';
        var base_url_cdn_api = 'https://ajax.gogo-load.com/';
        var api_anclytic = 'https://ajax.gogo-load.com/anclytic-ajax.html';
    </script>
    <script type="text/javascript" src="https://cdn.gogocdn.net/files/gogo/js/main.js?v=7.1"></script>
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
                            <div class="anime_name anime_list">
                                <i class="icongec-anime_list i_pos"></i>
                                <h2>ANIME LIST</h2>
                                <div class="anime_name_pagination">
                                    <div class="pagination">
                                    <ul class='pagination-list'><?php $pagination = file_get_contents("$apiLink/getAnimeListPage/$aph/$page");$pagination = json_decode($pagination, true); echo str_replace("active","selected",$pagination['pagination']) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="list_search">
                                <ul>
                                    <li class="first-char">
                                        <a href="/anime-list" rel="" class="">All</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-A" rel="" class="<?php if ($aph === "A"){echo "active";} else {echo "noactive";}?>">A</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-B" rel="" class="<?php if ($aph == "B"){echo "active";} else {echo "noactive";}?>">B</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-C" rel="" class="<?php if ($aph == "C"){echo "active";} else {echo "noactive";}?>">C</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-D" rel="" class="<?php if ($aph == "D"){echo "active";} else {echo "noactive";}?>">D</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-E" rel="" class="<?php if ($aph == "E"){echo "active";} else {echo "noactive";}?>">E</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-F" rel="" class="<?php if ($aph == "F"){echo "active";} else {echo "noactive";}?>">F</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-G" rel="" class="<?php if ($aph == "G"){echo "active";} else {echo "noactive";}?>">G</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-H" rel="" class="<?php if ($aph == "H"){echo "active";} else {echo "noactive";}?>">H</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-I" rel="" class="<?php if ($aph == "I"){echo "active";} else {echo "noactive";}?>">I</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-J" rel="" class="<?php if ($aph == "J"){echo "active";} else {echo "noactive";}?>">J</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-K" rel="" class="<?php if ($aph == "K"){echo "active";} else {echo "noactive";}?>">K</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-L" rel="" class="<?php if ($aph == "L"){echo "active";} else {echo "noactive";}?>">L</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-M" rel="" class="<?php if ($aph == "M"){echo "active";} else {echo "noactive";}?>">M</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-N" rel="" class="<?php if ($aph == "N"){echo "active";} else {echo "noactive";}?>">N</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-O" rel="" class="<?php if ($aph == "O"){echo "active";} else {echo "noactive";}?>">O</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-P" rel="" class="<?php if ($aph == "P"){echo "active";} else {echo "noactive";}?>">P</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-Q" rel="" class="<?php if ($aph == "Q"){echo "active";} else {echo "noactive";}?>">Q</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-R" rel="" class="<?php if ($aph == "R"){echo "active";} else {echo "noactive";}?>">R</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-S" rel="" class="<?php if ($aph == "S"){echo "active";} else {echo "noactive";}?>">S</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-T" rel="" class="<?php if ($aph == "T"){echo "active";} else {echo "noactive";}?>">T</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-U" rel="" class="<?php if ($aph == "U"){echo "active";} else {echo "noactive";}?>">U</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-V" rel="" class="<?php if ($aph == "V"){echo "active";} else {echo "noactive";}?>">V</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-W" rel="" class="<?php if ($aph == "W"){echo "active";} else {echo "noactive";}?>">W</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-X" rel="" class="<?php if ($aph == "X"){echo "active";} else {echo "noactive";}?>">X</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-Y" rel="" class="<?php if ($aph == "Y"){echo "active";} else {echo "noactive";}?>">Y</a>
                                    </li>
                                    <li class="first-char">
                                        <a href="/anime-list-Z" rel="" class="<?php if ($aph == "Z"){echo "active";} else {echo "noactive";}?>">Z</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="anime_list_body">
                                <ul class="listing">
                                <?php
                                  $json = file_get_contents("$apiLink/getAnimeList/$alphabet/$page");
                                  $json = json_decode($json, true);
                                  foreach($json as $animeList)  { 
                                ?>
                                    
                                    <li title='<?php $desc = $animeList['liTitle']; echo htmlspecialchars($desc);?>'> <a href="/category/<?=$animeList['animeId']?>" title=""><?=$animeList['animeTitle']?></a></li>
                                <?php } ?>
                                </ul>
                                <div class="clr"></div>
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
    <script type="text/javascript" src="https://anikatsu.ga/files/js/video.js"></script>
    <script type="text/javascript" src="<?=$base_url?>/js/files/jquery.tinyscrollbar.min.js"></script>
    <div class="notice-400"
    style=" z-index:99999;position: fixed;bottom: 0;text-align: center;width: 100%; left: 0;padding: 10px;background: #939393;color: white;">
    We moved site to <a href="<?=$base_url?>" title="Gogoanime" alt="Gogoanime"
      style="color: #ffc119"><?=$website_name?></a>. Please bookmark new site. Thank you!
    </div>

    <script type="text/javascript" src="<?=$base_url?>/js/files/jqueryTooltip.js"></script>
    <script type="text/javascript">
        $(".listing li[title]").tooltip({ offset: [10, 200], effect: 'slide', predelay: 300 }).dynamic({ bottom: { direction: 'down', bounce: true } });
    </script>
    <style type="text/css">
        .hide {
            display: none;
        }

        .anime_list_body,
        .anime_list_body ul {
            width: 100%;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -mos-box-sizing: border-box;
        }

        .anime_list_body ul li,
        .anime_list_body ul li a {
            white-space: nowrap;
            overflow: hidden;
            padding-right: 10px;
            display: block;
        }

        .anime_list_body {
            padding: 14px 18px;
        }

        .anime_list_body ul li a {
            line-height: 115%;
        }
    </style>

    <script>
        if (document.getElementById('scrollbar2')) {
            $('#scrollbar2').tinyscrollbar();
        }
    </script>
</body>

</html>