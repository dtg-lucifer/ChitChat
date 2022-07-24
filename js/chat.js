const form = document.querySelector(".typing__area");
const sendBtn = document.querySelector("#btn");
const inputField = document.querySelector("input#input");
const chatBox = document.querySelector("#chat__box")

const scrollToBottom = () => {
    chatBox.scrollTop = chatBox.scrollHeight;
}

form.addEventListener("submit", (e) => e.preventDefault());

chatBox.addEventListener("mouseenter", () => chatBox.classList.add("hovered"))
chatBox.addEventListener("mouseleave", () => chatBox.classList.remove("hovered"))

sendBtn.addEventListener("click", (e) => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/insertchat", true);
    xhr.addEventListener("load", () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.value = "";
                inputField.focus();
            }
        }
    });
    let formData = new FormData(form);
    xhr.send(formData);
    scrollToBottom();
    setTimeout(() => {
        scrollToBottom()
    }, 1000)
});

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/getchat", true);
    xhr.addEventListener("load", () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
            }
        }
    });
    let formData = new FormData(form);
    xhr.send(formData);
    // if(!chatBox.classList.contains("hovered")) {
    //     scrollToBottom();
    // }
}, 500);