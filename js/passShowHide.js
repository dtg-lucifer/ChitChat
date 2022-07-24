const passwField = document.querySelector("input[name='password']")
const toggleBtn = document.querySelector("i#eye")

toggleBtn.addEventListener("click", (e) => {
    if(passwField.type === "password") {
        passwField.type = "text"
        toggleBtn.classList.toggle("active")
        return
    }
    passwField.type = "password"
    toggleBtn.classList.toggle("active")
    return
})