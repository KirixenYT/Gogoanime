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
<div class="bg-notice" style="position:fixed;z-index:9999;background:#ffc119;bottom:0;text-align:center;color:#000;width:100%;padding:10px 0;font-weight:600;">We moved site to <a href="<?=$base_url?>" title="<?=$base_url?>" alt="Gogoanime"><?=$base_url?></a>. Please bookmark new site. Thank you!</div><div class="btn-notice" style="position:fixed;z-index:9999;background:#00a651;color:#fff;cursor:pointer;right:0;padding:3px 8px;">x</div>