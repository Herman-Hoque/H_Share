
document.getElementById('uploadForm').onsubmit = function(event) {
    event.preventDefault(); // Evita o envio padrão do formulário

    var dadosForm = new FormData();
    var file = document.getElementById('file').files[0];
    dadosForm.append('file', file);

    // Configurar ajax ou solicitação assincrona
    var xhr = new XMLHttpRequest();

    // Função de progresso
    xhr.upload.onprogress = function(event) {
        if (event.lengthComputable) {
            var percentagem = (event.loaded / event.total) * 100;
            document.getElementById('progressBar').value = percentagem;
            document.getElementById('status').innerText = Math.round(percentagem) + '% carregado';
        }
    };

    // Função de conclusão
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('status').innerText = 'Arquivo enviado com sucesso!';
        } else {
            document.getElementById('status').innerText = 'Erro ao enviar!. Arquivo muito grande ou erro de cenexão!';
        }
    };

    xhr.open('POST', 'share.php', true);
    xhr.send(dadosForm);
};