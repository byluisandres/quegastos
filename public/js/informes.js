/**CSV */
var formCsvEntreFechas = document.querySelector("#formCsvEntreFechas");
var formCsvGasto = document.querySelector("#formCsvGasto");
var formCsvAnio = document.querySelector("#formCsvAnio");

/**PDF */
var formPdfEntreFechas = document.querySelector("#formPdfEntreFechas");
var formPdfGasto = document.querySelector("#formPdfGasto");
var formPdfAnio = document.querySelector("#formPdfAnio");

//Obtener datos para generar csv
formCsvEntreFechas.addEventListener("submit", (e) => {
  e.preventDefault();
  console.log("submit formCsvEntreFechas");
});
formCsvGasto.addEventListener("submit", (e) => {
  e.preventDefault();
  console.log("submit formCsvGasto");
});
formCsvAnio.addEventListener("submit", (e) => {
  e.preventDefault();
  console.log("submit formCsvAnio");
});

//Obtener datos para generar pdf
formPdfEntreFechas.addEventListener("submit", (e) => {
  e.preventDefault();
  console.log("submit formPdfEntreFechas");
});
formPdfGasto.addEventListener("submit", (e) => {
  e.preventDefault();
  console.log("submit formPdfGasto");
});
formPdfAnio.addEventListener("submit", (e) => {
  e.preventDefault();
  console.log("submit formPdfAnio");
});
