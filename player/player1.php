<?php
require('../php/info.php');

$id = $_GET['id'];

$json = file_get_contents("$apiLink/vidcdn/watch/$id");
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
    <title>Video Player</title>
    <!-- Include VidStack player styles -->
    <link rel="stylesheet" href="https://cdn.vidstack.io/player/theme.css">
    <link rel="stylesheet" href="https://cdn.vidstack.io/player/video.css">
</head>
<body>
    <!-- Player container -->
    <div id="playerContainer"></div>

    <!-- Include VidStack player script -->
    <script type="module">
        import { VidstackPlayer, VidstackPlayerLayout } from 'https://cdn.vidstack.io/player';

        async function createPlayer() {
            const player = await VidstackPlayer.create({
                target: '#playerContainer',
                title: 'Title',
                src: '<?php echo $m3u8_url; ?>',
                // Optional: Add a poster image
                poster: 'anime.jpg',
                layout: new VidstackPlayerLayout({
                    // Optional: Add thumbnails
                    thumbnails: 'https://example.com/thumbnails.vtt'
                })
            });
        }

        createPlayer();
    </script>
</body>
</html>
