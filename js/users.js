const searchBar = document.querySelector(".users .search input");
const searchBtn = document.querySelector(".users .search button");
const userList = document.querySelector(".users .user__list");

searchBtn.addEventListener("click", () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    if(searchBar.classList.contains("searching")) {
        searchBar.classList.remove("searching")
        searchBar.value = ""
    }
});

searchBar.addEventListener("keyup", (e) => {
    let term = searchBar.value;
    if (term != "") {
        searchBar.classList.add("searching");
    } else {
        searchBar.classList.remove("searching");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/search", true);
    xhr.addEventListener("load", () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                userList.innerHTML = data;
            }
        }
    });
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(`searchterm=${term}`);
});

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/users", true);
    xhr.addEventListener("load", () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (!searchBar.classList.contains("searching")) {
                    userList.innerHTML = data;
                    console.log(data);
                }
            }
        }
    });
    xhr.send();
}, 1000);
