<?php 
require_once('./php/info.php'); 
$parts=parse_url($_SERVER['REQUEST_URI']); 
$page_url=explode('/', $parts['path']);
$url = $page_url[count($page_url)-1]  ;
//$url = "naruto";
$json = file_get_contents("$apiLink/getAnime/$url");
$fetchDetails = json_decode($json, true);
$episodeArray = $fetchDetails['episode_id'];


$json1 = file_get_contents("$consumet/anime/gogoanime/info/$url");
$fetchdetailss = json_decode($json1, true);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="shortcut icon" href="<?=$base_url?>/img/favicon.ico" />
  <title><?=$fetchDetails['name']?> at <?=$website_name?></title>

  <meta name="robots" content="index, follow" />
  <meta name="description" content="<?=substr($fetchDetails['synopsis'],0, 150)?> ... at <?=$website_name?>" />
  <meta name="keywords" content="<?=$fetchDetails['name']?>, <?=$fetchDetails['othername']?>">
  <meta itemprop="image" content="<?=$fetchDetails['imageUrl']?>" />

  <meta property="og:site_name" content="<?=$website_name?>" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?=$fetchDetails['name']?> at <?=$website_name?>" />
  <meta property="og:description" content="<?=substr($fetchDetails['synopsis'],0, 150)?> ... at <?=$website_name?>"">
  <meta property="og:url" content="<?=$base_url?><?php echo $_SERVER['REQUEST_URI'] ?>" />
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
              <div class="anime_name anime_info">
                <i class="icongec-anime_info i_pos"></i>
                <h2>ANIME INFO</h2>
              </div>
              <div class="anime_info_body">
                <div class="anime_info_body_bg">
                  <img src="<?=$fetchDetails['imageUrl']?>">
                  <h1><?=$fetchDetails['name']?></h1>
                  <!---<p><a class="bookmark bookmark-manage" href="javascript:void(0)"><i></i>Click to manage book marks</a>
                  </p> --->
                  <p class="type"><span>Type: </span><?=$fetchDetails['type']?></p>
                  <p class="type"><span>Plot Summary: </span><?=$fetchdetailss['description']?></p>
                  <p class="type"><span>Genre: </span> <?php echo implode(', ', $fetchdetailss['genres'])?></p>
                  <p class="type"><span>Released: </span><?=$fetchdetailss['releaseDate']?></p>
                  <p class="type"><span>Episodes: </span><?php echo count($fetchDetails['episode_id'])?></p>
                  <p class="type"><span>Status: </span>
                    <a href="<?php if ($fetchdetailss['status'] == 'Completed') {echo "/status/completed"; }   else  {echo "/status/ongoing";} ?>" title="<?=$fetchdetailss['status']?> Anime"><?=$fetchdetailss['status']?></a>
                  </p>
                  <p class="type"><span>Other name: </span><?=$fetchdetailss['otherName']?></p>
                </div>
                <div class="clr"></div>
                <div class="anime_info_episodes">
                  <h2><?=$fetchDetails['name']?></h2>
                  <div class="anime_info_episodes_next">
                  <?=$fetchDetails['episode_info_html']?>

                </div>
                </div>

              </div>
              <div class="anime_video_body" style="padding: 0 20px 20px 20px;" >
                         <ul id="episode_page">

                          <?=$fetchDetails['episode_page']?>
                          
                        </ul>
                   <div class="clr"></div>
                   <div id="load_ep"></div>
                   <div class="clr"></div>
       </div>
       <div class="clr"></div>
    <div class="clr"></div>
              <div class="anime_info_body">

                <div class="anime_video_body_comment_name">
                  <div class="btm-center">
                    <div id="specialButton" class="specialButton">
                      <span class="txt">Show</span> <a
                        href="#disqus_thread">Comments </a>
                    </div>
                  </div>
                </div>
                <div id="disqus_thread"></div>
                <script>
                  var disqus_config = function () {
                    this.page.url = '<?=$base_url?><?php echo $_SERVER['REQUEST_URI'] ?>';
                  };
                  (function () {  // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');

                    s.src = 'https://gogoanimesz.disqus.com/embed.js';

                    s.setAttribute('data-timestamp', +new Date());

                    (d.head || d.body).appendChild(s);
                  })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

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
  <?php include('./php/include/footer.php'); ?>


  <!---- <script>
    var elm = '.bookmark';
    $(elm).click(function (e) { $(".mask").fadeIn(); $('.login-popup').fadeIn(); e.stopPropagation(); e.preventDefault() });

  </script> ---->

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
  <script id="dsq-count-scr" src="//gogoanimesz.disqus.com/count.js" async></script>
</body>
</html>
