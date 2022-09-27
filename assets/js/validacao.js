function validateFields(){
    const email = document.getElementById("email").value;
    const msg = document.getElementById("mensagem");
    const emailValid = isEmailValid();
    const nameValid = isEmailValid();

    if(!emailValid){
        msg.innerHTML = 'Por favor, informe um email valido!';
    }
    else{
        msg.innerHTML = '';
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

var ul = document.querySelector('nav ul');
var menuBtn = document.querySelector('.menu-btn i');

function menuShow() {
    if (ul.classList.contains('open')) {
        ul.classList.remove('open');
    }else{
        ul.classList.add('open');
    }
}