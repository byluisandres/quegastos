document.addEventListener("DOMContentLoaded", function () {
  var formEventos = document.querySelector("#formEventos");
  formEventos.reset();
  var modalModificar = document.querySelector("#modificarEventos");
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
    events: "http://quegastos.byluisandresdeveloper.website/calendario/ctrlObtenerEventos",
    eventClick: function (info) {
      var id = info.event.id;
      var titulo = info.event.title;
      var fecha = info.event.extendedProps[2];
      var descripcion = info.event.extendedProps.description;
      var color = info.event.backgroundColor;
      //id
      modalModificar.querySelector("#formEventosEditDelete #id").value = id;
      //titulo
      modalModificar.querySelector(
        "#formEventosEditDelete #tituloEvento"
      ).value = titulo;
      //fecha
      modalModificar.querySelector(
        "#formEventosEditDelete #fecha"
      ).value = fecha;
      //descripcion
      modalModificar.querySelector(
        "#formEventosEditDelete #descripcion"
      ).value = descripcion;
      //color
      modalModificar.querySelector(
        "#formEventosEditDelete #color"
      ).value = color;
      $(modalModificar).modal();
    },
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
      "http://quegastos.byluisandresdeveloper.website/calendario/ctrlEnviarDatosEventosForm",
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

  /** Borrar evento*/
  var formEventosEditDelete = document.querySelector("#formEventosEditDelete");
  formEventosEditDelete
    .querySelector("#btnBorrar")
    .addEventListener("click", (e) => {
      e.preventDefault();
      var formDataBorrar = new FormData(formEventosEditDelete);
      var id = formDataBorrar.get("id");
      // console.log("borrar");
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          respuesta = JSON.parse(this.responseText);
          if (respuesta.tipo == "correcto") {
            toastMensaje("top-end", 1200, "success", respuesta.mensaje);
            //refrescar el calendario
            calendar.refetchEvents();
            $(modalModificar).modal("hide");
          }
          if (respuesta.tipo == "error") {
            toastMensaje("top-end", 1200, "info", respuesta.mensaje);
          }
        }
      };
      xhttp.open(
        "DELETE",
        `http://quegastos.byluisandresdeveloper.website/calendario/ctrlBorrarEvento/${id}`,
        true
      );
      xhttp.send();
    });

  /*Modificar evento*/
  formEventosEditDelete
    .querySelector("#btnModificar")
    .addEventListener("click", (e) => {
      e.preventDefault();
      var formDataBorrar = new FormData(formEventosEditDelete);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          respuesta = JSON.parse(this.responseText);
          if (respuesta.tipo == "correcto") {
            toastMensaje("top-end", 1200, "success", respuesta.mensaje);
            //refrescar el calendario
            calendar.refetchEvents();
            $(modalModificar).modal("hide");
          }
          if (respuesta.tipo == "error") {
            toastMensaje("top-end", 1200, "info", respuesta.mensaje);
          }
        }
      };
      xhttp.open(
        "POST",
        `http://quegastos.byluisandresdeveloper.website/calendario/ctrlModificarEvento/`,
        true
      );
      xhttp.send(formDataBorrar);
    });
});
