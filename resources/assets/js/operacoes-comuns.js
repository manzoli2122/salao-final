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