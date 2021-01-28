window.onload = () => {
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
      `http://localhost/quegastos/dashboard/ctrlGetTipoGasto/${valorSelectGasto}`,
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
            console.log(dia, mes, anio);
            toastMensaje("top-end", 1200, "success", respuesta.mensaje);
            formAddGasto.reset();
            tipoGasto.disabled = true;
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
          } else {
            mensaje("center", respuesta.mensaje, "error", 1200);
          }
        }
      };
      xhttp.open(
        "POST",
        "http://localhost/quegastos/dashboard/ctrlDatosFormGasto",
        true
      );
      xhttp.send(formDataGastos);
    }
  });

  /*====================================
  Pintar la gráfica de barras
  ======================================*/
  var ctx = document.getElementById("myChart").getContext("2d");

  var calendarEl = document.getElementById("calendar");

  /*====================================
  Calendario
  ======================================*/
  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,listMonth",
    },
    locale: "es",
    events: [
      {
        title: "Business Lunch",
        start: "2021-01-19",
      },
    ],
  });

  calendar.render();

  /*====================================
  Gráfica de barras
  ======================================*/
  var labelBars = [],
    valoresBars = [];
  var totalGastos = document.querySelector("#total-gastos");
  var nombreDelGasto = document.querySelector("#nombreGasto");
  var totalGasto = document.querySelector("#totalGasto");
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var respuesta = JSON.parse(this.responseText);
      var gastoMes = respuesta.gastoMes;
      var gasto = respuesta.gastos;
      var gastoTotal = respuesta.gastoTotal;
      var nombreGasto = [];
      var mayor = 0;
      totalGastos.innerHTML = gastoTotal;
      if (gastoMes === 0) {
        console.log("Aún no tienes gastos");
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
      totalGasto.innerHTML = nombreGasto[1];
      nombreDelGasto.innerHTML = nombreGasto[0];
    }
  };
  xhttp.open(
    "GET",
    "http://localhost/quegastos/dashboard/ctrlObtenerGastoUser",
    true
  );
  xhttp.send();
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
/**************************** */
