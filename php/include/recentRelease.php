                        <nav class="menu_recent">
                          <ul>
                          <?php
                            $json = file_get_contents("$apiLink/recent-release?type=1&page=1");
                            $json = json_decode($json, true);
                            foreach($json as $recentRelease)  { 
                           ?>
                            <li>
                              <a href="/<?=$recentRelease['episodeId']?>" title="<?=$recentRelease['name']?>">
                                <div class="thumbnail-recent"
                                  style="background: url('<?=$recentRelease['imgUrl']?>');"></div>
                                  <?=$recentRelease['name']?>
                              </a>
                              <a href="/<?=$recentRelease['episodeId']?>" title="<?=$recentRelease['name']?>">
                                <p class="time_2">Episode <?=$recentRelease['episodeNum']?></p>
                              </a>
                            </li>
                          <?php } ?>
                          </ul>
                        </nav>