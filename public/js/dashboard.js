window.onload = () => {
  var modalModificar = document.querySelector("#modificarEventos");
  /** =================================
   tipo de gasto segun el gasto
   ==================================== */
  const selectGasto = document.querySelector("#gasto");
  const tipoGasto = document.querySelector("#tipoGasto");
  tipoGasto.disabled = true;
  selectGasto.addEventListener("change", (e) => {
    tipoGasto.disabled = false;
    var valorSelectGasto = e.target.value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        respuesta = JSON.parse(this.responseText);
        tipoGasto.innerHTML = "";
        respuesta.forEach((element) => {
          tipoGasto.innerHTML += `<option value='${element[1]}'>${element[1]}</option>`;
        });
      }
    };
    xhttp.open(
      "POST",
      `http://quegastos.byluisandresdeveloper.website/dashboard/ctrlGetTipoGasto/${valorSelectGasto}`,
      true
    );
    xhttp.send();
  });

  /*=====================================================================
   Obtener los datos del formulario,para guardarlos en la base de datos
   ======================================================================*/
  let formAddGasto = document.querySelector("#formAddGasto");
  const listGastos = document.querySelector("#list-gastos");
  formAddGasto.addEventListener("submit", (e) => {
    e.preventDefault();
    const formDataGastos = new FormData(formAddGasto);
    if (isNaN(formDataGastos.get("cantidad"))) {
      mensaje("center", "La cantidad tiene que ser un número", "warning", 1200);
    } else {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          var respuesta = JSON.parse(this.responseText);
          if (respuesta.tipo == "correcto") {
            var fecha = new Date();
            var dia = fecha.getDate();
            var mes = fecha.getMonth() + 1;
            var anio = fecha.getFullYear();
            var hora = fecha.getHours();
            var minutos = fecha.getMinutes();
            var segundos = fecha.getSeconds();
            tipoGasto.innerHTML = "";
            listGastos.innerHTML += `<li class="list-group-item ">
<div class="d-flex justify-content-between align-items-center">
    ${formDataGastos.get("tipoGasto")}
    <span class="badge badge-primary badge-pill">${formDataGastos.get(
      "cantidad"
    )}</span>
</div>
<small class="grey-text">${dia}-${mes}-${anio} ${hora}:${minutos}:${segundos}</small>
</li>`;
            toastMensaje("top-end", 1200, "success", respuesta.mensaje);
            formAddGasto.reset();
            tipoGasto.disabled = true;
          } else {
            mensaje("center", respuesta.mensaje, "error", 1200);
          }
        }
      };
      xhttp.open(
        "POST",
        "http://quegastos.byluisandresdeveloper.website/dashboard/ctrlDatosFormGasto",
        true
      );
      xhttp.send(formDataGastos);
    }
  });

  /*====================================
  Calendario
  ======================================*/
  var calendarEl = document.getElementById("calendar");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,listMonth",
    },
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
  /*====================================
  Pintar la gráfica de barras
  ======================================*/
  //crear el contenedor para la gráfica
  var contenedorBarsCharts = document.querySelector("#contenedorBarsCharts");
  var canvasBarsChart = document.createElement("canvas");
  canvasBarsChart.setAttribute("id", "barsChart");
  contenedorBarsCharts.appendChild(canvasBarsChart);
  var ctx = document.getElementById("barsChart").getContext("2d");
  //para guardar los valores y nombre
  var labelBars = [],
    valoresBars = [];
  var total = document.querySelector("#totalGastos");
  var nombreDelGasto = document.querySelector("#nombreGasto");
  var totalGastoNombre = document.querySelector("#totalGastoNombre");
  var textCharts = document.querySelector("#textCharts");
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var respuesta = JSON.parse(this.responseText);
      var gastoMes = respuesta.gastoMes;
      var gasto = respuesta.gastos;
      var gastoTotal = respuesta.gastoTotal;
      var nombreGasto = [];
      var mayor = 0;
      total.innerHTML = gastoTotal;
      if (gastoMes.length === 0) {
        textCharts.innerHTML = "Aún no tienes gastos";
      } else {
        for (const key in gastoMes) {
          labelBars.push(key);
          valoresBars.push(gastoMes[key]);
        }
        graficaBar(labelBars, valoresBars);
      }
      for (const key in gasto) {
        if (gasto[key] > mayor) {
          mayor = gasto[key];
          nombreGasto.push(key, mayor);
        }
      }
      if (nombreGasto.length === 0) {
        totalGastoNombre.innerHTML = "";
        nombreDelGasto.innerHTML = "";
      } else {
        totalGastoNombre.innerHTML = nombreGasto[1];
        nombreDelGasto.innerHTML = nombreGasto[0];
      }
    }
  };
  xhttp.open(
    "GET",
    "http://quegastos.byluisandresdeveloper.website/dashboard/ctrlObtenerGastoUser",
    true
  );
  xhttp.send();

  /*============================================
  Filtras por año
  ==============================================*/
  const selectAnio = document.querySelector("#selectAnio");
  selectAnio.addEventListener("change", (e) => {
    var anio = e.target.value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var respuesta = JSON.parse(this.responseText);
        console.log(respuesta);
        if (respuesta.tipo === "bien") {
          contenedorBarsCharts.appendChild(canvasBarsChart);
          var gastoMes = respuesta.dataGastosMes;
          var gasto = respuesta.gastos;
          var gastoTotal = respuesta.gastoTotal;
          var nombreGasto = [];
          var mayor = 0;
          total.innerHTML = gastoTotal;

          labelBars.length = 0;
          valoresBars.length = 0;
          for (const key in gastoMes) {
            labelBars.push(key);
            valoresBars.push(gastoMes[key]);
          }
          graficaBar(labelBars, valoresBars);

          for (const key in gasto) {
            if (gasto[key] > mayor) {
              mayor = gasto[key];
              nombreGasto.push(key, mayor);
            }
          }
          if (nombreGasto.length === 0) {
            totalGastoNombre.innerHTML = "";
            nombreDelGasto.innerHTML = "";
          } else {
            totalGastoNombre.innerHTML = nombreGasto[1];
            nombreDelGasto.innerHTML = nombreGasto[0];
          }
        }
        if (respuesta.tipo == "error") {
          textCharts.innerHTML = respuesta.mensaje;
          totalGastos.innerHTML = 0;
          totalGastoNombre.innerHTML = 0;
          nombreDelGasto.innerHTML = "";
          contenedorBarsCharts.removeChild(canvasBarsChart);
        }
      }
    };
    xhttp.open(
      "POST",
      `http://quegastos.byluisandresdeveloper.website/dashboard/ctrlGetGastosAnio/${anio}`,
      true
    );
    xhttp.send();
  });

  function graficaBar(label, data) {
    new Chart(ctx, {
      type: "bar",
      data: {
        labels: label,
        datasets: [
          {
            label: "Gastos",
            data: data,
            backgroundColor: [
              "rgba(255, 99, 132, 0.5)",
              "rgba(54, 162, 235, 0.5)",
              "rgba(255, 206, 86, 0.5)",
              "rgba(75, 192, 192, 0.5)",
              "rgba(153, 102, 255, 0.5)",
              "rgba(255, 159, 64, 0.5)",

              "rgba(255, 0, 240, 0.5)",
              "rgba(0, 8, 59, 0.5)",
              "rgba(0, 59, 5, 0.5)",
              "rgba(163, 87, 0, 0.5)",
              "rgba(0, 225, 255, 0.5)",
              "rgba(115, 90, 69, 0.5)",
            ],
            borderColor: [
              "rgba(255,99,132,1)",
              "rgba(54, 162, 235, 1)",
              "rgba(255, 206, 86, 1)",
              "rgba(75, 192, 192, 1)",
              "rgba(153, 102, 255, 1)",
              "rgba(255, 159, 64, 1)",

              "rgba(255, 0, 240,1)",
              "rgba(0, 8, 59,1)",
              "rgba(0, 59, 5,1)",
              "rgba(163, 87, 0,1)",
              "rgba(0, 225, 255,1)",
              "rgba(115, 90, 69,1)",
            ],
            borderWidth: 1,
          },
        ],
      },
      options: {
        scales: {
          yAxes: [
            {
              ticks: {
                beginAtZero: true,
              },
            },
          ],
        },
      },
    });
  }
};
