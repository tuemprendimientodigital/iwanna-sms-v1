const READY = () => {
  // loading
  $("#devices").html("Loading...");
  // HOME AJAX
  const HOME_AJAX = () => {
    // AJAX
    let dataQuery = {
      url: `${URL_HOST}dashboard/home/get`,
    };
    const AJAX = QUERY_AJAX(dataQuery);
    AJAX.done(function (data) {
      $("#incomingToday").html(
        `$${
          data.getIncomingToday["price"] ? data.getIncomingToday["price"] : "0"
        }`
      );
      let home_html = "";
      data.getDevices.forEach((device) => {
        home_html += `<div class="col" style="max-width:450px;">
                                <!-- start small-box -->
                                <div id="home-box" class="small-box ${
                                  device["status"] == 1
                                    ? "bg-success"
                                    : "bg-danger"
                                }">
                                    <div class="inner d-flex justify-content-between align-items-center">
                                        <div>
                                            <h3 style="font-size: 1.50rem">${
                                              device["model"]
                                            }</h3>
                                            <p>
                                                <i class="font-weight-bold">Ports: </i>
                                                <span>${device["ports"]}</span>
                                            </p>
                                        </div>
                                        <div>
                                            <div style="font-size: 1.3rem">
                                                <i class="font-weight-bold">Profit: </i>
                                                <span>${device["profit"]}</span>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-tablet-screen-button position-static"></i>
                                        </div>
                                    </div>
                                    <a href="${
                                      URL_HOST +
                                      "dashboard/devices/ports/" +
                                      device["id"]
                                    }" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <!-- finish small-box -->
                            </div>`;
      });
      $("#devices").html(home_html);
    });
  };
  HOME_AJAX();
  // Refresh
  setInterval(HOME_AJAX, 20000);
};
// OTHERS CONFIG
$(document).ready(READY);
