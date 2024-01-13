<?php require_once('./php/info.php')?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="<?=$base_url?>/img/favicon.ico">

<title>Pages not found</title>

<meta name="robots" content="index, follow" />
<meta name="description" content="Watch anime online in English. You can watch free series and movies online and English subtitle.">
<meta name="keywords" content="gogoanime,watch anime, anime online, free anime, english anime, sites to watch anime">
<meta itemprop="image" content="<?=$base_url?>/img/logo.png"/>

<meta property="og:site_name" content="Gogoanime"/>
<meta property="og:locale" content="en_US"/>
<meta property="og:type" content="website"/>
<meta property="og:title" content="Pages not found"/>
<meta property="og:description" content="Watch anime online in English. You can watch free series and movies online and English subtitle.">
<meta property="og:url" content=""/>
<meta property="og:image" content="<?=$base_url?>/img/logo.png"/>
<meta property="og:image:secure_url" content="<?=$base_url?>/img/logo.png"/>

<meta property="twitter:card" content="summary"/>
<meta property="twitter:title" content="Pages not found"/>
<meta property="twitter:description" content="Watch anime online in English. You can watch free series and movies online and English subtitle."/>

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
	<div class="anime_name new_series">
		<i class="icongec-new_series i_pos">
		</i>
		<h2>404 Not Found
		</h2>
	</div>
    <h1 class="entry-title" style="text-align: center;padding: 20px 0;">Error 404</h1>
 </div>

                </section>
                 <section class="content_right">
                    
                                        
                    <div class="clr"></div>
                                            <div class="main_body">
     <div class="main_body_black">
          <div class="anime_name ongoing">
              <i class="icongec-ongoing i_pos"></i><h2>RECENT RELEASE</h2>
          </div>
          <div class="recent">
           <!-- begon -->
          <div id="scrollbar2">
          <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
            <div class="viewport">
                 <div class="overview">
               			<?php require('./php/include/recentRelease.php'); ?>
                 </div>
            </div>
        </div>	
          <!-- tao thanh cuon 1-->  
          </div>
     </div>
</div>
<div class="clr"></div>
<style type="text/css">
	#load_ads_2{width: 300px;}
	#load_ads_2.sticky{position:fixed;top: 0;}
    #scrollbar2 .viewport { height: 1000px !important; }
</style>
                                <?php include('./php/include/sub-category.html');?>
                 </section>                                                                              
            </section>                
            <div class="clr"></div>
<footer>
  <div class="menu_bottom">
    <a href="/about-us.html"><h3>Abouts us</h3></a>
    <a href="/contact-us.html"><h3>Contact us</h3></a>
    <a href="/privacy.html"><h3>Privacy</h3></a>
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
<script>
if(document.getElementById('scrollbar2')){
    $('#scrollbar2').tinyscrollbar();
}
</script>
</body>
</html>