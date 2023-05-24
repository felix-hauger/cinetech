console.log('home is where the heart is');
// console.log(document.cookie);

const cookieValue = document.cookie
    .split("; ")
    .find((row) => row.startsWith("api_key="))
    ?.split("=")[1];

const options = {method: 'GET', headers: {accept: 'application/json'}};

fetch('https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&page=1&sort_by=popularity.desc&api_key=' + cookieValue, options)
    .then(response => response.json())
    .then(response => {
        // ---- MOST POPULAR ----

        // console.log(response);

        const container = document.querySelector("#popular-container");

        // console.log(container);

        let list = new DocumentFragment();

        for (let i = 0; i < response.results.length; i++) {
            // ---- Face 1 ----
            const card = document.createElement("div");
            card.classList.add("movie-card");

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
            title.classList.add("card-title")
            title.innerHTML = response.results[i].title;

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

            list.append(card);
        }

        container.innerHTML = "";
        container.append(list);
    })
    .catch(err => console.error(err));