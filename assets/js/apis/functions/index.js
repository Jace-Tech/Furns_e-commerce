export const selector = name => document.querySelector(name)

export const getValue = element => element.value

export const inputClear = element => element.value = ""

export const displayAlert = (type, msg) =>{
    if(type === 'success'){
        swal(msg, "", 'success')
    }else{
        swal(msg, "", 'error')
    }
}

export const redirect = (where) => {
    setTimeout(() => {
        location.href = where
    }, 2000)
}
