import {displayAlert, redirect, getValue, inputClear, selector } from "./functions/index.js";

const loginForm = selector("#register")
const email = selector("#email")
const username = selector("#username")
const password = selector("#password")
const btn = selector("#btn")

export const clear = () => {
    inputClear(email)
    inputClear(username)
    inputClear(password)
}

const changeBtn = state =>{
    if(state){
        btn.textContent = "processing..."
        btn.disabled = true
    }else{
        btn.textContent = "Register"
        btn.disabled = false
    }
}

const post = async () => {
    const url = `${location.origin}/furns/assets/handlers/sign_up.php`
    
    const formData = new FormData()
    formData.append("email", getValue(email))
    formData.append("username", getValue(username))
    formData.append("password", getValue(password))

    const options = {
        method: "Post",
        body: formData
    }
    const request = await fetch(url, options)
    const response = await request.json()

    const {error, message} = response

    if(error){
        changeBtn(false)
        displayAlert("", error)
        return
    }
    displayAlert('success', message)
    clear()
    changeBtn(false)

    redirect(location.href)
}

loginForm.onsubmit = (e) => {
    e.preventDefault()
    changeBtn(true)
    post().catch(err => {
        displayAlert('', err)
        changeBtn(false)
    })
}