<?php 
require_once('./php/info.php'); 
$parts=parse_url($_SERVER['REQUEST_URI']); 
$page_url=explode('/', $parts['path']);
$url = $page_url[count($page_url)-1];
//$url = "naruto-episode-112";
$json = file_get_contents("$apiLink/getEpisode/$url");
$anime = json_decode($json, true);
$ep_num = $anime['ep_num'];

$categoryURL = $anime['anime_info'];
$json2 = file_get_contents("$apiLink/getAnime/$categoryURL");
$fetchDetails = json_decode($json2, true); 
$episodeArray = $fetchDetails['episode_id'];    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="shortcut icon" href="<?=$base_url?>/img/favicon.ico">

  <title>Watch <?=$anime['animeNameWithEP']?> at <?=$website_name?></title>

  <meta name="robots" content="index, follow" />
  <meta name="description" content="<?=substr($fetchDetails['synopsis'],0, 150)?> ... at <?=$website_name?>">
  <meta name="keywords" content="<?=$anime['animeNameWithEP']?>, <?=$fetchDetails['name']?>, Ep <?=$anime['ep_num']?> ,English, Subbed">
  <meta itemprop="image" content="<?=$fetchDetails['imageUrl']?>" />

  <meta property="og:site_name" content="<?=$website_name?>" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Watch <?=$anime['animeNameWithEP']?> at <?=$website_name?>" />
  <meta property="og:description" content="<?=substr($fetchDetails['synopsis'],0, 150)?> ... at <?=$website_name?>">
  <meta property="og:url" content="" />
  <meta property="og:image" content="<?=$fetchDetails['imageUrl']?>" />
  <meta property="og:image:secure_url" content="<?=$fetchDetails['imageUrl']?>" />

  <link rel="canonical" href="<?=$base_url?><?php echo $_SERVER['REQUEST_URI'] ?>" />
  <link rel="alternate" hreflang="en-us" href="<?=$base_url?><?php echo $_SERVER['REQUEST_URI'] ?>" />
  <link rel="stylesheet" type="text/css" href="<?=$base_url?>/css/style.css" />
  <script type="text/javascript" src="<?=$base_url?>/js/libraries/jquery.js"></script>
  <script>
    var base_url = 'https://' + document.domain + '/';
    var base_url_cdn_api = 'https://ajax.gogocdn.net/';
    var api_anclytic = 'https://ajax.gogocdn.net/anclytic-ajax.html';
   </script>
  <script type="text/javascript" src="https://cdn.gogocdn.net/files/gogo/js/main.js"></script>

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

                        <div class="main_body">
                            <div class="anime_name anime_video">
                                <i class="icongec-anime_video i_pos"></i>
                                <div class="title_name">
                                    <h2><?=$anime['animeNameWithEP']?></h2>
                                </div>
                                <div class="link_face"><a class="btn facebook hidden-phone" href="javascript:;"
                                        onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('<?=$base_url?><?php echo $_SERVER['REQUEST_URI'] ?>') + '', 'facebook-share-dialog', 'width=626,height=436');return false;">
                                    </a>

                                    <a class="btn twitter hidden-phone" href="https://twitter.com/share" target="_blank"
                                        data-url="<?=$base_url?><?php echo $_SERVER['REQUEST_URI'] ?>"></a>
                                </div>
                            </div>
                            <div class="anime_video_body">
                                <h1><?=$anime['animeNameWithEP']?> at <?=$website_name?></h1>
                                <div class="anime_video_body_cate">
                                    <span>Category:</span> <?=$fetchDetails['type']?>
                                    <div class="anime-info">
                                        <span>Anime info:</span>
                                        <a href="/category/<?=$anime['anime_info']?>" title="<?=$fetchDetails['name']?>"><?=$fetchDetails['name']?></a>
                                    </div>

                                    &nbsp;
                                    <div class="anime_video_note_watch">
                                        Please, <a onclick="freload()" href="javascript:void(0)">reload page</a> if you
                                        can't watch the video
                                    </div>
                                    <div style="max-height:300px;overflow:hidden;">
                                        
                                    </div>
                                    <div class="download-anime">
                                        <div class="anime_video_note_watch">
                                            <div class="anime_video_body_report" style="top:7px;">
                                                <!---<a class="report-ajax" href="javascript:void(0)">Report this
                                                    Episode!</a> --->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="favorites_book">
                                        <ul>
                                            <li class="dowloads"><a
                                                    href="<?=$anime['ep_download']?>"
                                                    target="_blank"><i
                                                        class="icongec-dowload"></i><span>Download</span></a></li>
                                            <!---<li class="favorites"><i class="icongec-fa-heart"></i><span>Add to
                                                    Favorites</span></li>-->
                                        </ul>
                                    </div>
                                </div>
                                <div class="clr"></div>
                                <div class="anime_video_body_watch">
                                    <div id="load_anime">
                                        <!------------------ vidstream.io server type = 1  display --------------->
                                        <div class="anime_video_body_watch_items load">
                                            <div class="play-video">
                                                <iframe
                                                    src="https://player.ryuk.to/index.php?id=<?=$url?>&download=<?=$anime['ep_download']?>"
                                                    allowfullscreen="true" frameborder="0" marginwidth="0"
                                                    marginheight="0" scrolling="no"></iframe>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="anime_video_body_episodes">
                                    <div class="anime_video_body_episodes_l">
                                      <a href='<?=$anime['prevEpLink']?>'><?=$anime['prevEpText']?></a>
                                    </div>
                                    <div class="anime_video_body_episodes_r">
                                      <a href='<?=$anime['nextEpLink']?>'><?=$anime['nextEpText']?></a>
                                    </div>
                                </div>
                                <div class="clr"></div>
                                
                                <div class="clr"></div>
                                <div class="clr"></div>
                                <div style="margin-top:20px;color:#00a651;font-size:18px;">Please scroll down for servers choosing, thank you.</div>
                                <br>

                                
                                <div class="clr"></div>

                                <div class="anime_muti_link">
                                    <ul>
                                        <li class="anime">
                                            <a href="#" class="active" rel="1"
                                                data-video="https://player.ryuk.to/index.php?id=<?=$url?>&download=<?=$anime['ep_download']?>"><i
                                                    class="iconlayer-server hydrax"></i>No Ads<span>Choose this
                                                    server</span></a>
                                        </li>
                                        <li class="anime">
                                            <a href="#" rel="13"
                                                data-video="<?=$anime['video']?>"><i
                                                    class="iconlayer-anime"></i>Vidstreaming<span>Choose this
                                                    server</span></a>
                                        </li>
                                        <li class="vidcdn">
                                            <a href="#" rel="100"
                                                data-video="<?=$anime['gogoserver']?>"><i
                                                    class="iconlayer-anime"></i>Gogo server<span>Choose this
                                                    server</span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="clr"></div>
                                <div class="anime_video_body_comment">
                                    <div class="anime_video_body_comment_name">
                                        <div class="btm-center">
                                            <script id="dsq-count-scr" src="//gogoanimetv.disqus.com/count.js"
                                                async></script>
                                            <div id="specialButton" class="specialButton">
                                                <span class="txt">Show</span> <a
                                                    href="<?=$base_url?><?=$url?>#disqus_thread">Comments
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="divComments" class="disq">
                                        <div class="anime_video_body_comment_center">
                                            <div id="disqus_thread"></div>
                                        </div>
                                        <script>
                                            var disqus_config = function () {
                                                this.page.url = '<?=$base_url?><?=$url?>';
                                            };
                                            (function () {  // DON'T EDIT BELOW THIS LINE
                                                var d = document, s = d.createElement('script');

                                                s.src = '//gogoanimetv.disqus.com/embed.js';

                                                s.setAttribute('data-timestamp', +new Date());
                                                (d.head || d.body).appendChild(s);
                                            })();
                                        </script>
                                        <noscript>Please enable JavaScript to view the <a
                                                href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered
                                                by Disqus.</a></noscript>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clr"></div>
                        <div class="main_body">
                            <div class="anime_name episode_video">
                                <i class="icongec-episode_video i_pos"></i>
                                <h2>Related episode</h2>
                            </div>
                            <div class="clr"></div>
                            <div class="anime_video_body">
                              
                            <input type="hidden" value="<?=$anime['movie_id']?>" id="movie_id" class="movie_id"/>
                            <input type="hidden" value="<?=$anime['ep_num']?>" id="default_ep" class="default_ep"/>
                            <input type="hidden" value="<?=$anime['alias']?>" id="alias_anime" class="alias_anime"/>
                            <ul id="episode_page">
                                <?=$anime['episode_page']?>
                            </ul>
                              <div class="clr"></div>
                              <div id="load_ep"></div>
                              <div class="clr"></div>
                            </div>
                        </div>
                        <div class="clr"></div>

                    </section>
                    <section class="content_right">
                    <div class="headnav_center"></div>

                        <div class="clr"></div>
                        <div class="main_body">
                            <div class="main_body_black">
                                <div class="anime_name ongoing">
                                    <i class="icongec-ongoing i_pos"></i>
                                    <h2>RECENT RELEASE</h2>
                                </div>
                                <div class="recent">
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
    <?php include('./php/include/footer.php'); ?>
    <script>
    if(document.getElementById('episode_page')){
      var ep_start = $('#episode_page a.active').attr('ep_start');
      var ep_end = $('#episode_page a.active').attr('ep_end');
      var id = $("input#movie_id").val();
      var default_ep = $("input#default_ep").val();
      var alias = $("input#alias_anime").val();
      loadListEpisode('#episode_page a.active',ep_start,ep_end,id,default_ep,alias);
    }
  </script>
    <script>
        if (document.getElementById('scrollbar2')) {
            $('#scrollbar2').tinyscrollbar();
        }
    </script>
</body>
</html>