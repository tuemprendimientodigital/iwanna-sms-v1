let table;
const LOAD_DATA_TABLE = (from, to) => {
  // CONFIG TABLE
  table = $("#transactions").DataTable({
    responsive: true,
    lengthChange: false,
    autoWidth: true,
    pageLength: 100,
    order: [0, "asc"],
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
      url: `${URL_HOST}dashboard/reports/transactions/get`,
      type: "POST",
      data: {
        from: from,
        to: to,
      },
      dataSrc: function (json) {
        const validate = json.check_date;
        if (!validate) {
          $("#to-input").val("");
          $("#from-input").val("");
        }
        $("#total-profit").html(json.total_profit);
        return json.data;
      },
    },
    columns: [
      {
        data: "transaction_date",
      },
      {
        data: "service_id",
        render: (service) => {
          return (
            '<img style="width: 30px;" src="' +
            URL_HOST +
            "public/img/sms/webp/" +
            service +
            '.webp">'
          );
        },
      },
      {
        data: "number",
      },
      {
        data: "user_price",
      },
      {
        data: "status",
        render: (status) => {
          if (status == 3) {
            return '<i class="fa-solid fa-square-check text-success" style="font-size: 2rem;"></i>';
          } else if (status == 0) {
            return '<i class="fa-solid fa-clock text-warning" style="font-size: 2rem;"></i>';
          } else {
            return '<i class="fa-solid fa-square-xmark text-danger" style="font-size: 2rem;"></i>';
          }
        },
      },
    ],
  });

  // REFRESH
  setInterval(() => {
    table.ajax.reload(null, false);
  }, 20000);
};

// OTHERS CONFIG
$(document).ready(() => {
  const TO_INPUT = $("#to-input").val().split("/");
  const FROM_INPUT = $("#from-input").val().split("/");
  // LOAD TABLE
  if (TO_INPUT.length > 2 && FROM_INPUT.length > 2) {
    const from = `${FROM_INPUT[2]}-${FROM_INPUT[1]}-${FROM_INPUT[0]}`;
    const to = `${TO_INPUT[2]}-${TO_INPUT[1]}-${TO_INPUT[0]}`;
    LOAD_DATA_TABLE(from, to);
  } else {
    LOAD_DATA_TABLE("", "");
  }

  // FORM - DATE RANGE
  $("#date-range").on("submit", (e) => {
    e.preventDefault();
    table.destroy();
    const TO_INPUT = $("#to-input").val().split("/");
    const FROM_INPUT = $("#from-input").val().split("/");

    // LOAD TABLE
    if (TO_INPUT.length > 2 && FROM_INPUT.length > 2) {
      const from = `${FROM_INPUT[2]}-${FROM_INPUT[1]}-${FROM_INPUT[0]}`;
      const to = `${TO_INPUT[2]}-${TO_INPUT[1]}-${TO_INPUT[0]}`;
      LOAD_DATA_TABLE(from, to);
    } else {
      LOAD_DATA_TABLE("", "");
    }
  });

  // Date Inputs
  $("#from").datetimepicker({
    format: "DD/MM/YYYY",
  });

  $("#to").datetimepicker({
    format: "DD/MM/YYYY",
  });
});
