<div class="modal fade" id="modificarEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="p-2" method="POST" id="formEventosEditDelete">
                    <!-- id -->
                    <input type="text" name="id" id="id" hidden>
                    <!-- título del evento-->
                    <label for="tituloEvento">Título del Evento</label>
                    <input type="text" name="tituloEvento" id="tituloEvento" class="form-control mb-2" placeholder="Título del evento">

                    <!-- fecha -->
                    <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" id="fecha" class="form-control mb-2">
                    <!-- descripción -->
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control mb-2" placeholder="Descripción"></textarea>
                    <!-- color -->
                    <label for="color">Color</label>
                    <input type="color" name="color" id="color" class="form-control mb-2">
                    <!-- Sign in button -->
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" id="btnBorrar">Borrar</button>
                        <button type="button" class="btn btn-primary" id="btnModificar">Modificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>