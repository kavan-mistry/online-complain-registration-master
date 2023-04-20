
let table = new DataTable('#myTable', {
    // options
    // ordering: false,
    // order: [[0, 'desc']],
    // searching: false,
    columnDefs: [{
        "targets": 'no-sort',
        "orderable": false,
    }],
    sDom: '<"top"if>rt<"bottom"lp><"clear">',
    // pagingType: 'first_last_numbers',
});


