<?php
require('../php/info.php');

$id = $_GET['id'];

// Fetch JSON data from the GoGoAnime API endpoint
$json = file_get_contents("https://gogoanime-api-1.onrender.com/vidcdn/watch/$id");
$video = json_decode($json, true);

if (isset($video['sources']) && !empty($video['sources'])) {
    $highest_quality_index = count($video['sources']) - 1;
    $m3u8_url = $video['sources'][$highest_quality_index]['file'];
} else {
    echo "Error: M3U8 URL not found in API response";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Video Player</title>
    <link href="https://vjs.zencdn.net/7.15.4/video-js.css" rel="stylesheet" />
    <link href="https://unpkg.com/@videojs/themes@1/dist/forest/index.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .video-js {
            width: 100%;
            max-width: 720px;
            height: auto;
        }

        .vjs-control-bar .vjs-play-progress {
            background: rgba(0, 255, 0, 0.7) !important;
        }
    </style>
</head>

<body>
    <video id="video-player" class="video-js vjs-theme-forest vjs-big-play-centered">
        <source src="<?php echo $m3u8_url; ?>" type="application/x-mpegURL">
    </video>

    <script src="https://vjs.zencdn.net/7.15.4/video.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/videojs-http-source-selector@1.1.6/dist/videojs-http-source-selector.min.js">
    </script>
    <script src="https://cdn.sc.gl/videojs-hotkeys/0.2/videojs.hotkeys.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/videojs-playbackrate-adjuster@1.0.0/dist/videojs-playbackrate-adjuster.min.js">
    </script>

    <script>
        var player = videojs('video-player', {
            controls: true,
            poster: 'anime.jpg',
            playbackRates: [0.5, 1, 1.5, 2],
            plugins: {
                hotkeys: {
                    enableModifiersForNumbers: false,
                    seekStep: 10
                }
            }
        });

        if (typeof player.qualityLevels === 'function') {
            player.httpSourceSelector();
        } else {
            console.warn('videojs-http-source-selector plugin is not supported.');
        }

        player.src({
            src: '<?php echo $m3u8_url; ?>',
            type: 'application/x-mpegURL'
        });

        player.ready(function () {
            player.play();
        });

        player.responsive(true);
        player.aspectRatio('16:9');
    </script>
</body>

</html>
