window.onload = () => {
  $("#addGastos").on("hidden.bs.modal", function () {
    window.location.reload();
  });
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
      `http://localhost/quegastos/gastos/ctrlGetTipoGasto/${valorSelectGasto}`,
      true
    );
    xhttp.send();
  });

  /**enviar datos del formulario con el gasto, añadir gasto */
  var formAddGasto = document.querySelector("#formAddGasto");
  var tableGastos = document.querySelector("#tableGastos");
  formAddGasto.addEventListener("submit", (e) => {
    e.preventDefault();
    let formDataGastosGastos = new FormData(formAddGasto);
    if (isNaN(formDataGastosGastos.get("cantidad"))) {
      mensaje("center", "La cantidad tiene que ser un número", "warning", 1200);
    } else {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          var respuesta = JSON.parse(this.responseText);
          console.log(respuesta);
          switch (formDataGastosGastos.get("gasto")) {
            case "1":
              gasto = "gasto de compras";
              break;
            case "2":
              gasto = "gasto de alquiler";
              break;
            case "3":
              gasto = "gasto de suministros";
              break;
            case "4":
              gasto = "gasto de servicios externos";
              break;
            case "5":
              gasto = "gasto de otros tipo";
              break;
            case "6":
              gasto = "gasto de impuestos y tasas";
              break;
            case "7":
              gasto = "gasto de personal";
              break;
            case "8":
              gasto = "gasto bancarios y similares";
              break;
            case "9":
              gasto = "gasto de amortizaciones";
              break;
            case "10":
              gasto = "gasto estraordinarios";
              break;
          }
          if (respuesta.tipo == "correcto") {
            toastMensaje("top-end", 1200, "success", respuesta.mensaje);
            var fecha = new Date();
            var dia = fecha.getDate();
            var mes = fecha.getMonth() + 1;
            var anio = fecha.getFullYear();
            var hora = fecha.getHours();
            var minutos = fecha.getMinutes();
            var segundos = fecha.getSeconds();
            tipoGasto.innerHTML = "";
            tableGastos.querySelector("tbody").innerHTML += `
            <tr>
              <td hidden></td>
              <td>${gasto}</td>
              <td>${formDataGastosGastos.get("tipoGasto")}</td>
              <td>${formDataGastosGastos.get("cantidad")} &euro;</td>
              <td>${dia}-${mes}-${anio} ${hora}:${minutos}:${segundos}</td>
              <td>
              <div class="btn-group dropright">
              <button type="button" class="btn btn-primary">Acciones</button>
              <button type="button" class="btn btn-primary dropdown-toggle px-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu">
                  <span class="dropdown-item">
                      <i class="fas fa-pencil-alt mr-2" id="btnEditar"></i>Editar
                  </span>
                  <span class="dropdown-item">
                      <i class="fas fa-trash-alt mr-2" id="btnBorrar"></i>Borrar
                  </span>
              </div>
          </div>
              </td>
            </tr>
            `;
            formAddGasto.reset();
            tipoGasto.disabled = true;
          } else {
            mensaje("center", respuesta.mensaje, "error", 1200);
          }
        }
      };
      xhttp.open(
        "POST",
        "http://localhost/quegastos/gastos/ctrlDatosFormGasto",
        true
      );
      xhttp.send(formDataGastosGastos);
    }
  });

  /*=====================================================
    Borrar Gasto
  =======================================================*/
  const btnBorrar = document.querySelectorAll("#btnBorrar");
  btnBorrar.forEach((element) => {
    element.addEventListener("click", (e) => {
      let tr = e.target.parentElement.parentElement.parentElement.parentElement;
      let td = tr.firstElementChild;
      let id = td.textContent;
      Swal.fire({
        title: "¿Seguro que lo quieres borrar?",
        text: "Esta acción no podra deshacerse",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, quiere borrarlo",
        cancelButtonText: "Cancelar",
      }).then((result) => {
        if (result.isConfirmed) {
          //enviar el id para borrarlo
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              var respuesta = JSON.parse(this.responseText);
              console.log(this.responseText);
              if ((respuesta.tipo = "correcto")) {
                toastMensaje("top-end", 1000, "success", respuesta.mensaje);

                setTimeout(() => {
                  window.location.reload();
                }, 1000);
                tr.remove();
              } else {
                mensaje("center", "No se ha podido borrar", "error", 1200) 
              }
            }
          };
          xhttp.open(
            "POST",
            `http://localhost/quegastos/gastos/ctrlBorrarGasto/${id}`,
            true
          );
          xhttp.send();
        }
      });
    });
  });
};
