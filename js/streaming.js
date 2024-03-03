// const url = window.location.pathname.replace("/", "");
const url = "naruto-episode-1"
const apiURl = `https://api-indianime.herokuapp.com`;

// Declaring Gobally
const apiUrlEpisodeDetail = `${apiURl}/getEpisode/${url}`;

function loadEpisodeDetail() {
    async function loadDetail() {
        const response = await fetch(apiUrlEpisodeDetail);
        const episodeDetail = await response.json();
        document.title = `${episodeDetail['animenamewithep']} at GogoAnime`;
        const iframez = document.getElementById('iframez');
        iframez.setAttribute('src', `${episodeDetail['video']}`);
        const dowloads = document.getElementById('dowloads');
        dowloads.setAttribute('href', `${episodeDetail['ep_download']}`);
        const animeCategory = document.getElementById('animeCategory');
        animeCategory.setAttribute('href', `${episodeDetail['anime_info']}`);
        const animeTitle = document.getElementById("animeTitle");
        animeTitle.innerHTML = `${episodeDetail['animenamewithep']}`
        const animeTitle2 = document.getElementById('animeTitle2');
        animeTitle2.innerHTML = `<h1>${episodeDetail['animenamewithep']} at GogoAnime</h1>`;


        //Example - ${episodeDetail['anime_info']} - category/naruto
        let animeCategoryName = `${episodeDetail['anime_info']}`;
        function animeDetails() {
            const apiUrlAnimeDetails = `${apiURl}/getAnime/${animeCategoryName.replace("/category/", "")}`
            async function loadAnimeDetails() {
                const response = await fetch(apiUrlAnimeDetails);
                const animeDetail = await response.json();
                //console.log(animeDetail['name']);
                animeCategory.innerHTML = `${animeDetail['name']}`;
                animeCategory.setAttribute('title', `${animeDetail['name']}`);
                let aboutAnime = `${animeDetail['about']}`;
                let aboutAnimeFinal = aboutAnime.replace("Plot Summary: ", "")
                //console.log(aboutAnimeFinal)
                function metaHeadTag() {

                    let itemprop = document.createElement('meta');
                    itemprop.setAttribute('itemprop', 'image');
                    itemprop.setAttribute('content', `${animeDetail['img_url']}`);
                    document.getElementsByTagName('head')[0].appendChild(itemprop);

                    let ogtitle = document.createElement('meta');
                    ogtitle.setAttribute('property', 'og:title');
                    ogtitle.setAttribute('content', `Watch ${episodeDetail['animenamewithep']} at GogoAnime`);
                    document.getElementsByTagName('head')[0].appendChild(ogtitle);

                    let ogdescription = document.createElement('meta');
                    ogdescription.setAttribute('property', 'og:description');
                    ogdescription.setAttribute('content', `${aboutAnimeFinal}`);
                    document.getElementsByTagName('head')[0].appendChild(ogdescription);

                    let ogimage = document.createElement('meta');
                    ogimage.setAttribute('property', 'og:image');
                    ogimage.setAttribute('content', `${animeDetail['img_url']}`);
                    document.getElementsByTagName('head')[0].appendChild(ogimage);



                }
                metaHeadTag();

                // Episode List 
                function loadEpisode() {
                    let episodes = animeDetail['episode_id'];
                    let episode_related = document.getElementById('episode_related');
                    let episodeHTML = "";
                    let episodeContent;
                    episodes.forEach(function (element, index) {
                        if (element == url) {
                            activeClass = "active"
                        } else {
                            activeClass = ""
                        }
                        episodeContent = `
                    <li>
                      <a href="${element}" class="${activeClass}">
                        <div class="name"><span>EP</span> ${index + 1}</div>
                        <div class="vien"></div>
                        <div class="cate">SUB</div>
                      </a>
                    </li>
                    `
                        episodeHTML += episodeContent;

                    })
                    episode_related.innerHTML = episodeHTML;
                    //console.log(episodeContent)

                    function previousEpisode() {
                        let anime_video_body_episodes_l = document.getElementById('anime_video_body_episodes_l');
                        const epNumber = episodeDetail['ep_num'];
                        prevEpisode = epNumber - 1
                        arrayLink = prevEpisode - 1
                        
                        //console.log(prevEpisode)
                        let previosHTML = "";
                        let previosHTMLContent;
                        if (prevEpisode > 0) {
                            previosHTMLContent = `
                       <a href="${episodes[arrayLink]}">
                          &lt;&lt; ${animeDetail['name']} Episode ${parseInt(episodeDetail['ep_num']) - 1}
                       </a>
                       `
                            
                        } else {
                            previosHTMLContent = "";
                        }
                        previosHTML += previosHTMLContent;
                        anime_video_body_episodes_l.innerHTML = previosHTML;
                    }
                    previousEpisode();

                    function nextEpisode(){
                        let anime_video_body_episodes_r = document.getElementById('anime_video_body_episodes_r');
                        //console.log(lastEpisode);
                        let lastEpisode = animeDetail['episode_id'].length
                        let nextEpisodeHTML = ""
                        let nextEpisodeContent;
                        let currentEpisode = parseInt(episodeDetail['ep_num']);
                        //console.log(currentEpisode)
                        if (currentEpisode < lastEpisode){
                            nextEpisodeContent = `
                             <a href="${episodes[parseInt(episodeDetail['ep_num'])]}">
                               ${animeDetail['name']} Episode ${parseInt(episodeDetail['ep_num']) + 1} >>
                             </a>
                            `
                        } else {
                            nextEpisodeContent = ""
                        }
                        nextEpisodeHTML += nextEpisodeContent;
                        anime_video_body_episodes_r.innerHTML = nextEpisodeHTML;
                    }
                    nextEpisode()
    
                }

                
                loadEpisode();

              

            }
            loadAnimeDetails();



        }
        animeDetails();

        return episodeDetail;
    };
    loadDetail();
};

loadEpisodeDetail();
function loadRecentRelease() {
    async function loadRecent() {
        const apiUrlRecentReleases = `${apiURl}/getRecent/1`;
        const response = await fetch(apiUrlRecentReleases);
        const recentReleases = await response.json();
        //console.log(recentReleases);
        const recentEpisodesContainer = document.getElementById('recentEpisodes');
        let recentEpisodesHTML = "";
        let recentEpisodesContent;

        recentReleases.forEach(function (element) {
            recentEpisodesContent = `
            <li>
             <a href="${element['r_anime_id']}"
              title="${element['r_name']}">
              <div class="thumbnail-recent"
                style="background: url('${element['r_img_url']}');">
              </div>
              ${element['r_name']}
             </a>
             <a href="${element['r_anime_id']}"
              title="${element['r_name']}">
              <p class="time_2">${element['episode_num']}</p>
             </a>
            </li>
            `;
            recentEpisodesHTML += recentEpisodesContent;
        });
        recentEpisodesContainer.innerHTML = recentEpisodesHTML;
    }
    loadRecent();
}
loadRecentRelease();