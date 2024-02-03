const url = window.location.pathname.replace("/", "");
// const url = "naruto"
const apiURl = `https://kitsunime-api.onrender.com`;

function loadAnimeDetails() {
    apiUrlAnimeDetails = `${apiURl}/getAnime/${url}`
    async function loadAnime() {
        const response = await fetch(apiUrlAnimeDetails);
        const anime = await response.json();
        //console.log(anime)
        function loadDetail() {
            let name = anime['name'];
            const animeName = document.getElementById('animeName');
            animeName.innerHTML = name;
            const animeImg = document.getElementById('animeImg');
            animeImg.setAttribute('src', `${anime['img_url']}`);
            const animeInfo = document.getElementById('animeInfo');
            animeInfo.innerHTML = `<span>Plot Summary: </span>${anime['about'].replace('Plot Summary:', "")}`
            const animeReleased = document.getElementById('animeReleased');
            animeReleased.innerHTML = `<span>Released: </span>${anime['released'].replace('Released:', "")}`
            const animeOtherName = document.getElementById('animeOtherName');
            animeOtherName.innerHTML = `<span>Other name: </span>${anime['othername'].replace("Other name", "")}`
            function animeStatus() {
                let statusUrl;
                const status = anime['status'].replace('Status:', "");
                console.log(status)
                if (anime['status'] == `Status: \n                                      Completed\n                                  `) {
                    statusUrl = '/completed-anime.html'
                    title = 'Completed'
                } else {
                    statusUrl = '/ongoing-anime.html'
                    title = 'Ongoing'
                }
                const animeStatus = document.getElementById('animeStatus');
                animeStatus.innerHTML = `<span>Status: </span>
                <a href="${statusUrl}" title="${title} Anime">${status}</a>
            `
            }
            animeStatus()
            const genre = document.getElementById('genre');
            genre.innerHTML = `<span>Genre: </span>${anime['genre'].replace('Genre: ', '')}`;
            const h2title = document.getElementById('h2title');
            h2title.innerHTML = `${anime['name']}`
        }
        loadDetail()
        function loadEpisode() {
            const episode_related = document.getElementById('episode_related');
            let episode = anime['episode_id'];
            let episodeHTML = ""
            let episodeContent;
            episode.forEach(function (element, index) {
                episodeContent = `
                    <li>
                      <a href="${element}">
                        <div class="name"><span>EP</span> ${index + 1}</div>
                        <div class="vien"></div>
                        <div class="cate">SUB</div>
                      </a>
                    </li>`
                episodeHTML += episodeContent
            });
            episode_related.innerHTML = episodeHTML
        }
        loadEpisode();
    }
    loadAnime()
}
loadAnimeDetails()

function loadRecentRelease() {
    async function loadRecent() {
        const apiUrlRecentReleases = `${apiURl}/getRecentlyAdded/1`;
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

function loadDisqus(){
    document.getElementById('loadDisqus').innerHTML = `
    
    <script>
        var disqus_config = function () {
            this.page.url = 'https://gogoanime3.co/category/shadowverse-flame';
        };
        (function () {  // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');

            s.src = '//kitsunime.disqus.com/embed.js';

            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a
            href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by
            Disqus.</a></noscript>`
    let disqusHTML = `
    `

}
loadDisqus()
