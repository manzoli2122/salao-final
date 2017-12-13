window.datatablePadrao = function(seletorTabela, configEspecifica,
    lengthMenu = [
        [10, 25, 50, -1],
        [10, 25, 50, "Todos"]
    ]) {
    var csrf_token = document.head.querySelector('meta[name="csrf-token"]').content;

    var configPadrao = {
        processing: true,
        serverSide: true,
        pagingType: "simple_numbers",
        lengthMenu: lengthMenu,
        language: { url: "https://cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json" },
        ajax: {
            type: 'post',
            data: { '_token': csrf_token }
        },
        // Retira a busca a cada caractere digitado. Pesquisando apenas com Enter
        initComplete: function() {
            var $searchInput = $('div.dataTables_filter input');

            $searchInput.unbind();

            $searchInput.bind('keyup', function(e) {
                if (e.keyCode == 13) {
                    dataTable.search(this.value).draw();
                }
            });
        }
    };

    var config = _.merge(configPadrao, configEspecifica);

    // Adiciona os campos para busca individual das colunas
    $(seletorTabela + ' thead th[pesquisavel]').each(function() {
        var title = $(seletorTabela + ' thead th').eq($(this).index()).text();
        $(this).html('<input type="text" pesquisavel placeholder="' + title + '" />');
    });

    var dataTable = $(seletorTabela).DataTable(config);

    // Aplica a busca individual das colunas
    dataTable.columns().eq(0).each(function(colIdx) {
        $('input', dataTable.column(colIdx).header()).on('keypress change click', function(e) {
            if (e.type === 'change' || e.which === 13) {
                dataTable
                    .column(colIdx)
                    .search(this.value)
                    .draw();

                e.stopPropagation();
            }
        });

        $('input', dataTable.column(colIdx).header()).on('click', function(e) {
            e.stopPropagation();
        });
    });

    return dataTable;
}