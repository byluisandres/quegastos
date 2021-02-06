<!-- add evento -->
<div class="modal fade right" id="addEvento" tabindex="-1" role="dialog" aria-labelledby="addEvento" aria-hidden="true">
    <div class="modal-dialog modal-full-height modal-right" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class=" text-center" id="textEvento">Crear nuevo evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Default form login -->
                <form class="p-2" method="POST" id="formEventos">
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
                    <input type="color" name="color" id="color" class="form-control mb-2" hidden>


                    
                    <!-- Sign in button -->
                    <button class="btn btn-teal btn-block " type="submit">Añadir</button>

                </form>
                <!-- Default form login -->
            </div>

        </div>
    </div>
</div>