function changeDatesAvailable(datesAvailableSelect) {
  $("#total_attendees_html").html("");
  desactivateButton();

  const datesAvailableID = datesAvailableSelect.value;

  const params = {
    controllerParams: `reservation/available_hours_by_date/${datesAvailableID}`,
    divID: "dates_available_html",
  };

  ajaxRequest(params);
}

function changeHoursAvailable(hoursAvailableSelect) {
  const hoursAvailableID = hoursAvailableSelect.value;
  const url = `reservation/available_attendees_by_hour/${hoursAvailableID}`;

  const params = {
    controllerParams: url,
    divID: "total_attendees_html",
  };

  ajaxRequest(params);
}

function ajaxRequest({ controllerParams, divID }) {
  $.ajax({
    url: `${baseURL}${controllerParams}`,
    type: "GET",
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function () {},
    success: function (response) {
      $(`#${divID}`).html(response);
    },
    error: function () {
      alert("Lo sentimos, intente más tarde");
    },
  });
}

function activateButton() {
  $("#btn-reservation").attr("disabled", false);
  $("#btn-reservation").removeClass("btn-secondary");
  $("#btn-reservation").addClass("btn-primary");
}

function desactivateButton() {
  $("#btn-reservation").attr("disabled", true);
  $("#btn-reservation").removeClass("btn-primary");
  $("#btn-reservation").addClass("btn-secondary");
}
