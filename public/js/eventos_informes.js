window.onload = () => {
  var textElige = document.querySelector("#textElige");
  /**PDF */
  var pdfEntreFechas = document.querySelector("#pdf-entre-fechas-tab");
  var pdfGasto = document.querySelector("#pdf-gasto-tab");
  var pdfAnio = document.querySelector("#pdf-anio-tab");
  var contenedorPdfEntreFechas = document.querySelector(
    "#contenedorPdfEntreFechas"
  );
  contenedorPdfEntreFechas.style.display = "block";
  var contenedorPdfGasto = document.querySelector("#contenedorPdfGasto");
  contenedorPdfGasto.style.display = "none";
  var contenedorPdfAnio = document.querySelector("#contenedorPdfAnio");
  contenedorPdfAnio.style.display = "none";

  /**Eventos pdf */
  pdfEntreFechas.addEventListener("click", () => {
    textElige.innerHTML = "GENERAR PDF ENTRE DOS FECHAS";
    if (contenedorPdfGasto.style.display === "block") {
      contenedorPdfGasto.style.display = "none";
    }
    if (contenedorPdfAnio.style.display === "block") {
      contenedorPdfAnio.style.display = "none";
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
    textElige.innerHTML = "GENERAR PDF POR GASTO";
    if (contenedorPdfEntreFechas.style.display === "block") {
      contenedorPdfEntreFechas.style.display = "none";
    }
    if (contenedorPdfAnio.style.display === "block") {
      contenedorPdfAnio.style.display = "none";
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
    textElige.innerHTML = "GENERAR PDF DE UN AÑO";
    if (contenedorPdfEntreFechas.style.display === "block") {
      contenedorPdfEntreFechas.style.display = "none";
    }
    if (contenedorPdfGasto.style.display === "block") {
      contenedorPdfGasto.style.display = "none";
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
