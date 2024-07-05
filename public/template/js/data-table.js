$.extend(true, $.fn.dataTable.defaults, {
    language: {
        searchPlaceholder: "Search records",
    },
    aLengthMenu: [
        [10, 25, 50, 100, -1],
        [10, 25, 50, 100, "All"]
    ],
    dom: '<"top"Bf>rt<"bottom"lip>',
    stateSave: true,
    buttons: [
        {
            extend: 'colvis',
            text: 'Column visibility',
        },
        {
            extend: 'excelHtml5',
            text: 'Export to Excel',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'print',
            text: 'Print',
            exportOptions: {
                columns: ':visible'
            }
        }
    ]
});
