var textoVistaPrevia = document.querySelector("#textoVistaPrevia");

/**PDF */
var formPdfEntreFechas = document.querySelector("#formPdfEntreFechas");
var selectPdfGasto = document.querySelector("#selectPdfGasto");
var selectPdfAnio = document.querySelector("#selectPdfAnio");



//Obtener datos para generar pdf
formPdfEntreFechas.addEventListener("submit", (e) => {
  e.preventDefault();
  const formDataPdfEntreFechas = new FormData(formPdfEntreFechas);
  if (
    formDataPdfEntreFechas.get("fechaInicial") === "" ||
    formDataPdfEntreFechas.get("fechaFinal") === ""
  ) {
    toastMensaje(
      "top-end",
      1200,
      "warning",
      "todos los campos son obligatorios"
    );
  } else {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        respuesta = JSON.parse(this.responseText);
        if (respuesta.tipo == "bien") {
          PDFObject.embed(
            `http://localhost/quegastos/pdf/${respuesta.mensaje}?fechaIncial=${respuesta.fechaIncial}&&fechaFinal=${respuesta.fechaFinal}`,
            "#contenedor-informe"
          );
          textoVistaPrevia.innerHTML = `Gastos desde ${respuesta.fechaIncial} a ${respuesta.fechaFinal}`;
          formPdfEntreFechas.reset();
        }
        if (respuesta.tipo == "fail") {
          toastMensaje("top-end", 1200, "error", respuesta.mensaje);
          document.querySelector(".pdfobject") = "";
          textoVistaPrevia.innerHTML = "Vista Previa";
        }
        if (respuesta.tipo == "error") {
          toastMensaje("top-end", 1200, "info", respuesta.mensaje);
          document.querySelector(".pdfobject") = "";
          textoVistaPrevia.innerHTML = "Vista Previa";
        }
      }
    };
    xhttp.open(
      "POST",
      `http://localhost/quegastos/pdf/ctrlGetFechasForm`,
      true
    );
    xhttp.send(formDataPdfEntreFechas);
  }
});
selectPdfGasto.addEventListener("change", (e) => {
  var valorSelectGasto = e.target.value;
  console.log(e.target);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      respuesta = JSON.parse(this.responseText);
      switch (valorSelectGasto) {
        case "1":
          gasto = "Gasto de compras";
          break;
        case "2":
          gasto = "Gasto de alquiler";
          break;
        case "3":
          gasto = "Gasto de suministros";
          break;
        case "4":
          gasto = "Gasto de servicios externos";
          break;
        case "5":
          gasto = "Gasto de otros tipo";
          break;
        case "6":
          gasto = "Gasto de impuestos y tasas";
          break;
        case "7":
          gasto = "Gasto de personal";
          break;
        case "8":
          gasto = "Gasto bancarios y similares";
          break;
        case "9":
          gasto = "Gasto de amortizaciones";
          break;
        case "10":
          gasto = "Gasto estraordinarios";
          break;
      }
      if (respuesta.tipo === "bien") {
        PDFObject.embed(
          `http://localhost/quegastos/pdf/${respuesta.mensaje}?id=${respuesta.id}`,
          "#contenedor-informe"
        );
        textoVistaPrevia.innerHTML = `${gasto}`;
      }

      if (respuesta.tipo === "error") {
        toastMensaje("top-end", 1200, "info", respuesta.mensaje);
        document.querySelector(".pdfobject").src = "";
        textoVistaPrevia.innerHTML = "Vista Previa";
      }
    }
  };
  xhttp.open(
    "POST",
    `http://localhost/quegastos/pdf/ctrlGetGasto/${valorSelectGasto}`,
    true
  );
  xhttp.send();
});

selectPdfAnio.addEventListener("change", (e) => {
  var valorSelectAnio = e.target.value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      respuesta = JSON.parse(this.responseText);

      if (respuesta.tipo === "bien") {
        PDFObject.embed(
          `http://localhost/quegastos/pdf/${respuesta.mensaje}?anio=${respuesta.anio}`,
          "#contenedor-informe"
        );
        textoVistaPrevia.innerHTML = `Gasto del año: ${respuesta.anio}`;
      }

      if (respuesta.tipo === "error") {
        toastMensaje("top-end", 1200, "info", respuesta.mensaje);
        document.querySelector(".pdfobject").src = "";
        textoVistaPrevia.innerHTML = "Vista Previa";
      }
    }
  };
  xhttp.open(
    "POST",
    `http://localhost/quegastos/pdf/ctrlGetAnioForm/${valorSelectAnio}`,
    true
  );
  xhttp.send();
});
