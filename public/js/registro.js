window.onload = () => {
  var formRegistro = document.querySelector("#formRegistro");

  formRegistro.addEventListener("submit", (e) => {
    e.preventDefault();

    const formDataRegistro = new FormData(formRegistro);
    if (
      formDataRegistro.get("nombre") === "" ||
      formDataRegistro.get("email") === "" ||
      formDataRegistro.get("password") === ""
    ) {
      toastMensaje(
        "center",
        1200,
        "error",
        "Todos los campos son obligatorios"
      );
    } else {
      //enviamos mediante ajax los datos
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          var respuesta = JSON.parse(this.responseText);
          if (respuesta.tipo === "correcto") {
            toastMensaje("center", 1200, "success", respuesta.mensaje);
            setTimeout(() => {
              window.location.href = "http://quegastos.byluisandresdeveloper.website/";
            }, 1200);
          } else if (respuesta.tipo === "error") {
            toastMensaje("center", 1200, "info", respuesta.mensaje);
          } else {
            mensaje("center", respuesta.mensaje, "error", 1200);
          }
        }
      };
      xhttp.open("POST", "http://quegastos.byluisandresdeveloper.website/ap/ctrlRegistrarse", true);
      xhttp.send(formDataRegistro);
    }
  });
};
