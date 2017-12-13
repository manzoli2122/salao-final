/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/datatables-padrao.js":
/***/ (function(module, exports) {

window.datatablePadrao = function (seletorTabela, configEspecifica) {
    var lengthMenu = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : [[10, 25, 50, -1], [10, 25, 50, "Todos"]];

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
        initComplete: function initComplete() {
            var $searchInput = $('div.dataTables_filter input');

            $searchInput.unbind();

            $searchInput.bind('keyup', function (e) {
                if (e.keyCode == 13) {
                    dataTable.search(this.value).draw();
                }
            });
        }
    };

    var config = _.merge(configPadrao, configEspecifica);

    // Adiciona os campos para busca individual das colunas
    $(seletorTabela + ' thead th[pesquisavel]').each(function () {
        var title = $(seletorTabela + ' thead th').eq($(this).index()).text();
        $(this).html('<input type="text" pesquisavel placeholder="' + title + '" />');
    });

    var dataTable = $(seletorTabela).DataTable(config);

    // Aplica a busca individual das colunas
    dataTable.columns().eq(0).each(function (colIdx) {
        $('input', dataTable.column(colIdx).header()).on('keypress change click', function (e) {
            if (e.type === 'change' || e.which === 13) {
                dataTable.column(colIdx).search(this.value).draw();

                e.stopPropagation();
            }
        });

        $('input', dataTable.column(colIdx).header()).on('click', function (e) {
            e.stopPropagation();
        });
    });

    return dataTable;
};

/***/ }),

/***/ 1:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/assets/js/datatables-padrao.js");


/***/ })

/******/ });