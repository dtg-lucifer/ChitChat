const form = document.querySelector("form#signin");
const continueBtn = document.querySelector("#button input[type='submit']");
const errorTxt = document.querySelector(".err__text");

form.addEventListener("submit", (e) => {
    e.preventDefault();
});

continueBtn.addEventListener("click", () => {
    let xhr = new XMLHttpRequest();
    let formData = new FormData(form);
    xhr.open("POST", "../php/signin", true);
    xhr.addEventListener("load", () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    location.href = "users"
                } else {
                    errorTxt.textContent = data;
                    errorTxt.style.display = "block";
                }
            }
        }
    });
    xhr.send(formData);
});
