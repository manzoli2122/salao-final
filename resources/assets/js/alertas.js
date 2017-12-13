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