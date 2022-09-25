window.onload = function(){
    var cep = document.getElementById('cep');
    cep.addEventListener('blur', listar);
}

    // evento disparado quando a requisição for completa
            function CarregaLista(event) {
            const logradouro = document.getElementById("logradouro");
            const bairro = document.getElementById("bairro");
            if(this.status == 200 && this.readyState==4) {
            var cep = document.getElementById('cep').innerHTML;
            var dados = JSON.parse(this.responseText);
                console.log(dados)
                if (dados) {
                logradouro.value = dados.logradouro;
                bairro.value = dados.bairro;
                } else {
                console.log('Somthing wrong happen:',this.status);
                    }
            }
        }
    function listar(){

            const ajax = new XMLHttpRequest();
            ajax.addEventListener('load', CarregaLista);
            ajax.open('GET', 'https://viacep.com.br/ws/'+cep.value+'/json');
            ajax.send();
    }