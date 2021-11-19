export const selector = name => document.querySelector(name)

export const inputClear = input => input.value = ""

export const getValue = input => input.value

export const inputCheck = input => {
    if(getValue(input).length < 3)
        return false
    else
        return true
}

export const showMessage = (where, msg) => {
    where.textContent = msg
    dismissMessage(where)
}

export const dismissMessage = (where) =>{
    setTimeout(()=> {
        where.textContent = ""
    }, 3000)
} 