window.onload = () => {
  /**CSV */
  var csvEntreFechas = document.querySelector("#csv-entre-fechas-tab");
  var csvGasto = document.querySelector("#csv-gasto-tab");
  var csvAnio = document.querySelector("#csv-anio-tab");
  var contenedorCsvEntreFechas = document.querySelector(
    "#contenedorCsvEntreFechas"
  );
  contenedorCsvEntreFechas.style.display = "none";
  var contenedorCsvGasto = document.querySelector("#contenedorCsvGasto");
  contenedorCsvGasto.style.display = "none";
  var contenedorCsvAnio = document.querySelector("#contenedorCsvAnio");
  contenedorCsvAnio.style.display = "none";
  /**PDF */
  var pdfEntreFechas = document.querySelector("#pdf-entre-fechas-tab");
  var pdfGasto = document.querySelector("#pdf-gasto-tab");
  var pdfAnio = document.querySelector("#pdf-anio-tab");
  var contenedorPdfEntreFechas = document.querySelector(
    "#contenedorPdfEntreFechas"
  );
  contenedorPdfEntreFechas.style.display = "none";
  var contenedorPdfGasto = document.querySelector("#contenedorPdfGasto");
  contenedorPdfGasto.style.display = "none";
  var contenedorPdfAnio = document.querySelector("#contenedorPdfAnio");
  contenedorPdfAnio.style.display = "none";
  /**Eventos csv */
  csvEntreFechas.addEventListener("click", () => {
    if (contenedorCsvGasto.style.display === "block") {
      contenedorCsvGasto.style.display = "none";
    }
    if (contenedorCsvAnio.style.display === "block") {
      contenedorCsvAnio.style.display = "none";
    }
    if (contenedorPdfGasto.style.display === "block") {
      contenedorPdfGasto.style.display = "none";
    }
    if (contenedorPdfAnio.style.display === "block") {
      contenedorPdfAnio.style.display = "none";
    }
    if (contenedorPdfEntreFechas.style.display === "block") {
      contenedorPdfEntreFechas.style.display = "none";
    }
    if (contenedorCsvEntreFechas.style.display === "none") {
      contenedorCsvEntreFechas.style.display = "block";
      contenedorCsvEntreFechas.classList.add("animate__fadeInDown");
    } else {
      contenedorCsvEntreFechas.style.display = "none";
      contenedorCsvEntreFechas.classList.remove("animate__fadeInDown");
    }
  });

  csvGasto.addEventListener("click", () => {
    if (contenedorCsvEntreFechas.style.display === "block") {
      contenedorCsvEntreFechas.style.display = "none";
    }
    if (contenedorCsvAnio.style.display === "block") {
      contenedorCsvAnio.style.display = "none";
    }

    if (contenedorPdfGasto.style.display === "block") {
      contenedorPdfGasto.style.display = "none";
    }
    if (contenedorPdfAnio.style.display === "block") {
      contenedorPdfAnio.style.display = "none";
    }
    if (contenedorPdfEntreFechas.style.display === "block") {
      contenedorPdfEntreFechas.style.display = "none";
    }
    if (contenedorCsvGasto.style.display === "none") {
      contenedorCsvGasto.style.display = "block";
      contenedorCsvGasto.classList.add("animate__fadeInDown");
    } else {
      contenedorCsvGasto.style.display = "none";
      contenedorCsvGasto.classList.remove("animate__fadeInDown");
    }
  });

  csvAnio.addEventListener("click", () => {
    if (contenedorCsvGasto.style.display === "block") {
      contenedorCsvGasto.style.display = "none";
    }
    if (contenedorPdfGasto.style.display === "block") {
      contenedorPdfGasto.style.display = "none";
    }
    if (contenedorPdfAnio.style.display === "block") {
      contenedorPdfAnio.style.display = "none";
    }
    if (contenedorPdfEntreFechas.style.display === "block") {
      contenedorPdfEntreFechas.style.display = "none";
    }
    if (contenedorCsvAnio.style.display === "none") {
      contenedorCsvAnio.style.display = "block";
      contenedorCsvAnio.classList.add("animate__fadeInDown");
    } else {
      contenedorCsvAnio.style.display = "none";
      contenedorCsvAnio.classList.remove("animate__fadeInDown");
    }
  });

  /**Eventos pdf */
  pdfEntreFechas.addEventListener("click", () => {
    if (contenedorPdfGasto.style.display === "block") {
      contenedorPdfGasto.style.display = "none";
    }
    if (contenedorPdfAnio.style.display === "block") {
      contenedorPdfAnio.style.display = "none";
    }
    if (contenedorCsvEntreFechas.style.display === "block") {
      contenedorCsvEntreFechas.style.display = "none";
    }
    if (contenedorCsvGasto.style.display === "block") {
      contenedorCsvGasto.style.display = "none";
    }
    if (contenedorCsvAnio.style.display === "block") {
      contenedorCsvAnio.style.display = "none";
    }
    if (contenedorPdfEntreFechas.style.display === "none") {
      contenedorPdfEntreFechas.style.display = "block";
      contenedorPdfEntreFechas.classList.add("animate__fadeInDown");
    } else {
      contenedorPdfEntreFechas.style.display = "none";
      contenedorPdfEntreFechas.classList.remove("animate__fadeInDown");
    }
  });

  pdfGasto.addEventListener("click", () => {
    if (contenedorPdfEntreFechas.style.display === "block") {
      contenedorPdfEntreFechas.style.display = "none";
    }
    if (contenedorPdfAnio.style.display === "block") {
      contenedorPdfAnio.style.display = "none";
    }
    if (contenedorCsvGasto.style.display === "block") {
      contenedorCsvGasto.style.display = "none";
    }
    if (contenedorCsvAnio.style.display === "block") {
      contenedorCsvAnio.style.display = "none";
    }
    if (contenedorCsvEntreFechas.style.display === "block") {
      contenedorCsvEntreFechas.style.display = "none";
    }
    if (contenedorPdfGasto.style.display === "none") {
      contenedorPdfGasto.style.display = "block";
      contenedorPdfGasto.classList.add("animate__fadeInDown");
    } else {
      contenedorPdfGasto.style.display = "none";
      contenedorPdfGasto.classList.remove("animate__fadeInDown");
    }
  });

  pdfAnio.addEventListener("click", () => {
    if (contenedorPdfGasto.style.display === "block") {
      contenedorPdfGasto.style.display = "none";
    }
    if (contenedorCsvGasto.style.display === "block") {
      contenedorCsvGasto.style.display = "none";
    }
    if (contenedorCsvAnio.style.display === "block") {
      contenedorCsvAnio.style.display = "none";
    }
    if (contenedorCsvEntreFechas.style.display === "block") {
      contenedorCsvEntreFechas.style.display = "none";
    }
    if (contenedorPdfAnio.style.display === "none") {
      contenedorPdfAnio.style.display = "block";
      contenedorPdfAnio.classList.add("animate__fadeInDown");
    } else {
      contenedorPdfAnio.style.display = "none";
      contenedorPdfAnio.classList.remove("animate__fadeInDown");
    }
  });
};
