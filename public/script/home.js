console.log('home is where the heart is');
// console.log(document.cookie);

const cookieValue = document.cookie
    .split("; ")
    .find((row) => row.startsWith("api_key="))
    ?.split("=")[1];

/**
 * Fetch data from an url, format it with a slider and append it in the DOM
 * @param {string} url - Data url
 * @param {string} containerSelector - Css selector to append node result
 */
const sliderQuery = function (url, containerSelector) {
    const options = { method: 'GET', headers: { accept: 'application/json' } };

    // ---- MOST POPULAR ----
    fetch(url + '&api_key=' + cookieValue, options)
        .then(response => response.json())
        .then(response => {
            // console.log(response);

            const container = document.querySelector(containerSelector),
                swiperContainer = document.createElement("swiper-container");

            swiperContainer.setAttribute("slides-per-view", 5);
            swiperContainer.setAttribute("navigation", true);

            // console.log(container);

            let list = new DocumentFragment();

            list.append(swiperContainer);

            for (let i = 0; i < response.results.length; i++) {
                const swiperSlide = document.createElement("swiper-slide");
                const card = document.createElement("div");
                card.classList.add("movie-card");

                // ---- Face 1 ----
                const face1 = document.createElement("div");
                face1.classList.add("face", "face1");

                const img = document.createElement("img");
                img.setAttribute("src", "https://www.themoviedb.org/t/p/w220_and_h330_face/" + response.results[i].backdrop_path);

                const face1Content = document.createElement("div");
                face1Content.classList.add("content");
                face1Content.append(img);

                face1.append(face1Content);

                // ---- Face 2 ----
                const face2 = document.createElement("div");
                face2.classList.add("face", "face2");

                const face2Content = document.createElement("div");
                face2Content.classList.add("content");

                const title = document.createElement("p");
                title.classList.add("card-title");

                // Check if it is a movie or TV show
                title.innerHTML = response.results[i].hasOwnProperty("title") ? response.results[i].title : response.results[i].name;

                const overview = document.createElement("p");
                overview.innerHTML = response.results[i].overview.substring(0, 150);

                if (response.results[i].overview.length > 150) {
                    overview.innerHTML += "...";
                }

                const detailLink = document.createElement("a");
                detailLink.href = "/cinetech/movie/" + response.results[i].id;
                detailLink.innerHTML = "Read more";

                face2Content.append(title, overview, detailLink);
                face2.append(face2Content);

                card.append(face1, face2);
                swiperSlide.append(card);

                swiperContainer.append(swiperSlide);
            }

            // container.innerHTML = "";
            container.append(list);
        })
        .catch(err => console.error(err));
}

sliderQuery("https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&page=1&sort_by=popularity.desc", "#popular-container")

sliderQuery("https://api.themoviedb.org/3/trending/tv/day?language=en-US", "#trending-tv-container")

