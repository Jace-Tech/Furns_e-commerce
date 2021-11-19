import { dismissMessage, getValue, inputCheck, inputClear, selector, showMessage } from "./functions/index.js";

const username = selector("#reg-username")
const usernameMessage = selector("#usernameMessage")

const email = selector("#reg-email")
const emailMessage = selector("#emailMessage")

const password = selector("#reg-password")
const passwordMessage = selector("#passwordMessage")

const registerBtn = selector("#register")


const changeBtn = state => {
    if(state){
        registerBtn.disabled = true
        registerBtn.textContent = "processing..."
    }
    else{
        registerBtn.disabled = false
        registerBtn.textContent = "Register"
    }
}

const checkInputs = () => {
    let result = true
    if(!inputCheck(username)){
        showMessage(usernameMessage, "Username must be more than three characters long")
        result = false
    }

    if(!inputCheck(email)){
        showMessage(emailMessage, "Input a valid Email")
        result = false
    }

    if(!inputCheck(password)){
        showMessage(passwordMessage, "Password must be more than six characters long")
        result = false
    }

    if(!result){
        changeBtn(false)
        return result
    }

    return result
}

const clearAll = () =>{
    inputClear(email)
    inputClear(password)
    inputClear(username)
}

const register = async () => {
    const url = `${location.origin}/furns/admin/handlers/register.php`
    
    const formData = new FormData()
    formData.append('email', getValue(email))
    formData.append('username', getValue(username))
    formData.append('password', getValue(password))

    const options = {
        method: "Post",
        body: formData
    }

    const request = await fetch(url, options)
    const response = await request.json()

    const {error, message} = response

    if(error){
        swal(error, '', 'error')
        changeBtn(false)
        return
    }

    changeBtn(false)
    clearAll()

    swal(message, '', 'success')
    setTimeout(() => location.href = `${location.origin}/furns/admin/`, 2000)
    
}


registerBtn.onclick = e => {
    e.preventDefault()
    if(checkInputs())
        register().catch(err => swal(err, '', 'error'))
}