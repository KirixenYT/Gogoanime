                        <nav class="menu_recent">
                          <ul>
                            <?php
                            $json = file_get_contents("$apiLink/recent-release?type=1");
                            $json = json_decode($json, true);
                            if (is_array($json)) {
                              foreach ($json as $recentRelease) {
                                ?>
                                <li>
                                  <a href="/<?= isset($recentRelease['episodeId']) ? $recentRelease['episodeId'] : 'Error' ?>" title="<?= isset($recentRelease['name']) ? $recentRelease['name'] : 'Error' ?>">
                                  <div class="thumbnail-recent" style="background: url('<?= isset($recentRelease['imgUrl']) ? $recentRelease['imgUrl'] : '' ?>');"></div>
                                  <?= isset($recentRelease['name']) ? $recentRelease['name'] : 'Error' ?>
                                </a>
                                <a href="/<?= isset($recentRelease['episodeId']) ? $recentRelease['episodeId'] : 'Error' ?>" title="<?= isset($recentRelease['name']) ? $recentRelease['name'] : 'Error' ?>">
                                <p class="time_2">Episode <?= isset($recentRelease['episodeNum']) ? $recentRelease['episodeNum'] : 'Error' ?></p>
                              </a>
                            </li>
                            <?php
                            }
                          } else {
                            echo "Error loading recent releases.";
                          }
                          ?>              
                          </ul>
                        </nav>