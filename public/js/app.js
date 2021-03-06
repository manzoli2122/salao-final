window.alertSucesso = function(titulo, texto = "", posicao = "center", funcao = function() {}) {
    iziToast.show({
        theme: 'dark',
        position: posicao,
        color: '#00A65A',
        title: titulo,
        titleColor: '#fff',
        titleSize: '14',
        message: texto,
        messageColor: '#fff',
        timeout: false,
        icon: 'fa fa-check',
        iconColor: '#fff',
        closeOnEscape: true,
        onClosed: funcao
    });
}

window.toastSucesso = function(titulo, texto = "", funcao = function() {}) {
    alertSucesso(titulo, texto, 'bottomRight', funcao);
}

window.alertErro = function(titulo, texto = "", posicao = "center", funcao = function() {}) {
    iziToast.show({
        theme: 'dark',
        position: posicao,
        color: '#DD4B39',
        title: titulo,
        titleColor: '#fff',
        titleSize: '14',
        message: texto,
        messageColor: '#fff',
        timeout: false,
        icon: 'fa fa-ban',
        iconColor: '#fff',
        closeOnEscape: true,
        onClosed: funcao
    });
}

window.toastErro = function(titulo, texto = "", funcao = function() {}) {
    alertErro(titulo, texto, 'bottomRight', funcao);
}

window.alertConfimacao = function(titulo, texto, funcaoSIM, funcaoNAO = function() {}) {
    iziToast.show({
        theme: 'dark',
        color: '#3C8DBC',
        titleColor: '#fff',
        messageColor: '#fff',
        timeout: false,
        icon: 'fa fa-question-circle-o',
        iconColor: '#fff',
        close: false,
        overlay: true,
        toastOnce: true,
        zindex: 999,
        title: titulo,
        message: texto,
        position: 'center',
        buttons: [
            ['<button><b>Sim</b></button>', function(instance, toast) {
                instance.hide(toast, {
                    transitionOut: 'fadeOut'
                }, 'button');
                funcaoSIM();
            }],
            ['<button><b>Não</b></button>', function(instance, toast) {
                instance.hide(toast, {
                    transitionOut: 'fadeOut'
                }, 'button');
                funcaoNAO();
            }, true]
        ],
        id: 'iziToastConfirmacao'
    });
}

window.alertProcessando = function() {
    $('body').addClass('loading');
}

window.alertProcessandoHide = function() {
    $('body').removeClass('loading');
}

window.alertInput = function(titulo, options, funcOnClose) {

    var defaults = {
        title: titulo,
        input: 'text',
        confirmButtonText: 'Confirmar',
        inputPlaceholder: '',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        allowOutsideClick: false,
        allowEscapeKey: false,
        inputClass: 'input-full',
        inputValidator: null
    };

    options = _.defaults(options, defaults);
    (async() => {
        var retorno = await swal(options);
        funcOnClose(retorno.value);
    })();
}
window.exibeMsgGlobais = function() {
    // Exibe a mensagem de sucesso caso exista
    if ($('#_success').length > 0 && $('#_success').val() !== '') {
        toastSucesso($('#_success').val());
        $('#_success').val('');
    }

    // Exibe as mensagens de erro caso existam
    var contadorErro = 0;
    var MAX_MSG_ERRO = 5;
    $('input[name^="_errors"]').each(function() {
        if ($(this).val() !== '') {
            if (contadorErro < MAX_MSG_ERRO) {
                toastErro($(this).val());
                $(this).val('');
                contadorErro++;
            }
        }
    });
}

$(document).ready(function() {
    exibeMsgGlobais();
});
window.excluirRecursoPeloId = function(id, texto, url, funcSucesso = function() {}) {
    alertConfimacao(texto, '',
        function() {
            alertProcessando();
            var token = document.head.querySelector('meta[name="csrf-token"]').content;

            $.ajax({
                url: url + "/" + id,
                type: 'post',
                data: { _method: 'delete', _token: token },
                success: function(retorno) {
                    alertProcessandoHide();
                    if (retorno.erro) {
                        toastErro(retorno.msg);
                    } else {
                        toastSucesso(retorno.msg);
                        funcSucesso();
                    }
                },
                error: function(erro) {
                    alertProcessandoHide();
                    toastErro("Ocorreu um erro");
                    console.log(erro);
                }
            });
        }
    );
}