<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('./php/info.php'); 
$parts = parse_url($_SERVER['REQUEST_URI']); 
$page_url = explode('/', $parts['path']);
$url = $page_url[count($page_url)-1];

$getAnime = file_get_contents("$apiLink/getAnime/$url");
$getAnime = json_decode($getAnime, true);

// Check if 'episode_id' key exists before accessing it
$episodelist = isset($getAnime['episode_id']) ? $getAnime['episode_id'] : '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="shortcut icon" href="<?=$base_url?>/img/favicon.ico" />
  <title><?= isset($getAnime['name']) ? $getAnime['name'] : 'Anime Details' ?> at <?=$website_name?></title>

  <meta name="robots" content="index, follow" />
  <meta name="description" content="<?= isset($getAnime['synopsis']) ? substr($getAnime['synopsis'], 0, 150) : '' ?> ... at <?=$website_name?>" />
  <meta name="keywords" content="<?= isset($getAnime['name']) ? $getAnime['name'] : '' ?>, <?= isset($getAnime['othername']) ? $getAnime['othername'] : '' ?>">
  <meta itemprop="image" content="<?= isset($getAnime['imageUrl']) ? $getAnime['imageUrl'] : '' ?>" />

  <meta property="og:site_name" content="<?=$website_name?>" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?= isset($getAnime['name']) ? $getAnime['name'] : 'Anime Details' ?> at <?=$website_name?>" />
  <meta property="og:description" content="<?= isset($getAnime['synopsis']) ? substr($getAnime['synopsis'], 0, 150) : '' ?> ... at <?=$website_name?>" />
  <meta property="og:url" content="<?=$base_url?><?php echo $_SERVER['REQUEST_URI'] ?>" />
  <meta property="og:image" content="<?= isset($getAnime['imageUrl']) ? $getAnime['imageUrl'] : '' ?>" />
  <meta property="og:image:secure_url" content="<?= isset($getAnime['imageUrl']) ? $getAnime['imageUrl'] : '' ?>" />

  <link rel="canonical" href="<?=$base_url?><?php echo $_SERVER['REQUEST_URI'] ?>" />
  <link rel="alternate" hreflang="en-us" href="<?=$base_url?><?php echo $_SERVER['REQUEST_URI'] ?>" />

  <link rel="stylesheet" type="text/css" href="<?=$base_url?>/css/style.css" />
  <script type="text/javascript" src="<?=$base_url?>/js/libraries/jquery.js"></script>
  <script>
        var base_url = 'https://' + document.domain + '/';
        var base_url_cdn_api = 'https://ajax.gogo-load.com/';
        var api_anclytic = 'https://ajax.gogo-load.com/anclytic-ajax.html';
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
                  <img src="<?= isset($getAnime['imageUrl']) ? $getAnime['imageUrl'] : '' ?>">
                  <h1><?= isset($getAnime['name']) ? $getAnime['name'] : 'Unknown' ?></h1>
                  <p class="type"><span>Type: </span><?= isset($getAnime['type']) ? $getAnime['type'] : 'Unknown' ?></p>
                  <p class="type"><span>Plot Summary: </span><?= isset($getAnime['synopsis']) ? $getAnime['synopsis'] : 'Unknown' ?></p>
                  
                  <p class="type"><?= isset($getAnime['released']) ? $getAnime['released'] : 'Unknown' ?></p>
                  <p class="type"><?= isset($getAnime['othername']) ? $getAnime['othername'] : 'Unknown' ?></p>
                  <p class="type">
                                        <span>Language:</span> 
                                            <?php $str = $getAnime['name'];
                                                $last_word_start = strrpos ( $str , " ") + 1;
                                                $last_word_end = strlen($str) - 1;
                                                $last_word = substr($str, $last_word_start, $last_word_end);
                                                if ($last_word == "(Dub)"){echo "Dubbed";} else {echo "Subbed";}
                                            ?>
                                      </p>
                                      <div class="film-description m-hide">

                </div>
                <div class="clr"></div>
                <div class="anime_info_episodes">
                  <h2><?= isset($getAnime['name']) ? $getAnime['name'] : 'Unknown' ?></h2>
                  <div class="anime_info_episodes_next">
                    <?= isset($getAnime['episode_info_html']) ? $getAnime['episode_info_html'] : '' ?>
                  </div>
                </div>
              </div>
              <div class="anime_video_body" style="padding: 0 20px 20px 20px;" >
                <ul id="episode_page">
                  <?= isset($getAnime['episode_page']) ? $getAnime['episode_page'] : '' ?>
                </ul>
                <div class="clr"></div>
                <div id="load_ep"></div>
                <div class="clr"></div>
              </div>
              <div class="clr"></div>
              <div class="clr"></div>
              <div class="anime_info_body">
                <script id="dsq-count-scr" src="//kitsunime.disqus.com/count.js" async></script>
                <div class="anime_video_body_comment_name">
                  <div class="btm-center">
                    <div id="specialButton" class="specialButton">
                      <span class="txt">Show</span> <a href="#disqus_thread">Comments </a>
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

                    s.src = '//kitsunime.disqus.com/embed.js';

                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                  })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
              </div>
            </div>
            <div class="clr"></div>
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
              <h3>About us</h3>
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
</body>
</html>
