import {displayAlert, getValue, inputClear, redirect, selector  } from "./functions/index.js";

const loginForm = selector("#login")
const loginUsername = selector("#login_username")
const loginPassword = selector("#login_password")
const loginBtn = selector("#loginBtn")

const btnChange = state =>{
    if(state){
        loginBtn.textContent = "processing..."
        loginBtn.disabled = true
    }else{
        loginBtn.textContent = "Login"
        loginBtn.disabled = false
    }
}

const clearAll = () => {
    inputClear(email)
    inputClear(loginUsername)
    inputClear(loginPassword)
}

const login = async () => {
    const url = `${location.origin}/furns/assets/handlers/login.php`
    
    const formData = new FormData()
    formData.append("username", getValue(loginUsername))
    formData.append("password", getValue(loginPassword))

    const options = {
        method: "Post",
        body: formData
    }
    const request = await fetch(url, options)
    const response = await request.json()

    const {error, message} = response

    if(error){
        btnChange(false)
        displayAlert("", error)
        return
    }
    displayAlert('success', message)
    clearAll()
    btnChange(false)

    redirect(`${location.origin}/furns/index.php`)
}

loginForm.onsubmit = (e) => {
    e.preventDefault()
    btnChange(true)
    login().catch(err => {
        displayAlert('', err)
        btnChange(false)
    })
}