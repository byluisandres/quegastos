document.addEventListener("DOMContentLoaded", function () {
  var formEventos = document.querySelector("#formEventos");
  formEventos.reset();
  var inputColor = formEventos.querySelector("#color");
  //Fullcalendar
  var calendarEl = document.getElementById("calendar");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,listMonth,dayGridWeek",
    },
    weekNumbers: true,
    navLinks: true,
    timeZone: "UTC",
    dayMaxEvents: true,
    locale: "es",
    events: "http://localhost/quegastos/calendario/ctrlObtenerEventos",

    // dateClick: function (info) {
    //   formEventos.reset();
    //   document.querySelector("#textEvento").innerHTML = "Crear nuevo evento";
    //   document.querySelector("#color").hidden = true;
    //   document.querySelector("#fecha").value = info.dateStr;
    //   $("#addEvento").modal();
    // },
    // eventClick: function (info) {
    //   console.log(info.event.extendedProps);
    //   formEventos.reset();
    //   document.querySelector("#color").hidden = false;
    //   document.querySelector("#tituloEvento").value = info.event.title;
    //   document.querySelector("#fecha").value = info.event.extendedProps[2];
    //   document.querySelector("#descripcion").value =
    //     info.event.extendedProps.description;
    //   document.querySelector("#color").value = info.event.extendedProps[4];
    //   $("#addEvento").modal();
    //   document.querySelector("#textEvento").innerHTML = "";
    // },
  });
  calendar.render();

  //enviar eventos a la base de datos
  formEventos.addEventListener("submit", (e) => {
    e.preventDefault();
    inputColor.value = generarColor();
    var formData = new FormData(formEventos);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        respuesta = JSON.parse(this.responseText);
        if (respuesta.tipo == "correcto") {
          toastMensaje("top-end", 1200, "success", respuesta.mensaje);
          //refrescar el calendario
          calendar.refetchEvents();
        }
        if (respuesta.tipo == "error") {
          toastMensaje("top-end", 1200, "info", respuesta.mensaje);
        }
      }
    };
    xhttp.open(
      "POST",
      "http://localhost/quegastos/calendario/ctrlEnviarDatosEventosForm",
      true
    );
    xhttp.send(formData);
    formEventos.reset();
  });

  //Función para generar color aletorio
  function generarColor() {
    var simbolos, color;
    simbolos = "0123456789ABCDEF";
    color = "#";
    for (var i = 0; i < 6; i++) {
      color = color + simbolos[Math.floor(Math.random() * 16)];
    }
    return color;
  }
});
