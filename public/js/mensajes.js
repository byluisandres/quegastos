//mensaje tipo toast
function toastMensaje(posicion, tiempo, tipo, mensaje) {
  const Toast = Swal.mixin({
    toast: true,
    position: posicion,
    showConfirmButton: false,
    timer: tiempo,
    timerProgressBar: true,
  });

  Toast.fire({
    icon: tipo,
    title: mensaje,
  });
}

//mensaje
function mensaje(posicion, mensaje, tipo, tiempo) {
  Swal.fire({
    position: posicion,
    icon: tipo,
    title: mensaje,
    showConfirmButton: false,
    timer: tiempo,
    timerProgressBar: true,
  });
}
