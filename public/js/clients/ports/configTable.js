let table;
const LOAD_DATA_TABLE = () => {
  // CONFIG TABLE
  table = $("#ports").DataTable({
    responsive: true,
    lengthChange: false,
    autoWidth: true,
    pageLength: 1000,
    order: [1, "asc"],
    stateSave: true,
    language: {
      decimal: "",
      emptyTable: "No records",
      info: "Showing _START_ a _END_ of _TOTAL_ Records",
      infoEmpty: "Showing 0 to 0 of 0 Records.",
      infoFiltered: "(Showing of _MAX_ total Records)",
      infoPostFix: "",
      thousands: ",",
      lengthMenu: "Show _MENU_ Records",
      loadingRecords: "Loading...",
      processing: "Proccesing...",
      search: "Find:",
      zeroRecords: "No records found",
      paginate: {
        first: "First",
        last: "Last",
        next: "<i class='fa fa-angle-right'></i>",
        previous: "<i class='fa fa-angle-left'></i>",
      },
    },
    ajax: {
      url: `${URL_HOST}dashboard/devices/ports/get/${ID_DEVICE}`,
      type: "POST",
    },
    columns: [
      {
        data: "port_status",
        render: (status) => {
          if (status == 1) {
            return '<i class="fa-solid fa-toggle-on text-success" style="font-size: 1.8rem;"></i>';
          } else {
            return '<i class="fa fa-toggle-off text-danger" style="font-size: 1.8rem;"></i>';
          }
        },
      },
      {
        data: "port",
        className: "text-left",
      },
      {
        data: "type",
      },
      {
        data: "number",
      },
      {
        data: "imsi",
      },
      {
        data: "signal",
      },
      {
        data: "profit",
      },
      {
        data: "services",
      },
    ],
  });

  // REFRESH
  setInterval(() => {
    table.ajax.reload(null, false);
  }, 20000);
};

// OTHERS CONFIG
$(document).ready(LOAD_DATA_TABLE);
