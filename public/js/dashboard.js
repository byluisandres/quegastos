window.onload = () => {
  /**tipo de gasto segun el gasto */
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

  /**
   * Obtener los datos del formulario,para guardarlos en la base de datos
   *
   */
  let formAddGasto = document.querySelector("#formAddGasto");
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
            toastMensaje("top-end", 1200, "success", respuesta.mensaje);
            formAddGasto.reset();
            tipoGasto.disabled = true;
            tipoGasto.innerHTML = "";
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
};
