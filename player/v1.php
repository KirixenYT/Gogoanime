<?php 
require('../php/info.php');
$id = $_GET['id']; 
$download = $_GET['download']; 
$json = file_get_contents("$apiLink/vidcdn/watch/$id");
$json = json_decode($json, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Adless Player</title>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
<script src='<?=$base_url?>/js/files/jwplayer.js'></script>
<style type="text/css">
        body {background-color: #000;}
    </style>
</head>
<body>
<div id="myElement"></div>
<script type="text/javascript">
  var playerInstance = jwplayer("myElement");
  playerInstance.setup({
             
      sources: <?php echo json_encode($json) ?>,  
                    autostart: false,  
    image: "",

    abouttext: "<?=$website_name?>",
    aboutlink: "<?=$base_url?>"             
    });

  playerInstance.addButton(
   'https://i.imgur.com/rGeixXQ.png',
   'Download', 
   function () {
       var win = window.open("<?=$download?>","_blank");
               win.focus();
        },
'download'
);

    
  
  </script>
</body>
</html> 