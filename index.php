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

    <title><?=$website_name?> | Watch anime online, English anime online HD</title>

    <meta name="robots" content="index, follow" />
    <meta name="description"
        content="Watch anime online in English. You can watch free series and movies online and English subtitle.">
    <meta name="keywords"
        content="gogoanime,watch anime, anime online, free anime, english anime, sites to watch anime">
    <meta itemprop="image" content="<?=$base_url?>/img/logo.png" />

    <meta property="og:site_name" content="<?=$website_name?>" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?=$website_name?> | Watch anime online, English anime online HD" />
    <meta property="og:description"
        content="Watch anime online in English. You can watch free series and movies online and English subtitle.">
    <meta property="og:url" content="" />
    <meta property="og:image" content="<?=$base_url?>/img/logo.png" />
    <meta property="og:image:secure_url" content="<?=$base_url?>/img/logo.png" />

    <meta property="twitter:card" content="summary" />
    <meta property="twitter:title" content="<?=$website_name?> | Watch anime online, English anime online HD" />
    <meta property="twitter:description"
        content="Watch anime online in English. You can watch free series and movies online and English subtitle." />

    <link rel="canonical" href="<?=$base_url?>" />
    <link rel="alternate" hreflang="en-us" href="<?=$base_url?>" />



    <link rel="stylesheet" type="text/css" href="<?=$base_url?>/css/style.css" />

    <script type="text/javascript" src="<?=$base_url?>/js/libraries/jquery.js"></script>
    <script>
        var base_url = 'https://' + document.domain + '/';
        var base_url_cdn_api = 'https://ajax.gogo-load.com/';
        var api_anclytic = 'https://ajax.gogo-load.com/anclytic-ajax.html';
    </script>
    <script type="text/javascript" src="https://cdn.gogocdn.net/files/gogo/js/main.js?v=6.9"></script>

    <?php require_once('./php/advertisments/popup.html'); ?>
    
</head>

<body>
    <div class="clr"></div>
    <div id="wrapper_inside">
        <div id="wrapper">
            <div id="wrapper_bg">
                <?php require_once('./php/include/header.php'); ?>
                <section class="content">
                    <section class="content_left">

                        <h1 class="seohiden">Gogoanime | Watch anime online, English anime online HD</h1>
                        <!-- Recent Release--->
                        <div class="main_body">
                            <div id="load_recent_release">
                                <input type="hidden" id="type" name="type" value="1" />
                                <div class="anime_name recent_release">
                                    <i class="icongec-recent_release i_pos"></i>
                                    <h2><a href="javascript:void(0)" class="dub active" rel="1">Recent Release</a> <span
                                            style="padding:0 10px; color:#010101;">|</span> <a href="javascript:void(0)"
                                            class="dub " rel="2">DUB</a><span class="chinese"
                                            style="padding:0 10px; color:#010101;">|</span> <a href="javascript:void(0)"
                                            class="dub chinese " rel="3">Chinese</a></h2>
                                    <div class="anime_name_pagination intro">
                                        <div class="pagination recent">
                                            <ul class='pagination-list'>
                                                <li class=selected><a href='?page=1' data-page='1'>1</a></li>
                                                <li><a href='?page=2' data-page='2'>2</a></li>
                                                <li><a href='?page=3' data-page='3'>3</a></li>
                                                <li><a href='?page=4' data-page='4'>4</a></li>
                                                <li><a href='?page=5' data-page='5'>5</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="last_episodes loaddub">
                                    <ul class="items">
                                        <?php
                                          $json = file_get_contents("$apiLink/recent-release?page=$page&type=1");
                                          $json = json_decode($json, true);
                                          foreach($json as $recentRelease)  { 
                                        ?>
                                        <li>
                                            <div class="img">
                                                <a href="/<?=$recentRelease['episodeId']?>"
                                                    title="<?=$recentRelease['name']?>">
                                                    <img src="<?=$recentRelease['imgUrl']?>"
                                                        alt="<?=$recentRelease['name']?>" />
                                                    <div class="type ic-SUB"></div>
                                                </a>
                                            </div>
                                            <p class="name"><a href="/<?=$recentRelease['episodeId']?>"
                                                    title="<?=$recentRelease['name']?>"><?=$recentRelease['name']?></a></p>
                                            <p class="episode">Episode <?=$recentRelease['episodeNum']?></p>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="clr"></div>
                        <!--/ Recent Release--->
                        <!-- Featured Comedy / Romance Anime--->
                        <div class="main_body">
                            <div id="load_popular_ongoing">

                            </div>
                        </div>
                        <div class="clr"></div> <!-- /Featured Comedy / Romance Anime--->

                        <!-- Recently Added Series--->
                        <div class="main_body none">
                            <div class="anime_name added_series">
                                <i class="icongec-added_series i_pos"></i>
                                <h2>Recently Added Series</h2>
                            </div>
                            <div class="added_series_body final">
                                <ul class="listing">
                                <?php
                                    $json = file_get_contents("$apiLink/getRecentlyAdded");
                                    $json = json_decode($json, true);
                                    foreach(array_slice($json, 0, 20) as $recentlyAdded)  { 
                                ?>
                                    <li>
                                        <a href="<?=$recentlyAdded['animeId']?>" title="<?=$recentlyAdded['animeName']?>"><?=$recentlyAdded['animeName']?></a>
                                    </li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <!-- / Recently Added Series--->

                    </section>
                    <section class="content_right">
                        <div class="clr"></div>

                        <div class="clr"></div>
                        <div class="main_body">
                            <div class="main_body_black">
                                <div class="anime_name ongoing">
                                    <i class="icongec-ongoing i_pos"></i>
                                    <h2>ongoing series</h2>
                                </div>
                                <div class="series">
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
                                                <nav class="menu_series cron">
                                                    <ul>
                                                    <?php
                                                      $json = file_get_contents("$apiLink/getOngoingSeries");
                                                      $json = json_decode($json, true);
                                                      foreach($json as $ongoingSeries)  { 
                                                     ?>
                                                        <li>
                                                           <a href="<?=$ongoingSeries['animeId']?>"
                                                           title="<?=$ongoingSeries['animeName']?>"><?=$ongoingSeries['animeName']?></a>
                                                        </li>
                                                     <?php } ?>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- tao thanh cuon 1-->
                                </div>
                            </div>
                        </div>
                        <style type="text/css">
                            #scrollbar2 .viewport {
                                height: 600px !important;
                            }
                        </style>
                        <div class="main_body">
                            <div class="main_body_black">
                                <div class="anime_name genre">
                                    <i class="icongec-genre i_pos"></i>
                                    <h2>Genres</h2>
                                </div>
                                <div class="recent">
                                    <nav class="menu_series genre right">
                                        <?php require_once('./php/include/sidebar_genre.htm'); ?>
                                    </nav>
                                </div>
                            </div>
                        </div>
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
    <script>
        LoadFilmOngoing(1);
    </script>
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