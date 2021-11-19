// import { swal } from "./sweetalert.min.js"

const logoutBtn = document.querySelector("#logoutBtn")

logoutBtn.addEventListener("click", e => {
    e.preventDefault()
    console.log("clicked")
    swal("Logout", "", "warning", {button: "Yes!"}).then(value => {
        if(value) location.href = "./handlers/logout.php"
    })
})