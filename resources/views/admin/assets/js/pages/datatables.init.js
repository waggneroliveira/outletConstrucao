$(document).ready(function() {
    $("#single-datatable").dataTable();
    $("#basic-datatable").dataTable({
        ordering: false,
        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>"
            },
            infoEmpty: "Mostrando 0 a 0 de 0 entradas",
            info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            lengthMenu: "Mostrar _MENU_ enradas",
            search: "Buscar:",
            zeroRecords: "Nenhum registro correspondente encontrado",
            emptyTable: "Sem dados disponíveis",
            loadingRecords: "Carregando...",
            processing: "Processando...",
            infoFiltered: "",
        },
        drawCallback: function() {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
            $("div.dataTables_wrapper div.dataTables_length label select").addClass("mr-2").addClass("ml-2");
        },
    });

    var a = $("#datatable-buttons").DataTable({
        lengthChange: !1,
        buttons: ["print", "pdf", "excel"],
        ordering: false,
        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>"
            },
            infoEmpty: "Mostrando 0 a 0 de 0 entradas",
            info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            lengthMenu: "Mostrar _MENU_ enradas",
            search: "Buscar:",
            zeroRecords: "Nenhum registro correspondente encontrado",
            emptyTable: "Sem dados disponíveis",
            loadingRecords: "Carregando...",
            processing: "Processando...",
            infoFiltered: "",
        },
        drawCallback: function() {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        }
    });

    $("#selection-datatable").DataTable({
        select: {
            style: "multi"
        },
        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>"
            }
        },
        drawCallback: function() {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        }
    }), $("#key-datatable").DataTable({
        keys: !0,
        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>"
            }
        },
        drawCallback: function() {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        }
    }), a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)")
});
