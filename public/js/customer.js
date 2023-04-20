
let table = new DataTable('#myDataTable121', {
  // options
  // ordering: false,
  order: [[0, 'desc']],
  searching: false,
  pagingType: 'simple_numbers',
  columnDefs: [{
    "targets": 'no-sort',
    "orderable": false,
  }],
  sDom: '<"top"i>rt<"bottom"flp><"clear">',
});