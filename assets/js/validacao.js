function validateFields(){
    const email = document.getElementById("email").value;
    const msg = document.getElementById("mensagem");
    const nome = document.getElementById("nome").value;
    const emailValid = isEmailValid();
    const pwValid = isPasswordValid();
    const nameValid = isEmailValid();


    if(!emailValid){
        msg.innerHTML = 'Por favor, informe um email valido!';
    }
    else{
        msg.innerHTML = '';
    }

    if(!nameValid){
        msg.innerHTML ='Por favor informe um nome valido.';
    }
    if(nome === ''){
        msg.innerHTML = 'Por favor, informe um nome'
    }


}
function isEmailValid() {
    const email = document.getElementById("email").value;
    if (!email) {
        return false;
    }
    return validateEmail(email);
}

function isPasswordValid() {
    const password = document.getElementById("password").value;
    if (!password) {
        return false;
    }
    return true;
}

function isNomeValid(){
    const nome = document.getElementById("nome").value;
    if(!nome){
        return false
    }
    return true;
}

function validateEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}