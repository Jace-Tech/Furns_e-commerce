import { getValue, inputCheck, inputClear, selector, dismissMessage, showMessage } from "./functions/index.js";

const loginUsername = selector("#login-username")
const loginMessage = selector("#loginMessage")

const loginPassword = selector("#login-password")
const loginBtn = selector("#login")


const btnChange = state => {
    if(state){
        loginBtn.disabled = true
        loginBtn.textContent = "processing..."
    }
    else{
        loginBtn.disabled = false
        loginBtn.textContent = "Login"
    }
}

const login = async () => {
    const url = `${location.origin}/furns/admin/handlers/login.php`

    const formData = new FormData()
    formData.append("username", getValue(loginUsername))
    formData.append("password", getValue(loginPassword))

    const options = {
        method: 'Post',
        body: formData
    }

    const request = await fetch(url, options)
    const response = await request.json()

    const {error, message} = response

    if(error){
        swal(error, '', 'error')
        btnChange(false)
        return
    }

    swal(message, '', 'success')
    btnChange(false)
    setTimeout(redirect, 1000)
  
}

const redirect = () => {
    location.href = `${location.origin}/furns/admin/dashboard.php`
}

const validate = () => {
    if(!inputCheck(loginUsername)){
        showMessage(loginMessage, "Username must be more than three characters long")
        btnChange(false)
        return
    }

    login().catch(err => swal(err, '', 'error'))
}


loginBtn.onclick = e => {
    e.preventDefault()
    btnChange(true)
    validate()
}