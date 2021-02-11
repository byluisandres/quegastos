window.onload = () => {
  var inputFoto = document.querySelector("#inputFoto");
  var imgPerfil = document.querySelector("#imgPerfil");
  inputFoto.addEventListener("change", (e) => {
    var extensiones = [
      "jpg",
      "jpeg",
      "png",
      "gif",
      "JPG",
      "JPEG",
      "PNG",
      "GIF",
    ];
    var tipo = e.target.files[0].type;
    var extension = tipo.split("/")[1];
    var correcto = false;
    extensiones.forEach((element) => {
      if (element === extension) {
        correcto = true;
      }
    });

    if (correcto) {
      var file = e.target.files[0];
      var reader = new FileReader();
      reader.onload = function (event) {
        imgPerfil.src = event.target.result;
      };
      reader.readAsDataURL(file);
      //enviar
      var formDataImage = new FormData();
      formDataImage.append("imagen", file);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          var respuesta = JSON.parse(this.responseText);
          if (respuesta.tipo === "correcto") {
            toastMensaje("top-end", 1200, "success", respuesta.mensaje);
          } else if (respuesta.tipo === "error") {
            toastMensaje("top-end", 1200, "warning", respuesta.mensaje);
          } else {
            mensaje("center", respuesta.mensaje, "error", 1200);
          }
          console.log(this.responseText);
        }
      };
      xhttp.open(
        "POST",
        "http://localhost/quegastos/perfil/ctrlCambiarFoto",
        true
      );
      xhttp.send(formDataImage);
    } else {
      mensaje("top-end", "Formatos admitidos jpg, jpeg,png,gif", "info", 1200);
    }
  });

  var formInfoUsuario = document.querySelector("#formInfoUsuario");
  formInfoUsuario.addEventListener("submit", (e) => {
    e.preventDefault();
    const formDataInfoUsuario = new FormData(formInfoUsuario);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var respuesta = JSON.parse(this.responseText);
        if (respuesta.tipo === "correcto") {
          toastMensaje("top-end", 1200, "success", respuesta.mensaje);
        } else if (respuesta.tipo === "error") {
          toastMensaje("top-end", 1200, "error", respuesta.mensaje);
        }
      }
    };
    xhttp.open(
      "POST",
      "http://localhost/quegastos/perfil/ctrlActualizarDatos",
      true
    );
    xhttp.send(formDataInfoUsuario);
  });
};
